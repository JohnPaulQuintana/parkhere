<?php

namespace App\Models;

use App\Models\ParkingLot;
use App\Models\TotalCharge;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booked extends Model
{
    use HasFactory;
    protected $fillable = ['parking_lot_id','user_id','price','vehicle_type','vehicle_color','plate_number','date','starting_time','end_time','status'];

    public function parkingLot() :BelongsTo{
        return $this->belongsTo(ParkingLot::class);
    }

    public function user() :BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function totalCharge() :HasOne{
        return $this->hasOne(TotalCharge::class);
    }
}
