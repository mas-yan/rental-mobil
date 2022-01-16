<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => ['image'],
            'nik' => ['required', 'unique:clients'],
            'name' => ['required'],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
        ]);

        Clients::create($request->all());
        return redirect('/clients')->with('success', 'Data Penyewa Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Clients::find($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Clients::find($id);
        $request->validate([
            'foto' => ['image'],
            'nik' => [
                'required',
                Rule::unique('clients')->ignore($client->nik, 'nik')
            ],
            'name' => ['required'],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
        ]);
        $foto = $request->file('foto');
        if ($foto == '') {
            $client->update([
                'name' => $request->name,
                'car_name' => $request->car_name,
                'plat_number' => $request->plat_number,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
        } else {
            Storage::disk('local')->delete('public/client/' . basename($client->foto));
            $client->update($request->all());
        }
        return redirect('/clients')->with('success', 'Data client Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Clients::find($id);
        Storage::disk('local')->delete('public/client/' . basename($client->foto));
        $client->delete();
        return redirect('/clients')->with('success', 'Data Penyewa Berhasil Dihapus!');
    }
}
