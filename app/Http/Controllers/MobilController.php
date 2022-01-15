<?php

namespace App\Http\Controllers;

use App\Http\Requests\MobilRequest;
use App\Models\Brand;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Mobil::with('brand')->get();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::get();
        return view('cars.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MobilRequest $request)
    {
        Mobil::create($request->all());
        return redirect('/cars')->with('success', 'Data Mobil Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function show(Mobil $mobil)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::get();
        $mobil = Mobil::find($id);
        return view('cars.edit', compact('brands', 'mobil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function update(MobilRequest $request, $id)
    {
        $mobil = Mobil::find($id);
        $foto = $request->file('foto');
        if ($foto == '') {
            $mobil->update([
                'brand_id' => $request->brand_id,
                'car_name' => $request->car_name,
                'plat_number' => $request->plat_number,
                'price' => $request->price,
                'type' => $request->type,
            ]);
        } else {
            Storage::disk('local')->delete('public/mobil/' . basename($mobil->foto));
            $mobil->update($request->all());
        }
        return redirect('/cars')->with('success', 'Data Mobil Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Mobil::find($id);
        $mobil->delete();
        return redirect('/cars')->with('success', 'Data Mobil Berhasil Dihapus!');
    }
}
