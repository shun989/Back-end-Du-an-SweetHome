<?php

namespace App\Http\Repositories;

use App\Models\Apartment;
use Illuminate\Support\Facades\DB;

class ApartmentRepository
{
    protected Apartment $apartmentModel;

    public function __construct(Apartment $apartment)
    {
        $this->apartmentModel = $apartment;
    }
}
