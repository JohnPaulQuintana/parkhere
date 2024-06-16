<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\QrCodeEmail;
use App\Mail\QrCodeEmailUpdate;
use App\Models\Booked;
use App\Models\ParkingLot;
use App\Models\ParkingSpace;
use App\Models\TotalCharge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        $es = ParkingSpace::get();
        $c = Booked::where('status','cancelled')->get();
        $p = Booked::where('status','paid')->get();
        $pp = Booked::where('status','pending')->get();
        $ps = ParkingLot::get();
        return view('user.dashboard',compact('users', 'es', 'c', 'p','pp','ps'));
    }
    public function history(){
        $histories = Booked::with(['parkingLot.parkingSpace','totalCharge'])->where('user_id',auth()->user()->id)->get();
        // dd($histories);
        return view('user.pages.history', compact('histories'));
    }

    public function parking(){
        $establishments = ParkingSpace::with(['parkinglot'])->latest()->get();
        return view('user.pages.parkingspace',compact('establishments'));
    }

    public function parkingBooked(Request $request){
        // dd($request->id);
        $establishment = ParkingSpace::with(['parkinglot'])->find($request->id);
        // dd($establishment);
        return view('user.pages.parkinglot', compact('establishment'));
    }

    public function parkingReserved(Request $request){
        // dd($request);

        $slot = ParkingLot::with('parkingSpace')->find($request->slot_id);
        // dd($slot);
        if($slot){
            $slot->update([
                'status'=>'not-available',
                'isBooked'=>true,
            ]);

            $booked = Booked::create([
                'parking_lot_id'=>$request->slot_id,
                'user_id'=>auth()->user()->id,
                'price'=>$request->parking_price,
                'vehicle_type'=>$request->vehicle_type,
                'vehicle_color'=>$request->vehicle_color,
                'plate_number'=>$request->vehicle_plate_number,
                'date'=>$request->date,
                'starting_time'=>$request->starting_time,
                'end_time'=>$request->end_time,
            ]);

            if($booked){
                //stored the charges
                TotalCharge::create([
                    'booked_id'=>$booked->id,
                    'total'=>$booked->price,
                    'status'=>'pending',
                ]);
                // Create data to be encoded in the QR code
                $data = [
                    'establishment' => $slot->parkingSpace->stablishment_name,
                    'parking_slot' => $slot->slot,
                    'name' => auth()->user()->name,
                    'price' => $booked->price,
                    'vehicle_type' => $booked->vehicle_type,
                    'vehicle_color' => $booked->vehicle_color,
                    'plate_number' => $booked->plate_number,
                    'date' => $booked->date,
                    'starting_time' => $booked->starting_time,
                    'end_time' => $booked->end_time,
                    'expiration_date' => $booked->date,
                ];

                // $data = "John Paul Quintana";
                $qrCodeData = QrCode::format('png')->size(300)->generate(json_encode($data));

                // Convert QR code data to object format
                $qrCodeObject = new \stdClass();
                $qrCodeObject->imageData = base64_encode($qrCodeData); // Convert image data to base64 for easy storage or transmission
                $qrCodeObject->data = $data; //arrays
                // Send email with QR code content
                try {
                    Mail::to(auth()->user()->email)->send(new QrCodeEmail($qrCodeObject));
                    // return "QR code content sent successfully.";
                } catch (\Exception $e) {
                    return "Failed to send QR code content: " . $e->getMessage();
                }
            }


            return Redirect::route('user.history')->with(['history.save'=>'success']);
        }

    }

    public function parkingReservedUpdate(Request $request){
        // dd($request);
        $booked = Booked::with('parkingLot.parkingSpace')->find($request->booked_id);
        // dd($booked);
        // Create data to be encoded in the QR code
        $data = [
            'establishment' => $booked->parkingLot->parkingSpace->stablishment_name,
            'parking_slot' => $booked->parkingLot->slot,
            'name' => auth()->user()->name,
            'price' => $booked->price,
            'vehicle_type' => $request->vehicle_type,
            'vehicle_color' => $request->vehicle_color,
            'plate_number' => $request->vehicle_plate_number,
            'date' => $request->date,
            'starting_time' => $request->starting_time,
            'end_time' => $request->end_time,
            'expiration_date' => $request->date,
        ];

        if($booked){
            $booked->update([
                'parking_lot_id'=>$request->slot_id,
                'user_id'=>auth()->user()->id,
                'price'=>$request->parking_price,
                'vehicle_type'=>$request->vehicle_type,
                'vehicle_color'=>$request->vehicle_color,
                'plate_number'=>$request->vehicle_plate_number,
                'date'=>$request->date,
                'starting_time'=>$request->starting_time,
                'end_time'=>$request->end_time,
            ]);

            // $data = "John Paul Quintana";
            $qrCodeData = QrCode::format('png')->size(300)->generate(json_encode($data));

            // Convert QR code data to object format
            $qrCodeObject = new \stdClass();
            $qrCodeObject->imageData = base64_encode($qrCodeData); // Convert image data to base64 for easy storage or transmission
            $qrCodeObject->data = $data; //arrays
            // Send email with QR code content
            try {
                Mail::to(auth()->user()->email)->send(new QrCodeEmailUpdate($qrCodeObject));
                // return "QR code content sent successfully.";
            } catch (\Exception $e) {
                return "Failed to send QR code content: " . $e->getMessage();
            }

            return Redirect::route('user.history')->with(['history.save'=>'updated']);
        }
    }

    public function parkingReservedCancel(Request $request){
        // dd($request->id);
        $booked = Booked::with(['totalCharge','parkingLot'])->find($request->id);
        // dd($booked);
        if($booked){
            // Update the status to 'cancelled'
            $booked->status = 'cancelled';
            $booked->save();

            // Update the total charge if it exists, otherwise create a new one
            if ($booked->totalCharge) {
                $booked->totalCharge->update([
                    'status' =>'cancelled',
                    'total' => 0,
                ]);

                
            }

            if($booked->parkingLot){
                $booked->parkingLot->update([
                    'status' =>'available',
                    'isBooked' => false,
                ]);
            }
            return Redirect::route('user.history')->with(['history.save'=>'cancelled']);
        }
    }
}
