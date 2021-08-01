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
        $apartments = $this->apartmentRepo->getAll();

        return $apartments;
    }

    public function findById($id)
    {
        $apartment = $this->apartmentRepo->findById($id);

        $statusCode = 200;
        if (!$apartment)
            $statusCode = 404;

        $data = [
            'statusCode' => $statusCode,
            'apartments' => $apartment
        ];

        return $data;
    }

    public function create($request)
    {
        $apartment = $this->apartmentRepo->create($request);

        $statusCode = 201;
        if (!$apartment)
            $statusCode = 500;

        $data = [
            'statusCode' => $statusCode,
            'apartments' => $apartment
        ];

        return $data;
    }

    public function update($request, $id)
    {
        $oldApartment = $this->apartmentRepo->findById($id);

        if (!$oldApartment) {
            $newApartment = null;
            $statusCode = 404;
        } else {
            $newApartment = $this->apartmentRepo->update($request, $oldApartment);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'apartments' => $newApartment
        ];
        return $data;
    }

    public function destroy($id)
    {
        $apartment = $this->apartmentRepo->findById($id);

        $statusCode = 404;
        $message = "Song not found";
        if ($apartment) {
            $this->apartmentRepo->destroy($apartment);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
