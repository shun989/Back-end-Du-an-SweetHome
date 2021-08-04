<?php

namespace App\Http\Repositories\Impl;

use App\Http\Repositories\Eloquent\EloquentRepository;
use App\Http\Repositories\ImageRepository;
use App\Models\Image;

class ImageRepositoryImpl extends EloquentRepository implements ImageRepository
{
    public function getModel()
    {
        $model = Image::class;
        return $model;
    }
}
