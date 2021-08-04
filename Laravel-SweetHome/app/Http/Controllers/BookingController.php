<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    function store(Request $request) {

        $booking = new Booking();
        $booking->check_in = $request->startDate;
        $booking->check_out = $request->endDate;
        $booking->total_price = $request->total_price;
        $booking->user_id = $request->user_id;
        $booking->apartment_id = $request->apartment_id;
        $booking->save();

        $data = [
            'message' => 'success'
        ];
        return response()->json($data,200);
    }
}
