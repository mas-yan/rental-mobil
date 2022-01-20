<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Clients;
use App\Models\Mobil;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $cars = Mobil::where('available', 1)->with('brand')->get();
        $clients = Clients::get();
        return view('bookings.index', compact('cars', 'clients'));
    }

    public function process(Request $request)
    {
        $data = $request->toArray();
        $car = Mobil::find($request->car_id);
        $client = Clients::find($request->client);

        $order_date = $request->order_date;
        $duration = $request->duration;

        // return date / tanggal kembali, dimana menghitung dari tanggal order + durasi peminjaman
        $return_date = date('Y-m-d', strtotime('+' . $duration . 'days', strtotime($order_date)));

        // harga total => harga mobil/day * durasi peminjaman
        $total_price = $car->price * $duration;

        // dp => 30% dari total harga
        $pay = $total_price * 30 / 100;
        return view('bookings.process', compact('client', 'car', 'return_date', 'data', 'total_price', 'pay'));
    }

    public function confirm(Request $request)
    {
        Booking::create([
            'kode_booking' => $request->booking_code,
            'tanggal_order' => $request->order_date,
            'durasi' => $request->duration,
            'tanggal_pengembalian' => $request->return_date_supposed,
            'total_price' => $request->total_price,
            'mobil_id' => $request->car_id,
            'client_id' => $request->client_id,
            'total_price' => $request->total_price,
        ]);
        $car = Mobil::find($request->car_id);
        $car->available = '0';
        $car->save();
    }
}
