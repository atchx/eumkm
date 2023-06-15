@extends('layouts.main')

@section('container')
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Unit Usaha</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- more products -->
	<div class="contact-from-section mt-100 mb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3>Unit <span class="orange-text">Usaha</span></h3>
						<p>Berikut adalah data unit usaha yang mungkin menarik minat Anda.</p>
					</div>
				</div>
			</div>
			<div class="row">
                @foreach ($usahas as $usaha)
                <div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="/stores/{{ $usaha->id }}"><img src="{{ $usaha->gambar }}" alt="" height="auto"></a>
						</div>
						<h3>{{ $usaha->nama_usaha }}</h3>
						<p class="product-price"><span>{{ $usaha->nama_pemilik }}</span></p>
					</div>
				</div>
                @endforeach
			</div>
            <div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
                        <a href="/stores" class="cart-btn">Lihat Selengkapnya</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end more products -->
@endsection