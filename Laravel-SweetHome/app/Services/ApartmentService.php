<?php

namespace App\Http\Services;


use App\Http\Repositories\ApartmentRepository;
use App\Models\User;

class ApartmentService
{
    protected ApartmentRepository $apartmentRepo;

    public function __construct(ApartmentRepository  $apartmentRepository)
    {
        $this->apartmentRepo = $apartmentRepository;
    }
}
