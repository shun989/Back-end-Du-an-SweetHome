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
<<<<<<< HEAD
        'photo'
=======
        'photo',
        'wards_id',
        'category_id'
>>>>>>> 5feb7d2eecb7ff58fb6d14b469e80dacb07be1e3
    ];

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
//
//    public function category()
//    {
//        return $this->belongsTo(Category::class);
//    }
//
//    public function status()
//    {
//        return $this->belongsTo(Status::class);
//    }
}
