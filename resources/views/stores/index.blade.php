@extends('stores.main')

@section('container')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/store/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Unit Usaha</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        
                        <div class="blog__sidebar__search">
                            <div class="sidebar__item">
                                <h4>Pencarian</h4>
                            </div>
                            <form action="/stores">
                                <input type="text" placeholder="Cari..." name="search" value="{{ request('search') }}">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <!-- <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select> -->
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{ $total }}</span> Unit Usaha ditemukan</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($usahas as $usaha)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="/stores/{{ $usaha->id }}">
                                    <div class="product__item__pic set-bg" data-setbg="{{ $usaha->gambar }}"></div>
                                </a>
                                <div class="product__item__text">
                                    <h5>{{ $usaha->nama_usaha }}</h5>
                                    <h6>{{ $usaha->perizinan }}</h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection
