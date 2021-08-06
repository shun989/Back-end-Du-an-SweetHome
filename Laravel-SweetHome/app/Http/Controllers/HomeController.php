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
            ->orderByDesc('view_count')
            ->take(3)
            ->get());
    }

    function getAreaApartment($area)
    {
        if ($area == 'HN') {
            return Province::with('apartments')
//                ->where('name', '=', 'Lake Jimmie')
                ->where('name', '=', 'Hà Nội')
                ->get();
        }

        if ($area == 'HCM') {
            return Province::with('apartments')
                ->where('name', '=', 'Hồ Chí Minh')
                ->get();
        }
    }

    function countHomeArea() {
        return Province::withCount('apartments')
//            ->where('name', '=', 'Lake Jimmie')
            ->where('name', '=', 'Hà Nội')
            ->get();
    }
}
