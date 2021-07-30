<?php

namespace App\Http\Services;

use App\Http\Repositories\ApartmentRepo;
use App\Models\User;

class ApartmentService
{
    protected ApartmentRepo $apartmentRepo;

    public function __construct(ApartmentRepo  $apartmentRepository)
    {
        $this->apartmentRepo = $apartmentRepository;
    }

    function getById($id) {
        return $this->apartmentRepo->getById($id);
    }

    function getAll()
    {
        return $this->apartmentRepo->getAll();
    }
}
