<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kabkot;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kecamatans.index', [
            'kecamatans' => Kecamatan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kecamatans.create', [
            'kabkots' => Kabkot::all()
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
            'kabkot_id' => 'required',
            'nama_kecamatan' => 'required'
        ]);

        Kecamatan::create($validatedData);

        return redirect('/dashboard/kecamatans')->with('success', "Data Kecamatan '$request->nama_kecamatan' telah berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        return view('dashboard.kecamatans.edit', [
            'kecamatan' => $kecamatan,
            'kabkots' => Kabkot::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $validatedData = $request->validate([
            'kabkot_id' => 'required',
            'nama_kecamatan' => 'required'
        ]);

        Kecamatan::where('id', $kecamatan->id)
            ->update($validatedData);

        return redirect('/dashboard/kecamatans')->with('success', "Data Kecamatan '$kecamatan->nama_kecamatan' telah berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        $result = Desa::where('kecamatan_id','=',$kecamatan->id)->get();
        if ($result->isEmpty()) {
            Kecamatan::destroy($kecamatan->id);
            return redirect('/dashboard/kecamatans')->with('success', "Data Kecamatan '$kecamatan->nama_kecamatan' berhasil dihapus");
        } else {
            return redirect('/dashboard/kecamatans')->with('failure', "Data Kecamatan '$kecamatan->nama_kecamatan' tidak dapat dihapus karena masih memiliki Data Desa");
        }
    }
}
