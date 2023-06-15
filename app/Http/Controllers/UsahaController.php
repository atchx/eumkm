<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Gambarusaha;
use App\Models\Produk;
use App\Models\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.usahas.index', [
            'usahas' => Usaha::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.usahas.create', [
            'desas' => Desa::all()->sortBy('nama_desa')
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
            'nama_usaha' => 'required',
            'deskripsi_usaha' => 'required',
            'nama_pemilik' => 'required',
            'alamat_usaha' => 'required',
            'perizinan' => 'required',
            'koordinat' => 'required',
            'nohp' => 'required',
            'desa_id' => 'required'
        ]);

        Usaha::create($validatedData);
        $usaha = Usaha::where('nama_usaha',$request->nama_usaha)->where('nama_pemilik',$request->nama_pemilik)->first();

        // $request->validate([
        //     'gambars' => 'required|image'
        // ]);
        if ($request->hasFile('gambars')) {
            foreach ($request->file('gambars') as $gambar) {
                $validatedGambar['usaha_id'] = $usaha->id;
                $validatedGambar['gambar'] = $gambar->store('gambar-usahas');
                
                Gambarusaha::create($validatedGambar);
            }
        }
        return redirect('/dashboard/usahas')->with('success', "Data Unit Usaha '$request->nama_usaha' telah berhasil ditambahkan");
        // ddd($request);
        // return $request->file('gambar')->store('gambar-usahas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function show(Usaha $usaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function edit(Usaha $usaha)
    {
        return view('dashboard.usahas.edit', [
            'usaha' => $usaha,
            'desas' => Desa::all()->sortBy('nama_desa')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usaha $usaha)
    {
        $validatedData = $request->validate([
            'nama_usaha' => 'required',
            'deskripsi_usaha' => 'required',
            'nama_pemilik' => 'required',
            'alamat_usaha' => 'required',
            'perizinan' => 'required',
            'koordinat' => 'required',
            'nohp' => 'required',
            'desa_id' => 'required'
        ]);

        Usaha::where('id', $usaha->id)->update($validatedData);

        $oldImage = Gambarusaha::where('usaha_id', $usaha->id)->get();
        foreach ($oldImage as $old) {
            Storage::delete($old->gambar);
            Gambarusaha::destroy($old->id);
        }

        if ($request->hasFile('gambars')) {
            foreach ($request->file('gambars') as $gambar) {
                $validatedGambar['usaha_id'] = $usaha->id;
                $validatedGambar['gambar'] = $gambar->store('gambar-usahas');
                
                Gambarusaha::create($validatedGambar);
            }
        }

        return redirect('/dashboard/usahas')->with('success', "Data Unit Usaha '$request->nama_usaha' telah berhasil diperbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usaha $usaha)
    {
        $result = Produk::where('usaha_id','=',$usaha->id)->get();
        if ($result->isEmpty()) {
            $oldImage = Gambarusaha::where('usaha_id', $usaha->id)->get();
            foreach ($oldImage as $old) {
                Storage::delete($old->gambar);
                Gambarusaha::destroy($old->id);
            }    
            Usaha::destroy($usaha->id);
            return redirect('/dashboard/usahas')->with('success', "Data Unit Usaha '$usaha->nama_usaha' berhasil dihapus");
        } else {
            return redirect('/dashboard/usahas')->with('failure', "Data Unit Usaha '$usaha->nama_usaha' tidak dapat dihapus karena masih memiliki Data Produk");
        }
    }
}
