<?php

namespace App\Models;

use App\Models\Booked;
use App\Models\ParkingSpace;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ParkingLot extends Model
{
    use HasFactory;
    protected $fillable = ['parking_space_id','slot','status','isBooked'];

    public function parkingSpace() :BelongsTo{
        return $this->belongsTo(ParkingSpace::class);
    }

    public function booked() :HasMany{
        return $this->hasMany(Booked::class);
    }
}
