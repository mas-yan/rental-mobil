<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $bookings = Booking::with('client')->when($request->all(), function ($bookings) {
            $bookings = $bookings->whereBetween('tanggal_order', [request()->start_date, request()->end_date]);
        })->get();
        return view('report.index', compact('bookings'));
    }
}
