<?php

namespace App\Models;

use App\Models\Booked;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TotalCharge extends Model
{
    use HasFactory;

    protected $fillable = ['booked_id','total','status'];

    public function booked() :BelongsTo{
        return $this->belongsTo(Booked::class);
    }
}
