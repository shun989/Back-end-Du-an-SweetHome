<?php

namespace App\Http\Repositories;

use App\Models\Apartment;
use Illuminate\Support\Facades\DB;

class ApartmentRepo
{
    protected Apartment $apartmentModel;

    public function __construct(Apartment $apartment)
    {
        $this->apartmentModel = $apartment;
    }

    function getById($id) {
        return $this->apartmentModel->find($id);
    }

    public function getAll()
    {
        return $this->apartmentModel->getAll();
    }
}
