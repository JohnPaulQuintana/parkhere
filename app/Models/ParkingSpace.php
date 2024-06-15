<?php

namespace App\Models;

use App\Models\ParkingLot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ParkingSpace extends Model
{
    use HasFactory;
    protected $fillable = ['stablishment_name','stablishment_desciption','parking_space_count','parking_price','parking_starting_name'];

    public function parkinglot() :HasMany{
        return $this->hasMany(ParkingLot::class);
    }
}
