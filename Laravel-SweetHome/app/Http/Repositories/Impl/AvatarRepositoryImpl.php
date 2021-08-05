<?php
namespace App\Http\Repositories\Impl;

use App\Http\Repositories\AvatarRepository;
use App\Http\Repositories\Eloquent\EloquentRepository;
use App\Models\Avatar;

class AvatarRepositoryImpl extends EloquentRepository implements AvatarRepository
{
    public function getModel()
    {
        $model = Avatar::class;
        return $model;
    }
}
