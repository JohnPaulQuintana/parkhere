<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booked;
use App\Models\ParkingLot;
use App\Models\ParkingSpace;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    
    public function index(){
        $users = User::get();
        $es = ParkingSpace::get();
        $c = Booked::where('status','cancelled')->get();
        $p = Booked::where('status','paid')->get();
        $pp = Booked::where('status','pending')->get();
        $ps = ParkingLot::get();
        return view('dashboard', compact('users', 'es', 'c', 'p','pp','ps'));
    }

    public function establishment(){
        $establishments = ParkingSpace::with(['parkinglot'])->get();
        // dd($establishments);
        return view('pages.establishment', compact('establishments'));
    }

    public function establishmentStore(Request $request){
        // dd($request);
        $validated = $request->validate([
            'establishment_name' => 'required',
            'establishment_description' => 'required',
            'parking_price' => 'required',
            'establishment_slot' => 'required',
            'parking_starting_name' => 'required',
        ]);

        if($validated){
               $establishments = ParkingSpace::create([
                    'stablishment_name' =>$validated['establishment_name'],
                    'stablishment_desciption' =>$validated['establishment_description'],
                    'parking_space_count' =>$validated['establishment_slot'],
                    'parking_price' =>$validated['parking_price'],
                    'parking_starting_name' =>$validated['parking_starting_name'],
               ]);

               if($establishments){
                    for ($i=1; $i <= $establishments->parking_space_count ; $i++) { 
                        ParkingLot::create([
                            'parking_space_id'=>$establishments->id,
                            'slot'=>$establishments->parking_starting_name.'-'.$i,
                            'status'=>'available'
                        ]);
                    }
               }
        }

        return Redirect::route('admin.establishment')->with(['status.save'=>'success', 'action'=>'store', 'updateModal'=>'closed', 'establishment_id'=>$establishments->id]);
    }

    public function establishmentUpdate(Request $request){
        // dd($request);
        // $parkingLot = 
        for ($i=0; $i < count($request->ids); $i++) { 
            ParkingLot::find($request->ids[$i])->update(['status'=>$request->status[$i]]);
        }
        return Redirect::route('admin.establishment')->with(['status.save'=>'success', 'action'=>'update', 'updateModal'=>'open', 'establishment_id'=>$request->establishment_id]);

    }

    public function establishmentUpdateEs(Request $request){
        // dd($request);
        $es = ParkingSpace::with('parkinglot')->find($request->es_id);
        // dd($es);
        if($es){
            $es->stablishment_name = $request->establishment_name;
            $es->stablishment_desciption = $request->establishment_description;
            $es->parking_space_count = $request->establishment_slot;
            $es->parking_price = $request->parking_price;
            $es->parking_starting_name = $request->parking_starting_name;
            $es->save();

            if($es->parkinglot){
                foreach ($es->parkinglot as $key => $value) {
                    // dd($value->slot);
                    $value->slot = $es->parking_starting_name.'-'.$key+1;
                    $value->save();
                    // dd($value->slot);
                    
                }
                return Redirect::route('admin.establishment')->with(['status.save'=>'success', 'action'=>'es', 'updateModal'=>'close', 'establishment_id'=>$request->es_id]);

            }
        }

    }

    public function establishmentDestroy(Request $request){
        // dd($request->id);
        $es = ParkingSpace::find($request->id);
        if($es){
            $es->delete();
            return Redirect::route('admin.establishment')->with(['status.save'=>'success', 'action'=>'delete', 'updateModal'=>'close', 'establishment_id'=>$request->id]);

        }
    }

    public function reservation(){
        $reservation = Booked::with(['parkingLot.parkingSpace','totalCharge','user'])->get();
        // dd($reservation);
        return view('pages.reservation', compact('reservation'));
    }

    public function reservationPaid(Request $request){
        // dd($request);
        $booked = Booked::with(['totalCharge'])->find($request->booked_id);
        // dd($booked);
        $booked->status = 'paid';
        $booked->save();
        if($booked->totalCharge){
            $booked->totalCharge->update(['status'=>'paid']);

            return Redirect::route('admin.reservation')->with(['reservation.status'=>'paid']);
        }
    }


    public function updateTotalCharge()
    {
        $booked = Booked::with('totalCharge')->where('status','pending')->get();
         foreach ($booked as $k => $b) {
             // Assuming 'starting_time' and 'end_time' are stored as TIME type in MySQL
            $starting_time = Carbon::createFromFormat('H:i:s', $b->starting_time); // Create Carbon instance from TIME type
            $end_time = Carbon::createFromFormat('H:i:s', $b->end_time); // Create Carbon instance from TIME type
            $currentDateTime = Carbon::now();
           // Format the current time to match 'H:i:s' format
            // $currentTime = $currentDateTime->format('H:i:s');
             // Check if current time is less than end time, use current time in that case
            
            $result = $this->calculateTotalCharge($starting_time, $end_time, $currentDateTime, $b->price);
            // dd($booked);
            if($b->totalCharge){
                $b->totalCharge->update([
                    'status'=>'unpaid',
                    'total'=>$result,
                ]);
            }
            
         }
        
    }

    private function calculateTotalCharge($startTime, $endTime, $currentTime, $ratePerHour)
    {
        if ($currentTime->lessThan($endTime)) {
            $endTimeToUse = $currentTime;
            // dd('yes');
        } else {
            $endTimeToUse = $endTime;
            // dd('no');
        }

        // Calculate the difference in hours, ignoring minutes and seconds
        $hoursDifference = round($startTime->diffInHours($endTimeToUse, false));
        // dd($hoursDifference);

        // Calculate the total charge
        $totalCharge = $hoursDifference * $ratePerHour;

        return $totalCharge;
    }
}
