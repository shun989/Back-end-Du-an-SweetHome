<?php

namespace App\Http\Services;

interface ApartmentService
{
<<<<<<< HEAD
    public function getAll();
    public function findById($id);
    public function create($request);
    public function update($request, $id);
    public function destroy($id);
=======
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
>>>>>>> 5feb7d2eecb7ff58fb6d14b469e80dacb07be1e3
}
