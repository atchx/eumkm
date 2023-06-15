<?php

namespace App\Http\Controllers;

use App\Models\Gambarproduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function produk()
    {
        if(request('search')) {
            $produks = Produk::where('nama_produk', 'like', '%' . request('search') . '%')->get()->sortBy('nama_produk');
        } else {
            $produks = Produk::all()->sortBy('nama_produk');
        }
        $ke = 0;
        foreach ($produks as $produk) {
            $gambar = Gambarproduk::where('produk_id',$produk->id)->first();
            $produks[$ke]->setAttribute('gambar', $gambar->gambar);
            $ke+=1;
        }
        $total = $produks->count();
        return view('products.index', [
            'produks' => $produks,
            'total' => $total
        ]);
    }

    public function view($id)
    {
        $produk = Produk::where('id',$id)->first();
        $gambar = Gambarproduk::where('produk_id',$id)->first();
        // $produk->append('gambar');
        // $produk->append(['gambar', $gambar->gambar]);
        $produk->setAttribute('gambar', $gambar->gambar);
        $gambars = Gambarproduk::where('produk_id',$id)->get();
        // return $gambars;
        return view('products.detail', [
            'produk' => $produk,
            'gambars' => $gambars
        ]);
    }
}
