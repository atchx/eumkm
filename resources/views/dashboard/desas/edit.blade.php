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
                                    <div>Desa
                                        <div class="page-title-subheading">Halaman untuk mengubah Data Desa yang tersedia pada E-UMKM.
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>            
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Formulir Desa</h5>
                                        <form class="" method="POST" action="/dashboard/desas/{{ $desa->id }}">
                                            @method('put')
                                            @csrf
                                            <div class="position-relative row form-group">
                                                <label for="nama_kecamatan" class="col-sm-2 col-form-label">Nama Kabupaten Kota</label>
                                                <div class="col-sm-10">
                                                    <select name="kecamatan_id" id="nama_kecamatan" class="form-control">
                                                        @foreach ( $kecamatans as $kecamatan)
                                                            @if(old('kecamatan_id', $desa->kecamatan_id) == $kecamatan->id)
                                                                <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->nama_kecamatan }}</option>
                                                            @else
                                                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="nama_desa" class="col-sm-2 col-form-label">Nama Kabupaten</label>
                                                <div class="col-sm-10">
                                                    <input name="nama_desa" id="nama_desa" placeholder="Nama Kabupaten" type="text" class="form-control" required value="{{ old('nama_desa', $desa->nama_desa) }}">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                    <a href="/dashboard/desas" class="btn btn-danger">Batal</a>
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