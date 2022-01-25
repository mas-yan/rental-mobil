<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Clients;
use App\Models\Mobil;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $mobil = Mobil::count();
        $client = Clients::count();
        $rental = Mobil::where('available', 0)->count();

        $date = Carbon::now();
        $denda = Booking::whereMonth('created_at', $date->format('m'))->where('denda', '!=', null)->whereYear('created_at', $date->format('Y'))->groupBy('denda')->count();

        $chart = Booking::select(DB::raw('sum(total_price) as `data`'), DB::raw('MONTH(tanggal_order) month'))
            ->where('dikembalikan', '!=', null)
            ->groupby('month')
            ->whereYear('tanggal_order', $date->format('Y'))
            ->get();

        $dendaChart = Booking::select(DB::raw('sum(denda) as `data`'), DB::raw('MONTH(tanggal_order) month'))
            ->where('dikembalikan', '!=', null)
            ->groupby('month')
            ->whereYear('tanggal_order', $date->format('Y'))
            ->get();

        $montChart = Booking::select(DB::raw('MONTH(tanggal_order) month'), DB::raw('MONTHNAME(tanggal_order) data'))
            ->where('dikembalikan', '!=', null)
            ->groupby('data')
            ->groupby('month')
            ->orderby('month')
            ->whereYear('tanggal_order', $date->format('Y'))
            ->get();
        return view('dashboard', compact('mobil', 'denda', 'client', 'rental', 'date', 'chart', 'montChart', 'dendaChart'));
    }
}
