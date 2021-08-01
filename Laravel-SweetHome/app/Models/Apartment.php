<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'bathroomNumber',
        'bedroomNumber',
        'address',
        'photo',
        'wards_id',
        'category_id',
        'user_id'
    ];
}
