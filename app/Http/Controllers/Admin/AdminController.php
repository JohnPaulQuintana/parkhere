<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ParkingLot;
use App\Models\ParkingSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    
    public function index(){
        return view('dashboard');
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
}
