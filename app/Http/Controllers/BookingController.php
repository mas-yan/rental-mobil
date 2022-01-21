<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Clients;
use App\Models\Mobil;
use App\Models\Payment;
use Carbon\Carbon;
use DateTime;
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
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'total_price' => $request->total_price,
            'dibayar' => $request->amount,
            'mobil_id' => $request->car_id,
            'client_id' => $request->client_id,
            'total_price' => $request->total_price,
            'type' => $request->type,
        ]);
        $car = Mobil::find($request->car_id);
        $car->available = '0';
        $car->save();
        return redirect('/booking')->with('success', 'Berhasil Rental Mobil!');
    }

    public function return()
    {
        $bookings = Booking::where('dikembalikan', null)->get();
        return view('return.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        // fine / denda (*10%/hari)
        if ($booking->tanggal_pengembalian < date('Y-m-d')) {
            $return_supposed = new DateTime($booking->tanggal_pengembalian);
            $return_now = new DateTime(date('Y-m-d'));
            $selisih = $return_supposed->diff($return_now);
            $late = $selisih->days;
            $fine = $booking->mobil->price * 10 / 100 * $late;
            $data['fine'] = $fine + $booking->mobil->price * $late;
            $data['late'] = $late;
        } else {
            $data['fine'] = null;
            $data['late'] = null;
        }
        // dd($payment->amount);
        $data['total'] = $booking->total_price - $booking->dibayar;
        $data['dp'] = $booking->dibayar;
        $data['now'] = Carbon::now()->toDateString();
        return view('return.show', compact('booking', 'data'));
    }

    public function store(Request $request)
    {
        $booking = Booking::where('kode_booking', $request->booking_code)->first();
        $booking->update([
            'dibayar' => $request->sisa + $booking->dibayar,
            'denda' => $request->fine,
            'dikembalikan' => date('Y-m-d')
        ]);

        $car = Mobil::find($request->car_id);
        $car->update([
            'available' => 1,
        ]);

        return redirect('/return')->with('success', 'Mobil Telah Dikembalikan!');
    }
}
