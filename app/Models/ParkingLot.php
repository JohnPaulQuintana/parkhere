<?php

namespace App\Models;

use App\Models\ParkingSpace;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParkingLot extends Model
{
    use HasFactory;
    protected $fillable = ['parking_space_id','slot','status','isBooked'];

    public function establishment() :BelongsTo{
        return $this->belongsTo(ParkingSpace::class);
    }
}
