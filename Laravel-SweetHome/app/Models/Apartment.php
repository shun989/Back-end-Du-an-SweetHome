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
        'category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
//
//    public function status()
//    {
//        return $this->belongsTo(Status::class);
//    }
}
