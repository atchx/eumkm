@extends('stores.main')

@section('container')
    @include('products.breadcrumb')
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="/{{ $produk->gambar }}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach ($gambars as $gambar)
                            <img data-imgbigurl="/{{ $gambar->gambar }}"
                                src="/{{ $gambar->gambar }}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $produk->nama_produk }}</h3>
                        <div class="product__details__price">Rp. {{ $produk->harga }}/{{ $produk->satuan_beli }}</div>
                        <p>{{ $produk->deskripsi_produk }}</p>
                        <a href="https://wa.me/{{ $produk->usaha->nohp }}" target="_blank" class="primary-btn">Kontak Pengusaha</a>
                        <ul>
                            <li><b>Nama Unit Usaha</b> <span><a href="/stores/{{ $produk->usaha_id }}" style="color: inherit;"><b>{{ $produk->usaha->nama_usaha }}</b></a></span></li>
                            <li><b>Lokasi Unit Usaha</b> <span>{{ $produk->usaha->alamat_usaha }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
@endsection