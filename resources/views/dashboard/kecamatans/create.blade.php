@extends('dashboard.layouts.main')

@section('container')
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-map-marker text-success">
                                        </i>
                                    </div>
                                    <div>Kecamatan
                                        <div class="page-title-subheading">Halaman untuk menambah Data Kecamatan yang tersedia pada E-UMKM.
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>            
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Formulir Kabupaten Kota</h5>
                                        <form class="" method="POST" action="/dashboard/kecamatans">
                                            @csrf
                                            <div class="position-relative row form-group">
                                                <label for="nama_kabkot" class="col-sm-2 col-form-label">Nama Kabupaten</label>
                                                <div class="col-sm-10">
                                                    <select name="kabkot_id" id="nama_kabkot" class="form-control">
                                                        @foreach ( $kabkots as $kabkot)
                                                        <option value="{{ $kabkot->id }}">{{ $kabkot->nama_kabkot }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="nama_kecamatan" class="col-sm-2 col-form-label">Nama Kecamatan</label>
                                                <div class="col-sm-10">
                                                    <input name="nama_kecamatan" id="nama_kecamatan" placeholder="Nama Kabupaten" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                    <a href="/dashboard/kecamatans" class="btn btn-danger">Batal</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection