<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ParkingSpace;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('user.dashboard');
    }

    public function parking(){
        $establishments = ParkingSpace::with(['parkinglot'])->latest()->get();
        return view('user.pages.parkingspace',compact('establishments'));
    }
}
