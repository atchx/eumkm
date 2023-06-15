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
                                    <div>Unit Usaha
                                        <div class="page-title-subheading">Halaman untuk mengubah Data Unit Usaha yang tersedia pada E-UMKM.
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>            
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Formulir Unit Usaha</h5>
                                        <form class="" method="POST" action="/dashboard/usahas/{{ $usaha->id }}" enctype="multipart/form-data">
                                            @method('put')
                                            @csrf
                                            <div class="position-relative row form-group">
                                                <label for="nama_usaha" class="col-sm-2 col-form-label">Nama Unit Usaha</label>
                                                <div class="col-sm-10">
                                                    <input name="nama_usaha" id="nama_usaha" placeholder="Nama Unit Usaha" type="text" class="form-control" required value="{{ old('nama_usaha', $usaha->nama_usaha) }}">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="deskripsi_usaha" class="col-sm-2 col-form-label">Deskripsi Usaha</label>
                                                <div class="col-sm-10">
                                                    <textarea name="deskripsi_usaha" id="deskripsi_usaha" class="form-control" required>{{ $usaha->deskripsi_usaha }}</textarea>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="nama_pemilik" class="col-sm-2 col-form-label">Nama Pemilik</label>
                                                <div class="col-sm-10">
                                                    <input name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik" type="text" class="form-control" required value="{{ old('nama_pemilik', $usaha->nama_pemilik) }}">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="alamat_usaha" class="col-sm-2 col-form-label">Alamat Unit Usaha</label>
                                                <div class="col-sm-10">
                                                    <input name="alamat_usaha" id="alamat_usaha" placeholder="Alamat Unit Usaha" type="text" class="form-control" required value="{{ old('alamat_usaha', $usaha->alamat_usaha) }}">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="perizinan" class="col-sm-2 col-form-label">Perizinan</label>
                                                <div class="col-sm-10">
                                                    <input name="perizinan" id="perizinan" placeholder="Perizinan" type="text" class="form-control" required value="{{ old('perizinan', $usaha->perizinan) }}">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="koordinat" class="col-sm-2 col-form-label">Koordinat</label>
                                                <div class="col-sm-10">
                                                    <input name="koordinat" id="koordinat" placeholder="koordinat" type="text" class="form-control" required value="{{ old('koordinat', $usaha->koordinat) }}">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="nohp" class="col-sm-2 col-form-label">Nomor HP</label>
                                                <div class="col-sm-10">
                                                    <input name="nohp" id="nohp" placeholder="Nomor HP" type="text" class="form-control" required value="{{ old('nohp', $usaha->nohp) }}">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="nama_desa" class="col-sm-2 col-form-label">Nama Desa</label>
                                                <div class="col-sm-10">
                                                    <select name="desa_id" id="nama_desa" class="form-control">
                                                        @foreach ( $desas as $desa)
                                                            @if(old('desa_id', $usaha->desa_id) == $desa->id)
                                                                <option value="{{ $desa->id }}" selected>{{ $desa->nama_desa }}</option>
                                                            @else
                                                                <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="gambar" class="col-sm-2 col-form-label">Gambar Unit Usaha</label>
                                                <div class="col-sm-10">
                                                    <input name="gambars[]" id="gambar" type="file" class="form-control-file" multiple required onchange="previewImage">
                                                    <small class="form-text text-muted">Harap masukan kembali gambar. Pilih semua gambar sekaligus.</small>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                    <a href="/dashboard/usahas" class="btn btn-danger">Batal</a>
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