@extends('dashboard.layouts.main')

@section('container')
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-edit text-warning">
                                        </i>
                                    </div>
                                    <div>Kecamatan
                                        <div class="page-title-subheading">Halaman untuk mengubah Data Kecamatan yang tersedia pada E-UMKM.
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>            
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Formulir Kecamatan</h5>
                                        <form class="" method="POST" action="/dashboard/kecamatans/{{ $kecamatan->id }}">
                                            @method('put')
                                            @csrf
                                            <div class="position-relative row form-group">
                                                <label for="nama_kabkot" class="col-sm-2 col-form-label">Nama Kabupaten Kota</label>
                                                <div class="col-sm-10">
                                                    <select name="kabkot_id" id="nama_kabkot" class="form-control">
                                                        @foreach ( $kabkots as $kabkot)
                                                            @if(old('kabkot_id', $kecamatan->kabkot_id) == $kabkot->id)
                                                                <option value="{{ $kabkot->id }}" selected>{{ $kabkot->nama_kabkot }}</option>
                                                            @else
                                                                <option value="{{ $kabkot->id }}">{{ $kabkot->nama_kabkot }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="nama_kecamatan" class="col-sm-2 col-form-label">Nama Kabupaten</label>
                                                <div class="col-sm-10">
                                                    <input name="nama_kecamatan" id="nama_kecamatan" placeholder="Nama Kabupaten" type="text" class="form-control" required value="{{ old('nama_kecamatan', $kecamatan->nama_kecamatan) }}">
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