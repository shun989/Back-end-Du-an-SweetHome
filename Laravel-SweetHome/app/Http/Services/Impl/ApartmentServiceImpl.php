<?php

namespace App\Http\Services\Impl;

use App\Http\Repositories\ApartmentRepository;
use App\Http\Services\ApartmentService;

class ApartmentServiceImpl implements ApartmentService
{
    protected $apartmentRepo;

    public function __construct(ApartmentRepository $apartmentRepository)
    {
        $this->apartmentRepo = $apartmentRepository;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public function create($request)
    {
        // TODO: Implement create() method.
    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}
