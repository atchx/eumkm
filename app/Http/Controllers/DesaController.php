<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.desas.index', [
            'desas' => Desa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.desas.create', [
            'kecamatans' => Kecamatan::all()
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
            'kecamatan_id' => 'required',
            'nama_desa' => 'required'
        ]);

        Desa::create($validatedData);

        return redirect('/dashboard/desas')->with('success', "Data Desa '$request->nama_desa' telah berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function show(Desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function edit(Desa $desa)
    {
        return view('dashboard.desas.edit', [
            'desa' => $desa,
            'kecamatans' => Kecamatan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desa $desa)
    {
        $validatedData = $request->validate([
            'kecamatan_id' => 'required',
            'nama_desa' => 'required'
        ]);

        Desa::where('id', $desa->id)
            ->update($validatedData);

        return redirect('/dashboard/desas')->with('success', "Data Desa '$desa->nama_desa' telah berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desa $desa)
    {
        Desa::destroy($desa->id);
        return redirect('/dashboard/desas')->with('success', "Data Desa '$desa->nama_desa' berhasil dihapus");
    }
}
