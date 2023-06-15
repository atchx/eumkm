<?php

namespace App\Http\Controllers;

use App\Models\Gambarproduk;
use Illuminate\Http\Request;
use App\Models\Gambarusaha;
use App\Models\Produk;
use App\Models\Usaha;

class StoreController extends Controller
{
    public function show()
    {
        $usahas = Usaha::all()->sortBy('nama_usaha')->take(3);
        $ke = 0;
        foreach ($usahas as $usaha) {
            $gambar = Gambarusaha::where('usaha_id',$usaha->id)->first();
            $usahas[$ke]->setAttribute('gambar', $gambar->gambar);
            $ke+=1;
        }
        return view('usaha', [
            'usahas' => $usahas
        ]);
    }

    public function unitusaha()
    {
        if(request('search')) {
            $usahas = Usaha::where('nama_usaha', 'like', '%' . request('search') . '%')->get()->sortBy('nama_usaha');
        } else {
            $usahas = Usaha::all()->sortBy('nama_usaha');
        }
        $ke = 0;
        foreach ($usahas as $usaha) {
            $gambar = Gambarusaha::where('usaha_id',$usaha->id)->first();
            $usahas[$ke]->setAttribute('gambar', $gambar->gambar);
            $ke+=1;
        }
        $total = $usahas->count();
        return view('stores.index', [
            'usahas' => $usahas,
            'total' => $total
        ]);
    }

    public function view($id)
    {
        $usaha = Usaha::where('id',$id)->first();
        $gambar = Gambarusaha::where('usaha_id',$id)->first();
        $usaha->setAttribute('gambar', $gambar->gambar);
        $gambars = Gambarusaha::where('usaha_id',$id)->get();

        $produks = Produk::where('usaha_id',$id)->get();
        $ke = 0;
        foreach ($produks as $produk) {
            $gambar = Gambarproduk::where('produk_id',$produk->id)->first();
            $produks[$ke]->setAttribute('gambar', $gambar->gambar);
            $ke+=1;
        }

        return view('stores.detail', [
            'usaha' => $usaha,
            'gambars' => $gambars,
            'produks' => $produks
        ]);
    }
}
