<?php

namespace App\Http\Controllers;

use App\Models\Gambarproduk;
use App\Models\Produk;
use App\Models\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.produks.index', [
            'produks' => Produk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.produks.create', [
            'usahas' => Usaha::all()->sortBy('nama_usaha')
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
            'usaha_id' => 'required',
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga' => 'required',
            'satuan_beli' => 'required'
        ]);

        Produk::create($validatedData);
        $produk = Produk::where('usaha_id',$request->usaha_id)->where('nama_produk',$request->nama_produk)->first();

        if ($request->hasFile('gambars')) {
            foreach ($request->file('gambars') as $gambar) {
                $validatedGambar['produk_id'] = $produk->id;
                $validatedGambar['gambar'] = $gambar->store('gambar-produks');
                
                Gambarproduk::create($validatedGambar);
            }
        }

        return redirect('/dashboard/produks')->with('success', "Data Produk '$request->nama_produk' telah berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('dashboard.produks.edit', [
            'produk' => $produk,
            'usahas' => Usaha::all()->sortBy('nama_usaha')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $validatedData = $request->validate([
            'usaha_id' => 'required',
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga' => 'required',
            'satuan_beli' => 'required'
        ]);

        Produk::where('id', $produk->id)->update($validatedData);

        $oldImage = Gambarproduk::where('produk_id', $produk->id)->get();
        foreach ($oldImage as $old) {
            Storage::delete($old->gambar);
            Gambarproduk::destroy($old->id);
        }

        if ($request->hasFile('gambars')) {
            foreach ($request->file('gambars') as $gambar) {
                $validatedGambar['produk_id'] = $produk->id;
                $validatedGambar['gambar'] = $gambar->store('gambar-produks');
                
                Gambarproduk::create($validatedGambar);
            }
        }

        return redirect('/dashboard/produks')->with('success', "Data Produk '$request->nama_produk' telah berhasil diperbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $oldImage = Gambarproduk::where('produk_id', $produk->id)->get();
        foreach ($oldImage as $old) {
            Storage::delete($old->gambar);
            Gambarproduk::destroy($old->id);
        }
        Produk::destroy($produk->id);

        return redirect('/dashboard/produks')->with('success', "Data Produk '$produk->nama_produk' berhasil dihapus");
    }
}
