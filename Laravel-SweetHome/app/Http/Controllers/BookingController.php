<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    function store(Request $request)
    {

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
        return response()->json($data, 200);
    }

    function getBookmarked($id)
    {
        return BookingResource::collection(Booking::with('apartment')
            ->orderByDesc('created_at')
            ->where('user_id', '=', $id)
            ->get()
        );
    }

    function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        $timeNow = Carbon::now('Asia/Ho_Chi_Minh');
        $nowTimestamp = Carbon::parse($timeNow)->timestamp;
        $timeCheckin = Carbon::create($booking->check_in);
        $checkInTimestamp = Carbon::parse($timeCheckin)->timestamp;
        if ($checkInTimestamp - $nowTimestamp >= 86400) {
            $booking->delete();
            $data = [
              'message' => 'Bạn đã hủy thành công'
            ];
            return response()->json($data, 200);
        }
//        dd($timeNow,$nowTimestamp,$timeCheckin,$checkInTimestamp);
        return response()->json('', 400);
    }
}
