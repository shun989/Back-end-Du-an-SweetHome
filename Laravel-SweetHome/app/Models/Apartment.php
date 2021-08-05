<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $dates = ['created_at'];
    protected $fillable = [
        'name',
        'price',
        'description',
        'bathroomNumber',
        'bedroomNumber',
        'address',
        'photo',
        'ward_id',
        'category_id',
        'user_id',
        'status_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}
