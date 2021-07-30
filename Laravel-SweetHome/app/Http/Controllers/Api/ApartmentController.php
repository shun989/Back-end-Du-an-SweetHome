<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\ApartmentService;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    protected ApartmentService $apartmentService;

    public function __construct(ApartmentService $apartmentService)
    {
        $this->apartmentService = $apartmentService;
    }

    function show($id)
    {
        $apartment = $this->apartmentService->getById($id);
        return response()->json($apartment);
    }

    function index()
    {
        $apartments = $this->apartmentService->getAll();
        return response()->json($apartments);
    }
}
