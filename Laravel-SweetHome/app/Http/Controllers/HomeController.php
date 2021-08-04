<?php

namespace App\Http\Controllers;

use App\Http\Resources\HomeResource;
use App\Models\Apartment;
use App\Models\Province;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function getFeaturedApartment()
    {
        return HomeResource::collection(Apartment::with('user', 'status', 'category', 'ward')
            ->take(4)
            ->get());
    }

    function getLastedApartment()
    {
        return HomeResource::collection(Apartment::with('user', 'status', 'category', 'ward')
            ->orderByDesc('price')
            ->take(3)
            ->get());
    }

    function getAreaApartment()
    {
        return Province::withCount('apartments')->get();
    }
}
