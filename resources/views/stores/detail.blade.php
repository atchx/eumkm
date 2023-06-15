@extends('stores.main')

@section('container')
    <!-- Breadcrumb Section Begin -->
    @include('stores.breadcrumb')
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="/{{ $usaha->gambar }}" alt="">
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
                        <h3>{{ $usaha->nama_usaha }}</h3>
                        <p>{{ $usaha->deskripsi_usaha }}</br>
                            <b>Alamat</b> <span>{{ $usaha->alamat_usaha }}</span>
                        </p>
                        <ul class="mb-5">
                            <li><b>Nama Pemilik</b> <span>{{ $usaha->nama_pemilik }}</span></li>
                            <li><b>Nomor HP</b> <span>{{ $usaha->nohp }}</span></li>
                            <li><b>Prizinan</b> <span>{{ $usaha->perizinan }}</span></li>
                            <li><b>Provinsi</b> <span>{{ $usaha->desa->kecamatan->kabkot->provinsi->nama_provinsi }}</span></li>
                            <li><b>Kabupaten Kota</b> <span>{{ $usaha->desa->kecamatan->kabkot->nama_kabkot }}</span></li>
                            <li><b>Kecamatan</b> <span>{{ $usaha->desa->kecamatan->nama_kecamatan }}</span></li>
                            <li><b>Desa</b> <span>{{ $usaha->desa->nama_desa }}</span></li>
                        </ul>
                        <a href="https://wa.me/{{ $usaha->nohp }}" target="_blank" class="primary-btn">Kontak Pengusaha</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Produk Unit Usaha</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($produks as $produk)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <a href="/products/{{ $produk->id }}">
                            <div class="product__item__pic set-bg" data-setbg="/{{ $produk->gambar }}"></div>
                        </a>
                        <div class="product__item__text">
                            <h5>{{ $produk->nama_produk }}</h5>
                            <h6>{{ $produk->harga }}</h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?{{ $usaha->koordinat }}"
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <!-- <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>{{ $usaha->nama_usaha }}</h4>
                <ul>
                    <li>{{ $usaha->nohp }}</li>
                    <li>{{ $usaha->alamat_usaha }}</li>
                </ul>
            </div>
        </div> -->
    </div>
    <!-- Map End -->
@endsection