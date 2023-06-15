<?php

namespace App\Http\Controllers;

use App\Models\Kabkot;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.provinsis.index', [
            'provinsis' => Provinsi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.provinsis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_provinsi' => 'required'
        ]);

        Provinsi::create($validatedData);

        return redirect('/dashboard/provinsis')->with('success', "Data Provinsi '$request->nama_provinsi' telah berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show(Provinsi $provinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Provinsi $provinsi)
    {
        return view('dashboard.provinsis.edit', [
            'provinsi' => $provinsi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provinsi $provinsi)
    {
        $validatedData = $request->validate([
            'nama_provinsi' => 'required'
        ]);

        Provinsi::where('id', $provinsi->id)
            ->update($validatedData);

        return redirect('/dashboard/provinsis')->with('success', "Data Provinsi '$provinsi->nama_provinsi' telah berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provinsi $provinsi)
    {
        $result = Kabkot::where('provinsi_id','=',$provinsi->id)->get();
        if ($result->isEmpty()) {
            Provinsi::destroy($provinsi->id);
            return redirect('/dashboard/provinsis')->with('success', "Data Provinsi '$provinsi->nama_provinsi' berhasil dihapus");
        } else {
            return redirect('/dashboard/provinsis')->with('failure', "Data Provinsi '$provinsi->nama_provinsi' tidak dapat dihapus karena masih memiliki Data Kabupaten Kota");
        }
    }
}
