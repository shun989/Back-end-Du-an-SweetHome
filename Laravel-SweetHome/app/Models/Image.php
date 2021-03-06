<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'apartment_id', 'name'
    ];

    protected $fillable = [
        'name'
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
