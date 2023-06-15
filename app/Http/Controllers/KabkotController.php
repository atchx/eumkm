<?php

namespace App\Http\Controllers;

use App\Models\Kabkot;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KabkotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kabkots.index', [
            'kabkots' => Kabkot::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kabkots.create', [
            'provinsis' => Provinsi::all()
        ]);
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
            'provinsi_id' => 'required',
            'nama_kabkot' => 'required'
        ]);

        Kabkot::create($validatedData);

        return redirect('/dashboard/kabkots')->with('success', "Data Kabupaten Kota '$request->nama_kabkot' telah berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kabkot  $kabkot
     * @return \Illuminate\Http\Response
     */
    public function show(Kabkot $kabkot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kabkot  $kabkot
     * @return \Illuminate\Http\Response
     */
    public function edit(Kabkot $kabkot)
    {
        return view('dashboard.kabkots.edit', [
            'kabkot' => $kabkot,
            'provinsis' => Provinsi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kabkot  $kabkot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kabkot $kabkot)
    {
        $validatedData = $request->validate([
            'provinsi_id' => 'required',
            'nama_kabkot' => 'required'
        ]);

        Kabkot::where('id', $kabkot->id)
            ->update($validatedData);

        return redirect('/dashboard/kabkots')->with('success', "Data Kabupaten Kota '$kabkot->nama_kabkot' telah berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kabkot  $kabkot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kabkot $kabkot)
    {
        $result = Kecamatan::where('kabkot_id','=',$kabkot->id)->get();
        if ($result->isEmpty()) {
            Kabkot::destroy($kabkot->id);
            return redirect('/dashboard/kabkots')->with('success', "Data Kabupaten Kota '$kabkot->nama_kabkot' berhasil dihapus");
        } else {
            return redirect('/dashboard/kabkots')->with('failure', "Data Kabupaten Kota '$kabkot->nama_kabkot' tidak dapat dihapus karena masih memiliki Data Kecamatan");
        }
    }
}
