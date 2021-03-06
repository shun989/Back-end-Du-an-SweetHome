<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'prefix',
        'district_id'
    ];

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }
}
