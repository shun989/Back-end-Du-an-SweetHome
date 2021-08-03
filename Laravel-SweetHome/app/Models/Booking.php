<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';

    function user() {
        return $this->belongsTo(User::class);
    }

    function apartment() {
        return $this->belongsTo(Apartment::class);
    }
}
