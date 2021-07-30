<?php

namespace App\Http\Repositories\Impl;

use App\Http\Repositories\ApartmentRepository;
use App\Http\Repositories\Eloquent\EloquentRepository;
use App\Models\Apartment;

class ApartmentRepositoryImpl extends EloquentRepository implements ApartmentRepository
{

    public function getModel()
    {
        $model = Apartment::class;
        return $model;
    }
}
