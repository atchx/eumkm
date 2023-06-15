@extends('dashboard.layouts.main')

@section('container')
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-culture text-success">
                                        </i>
                                    </div>
                                    <div>Unit Usaha
                                        <div class="page-title-subheading">Halaman untuk menambah Data Unit Usaha yang tersedia pada E-UMKM.
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>            
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Formulir Unit Usaha</h5>
                                        <form class="" method="POST" action="/dashboard/usahas" enctype="multipart/form-data">
                                            @csrf
                                            <div class="position-relative row form-group">
                                                <label for="nama_usaha" class="col-sm-2 col-form-label">Nama Unit Usaha</label>
                                                <div class="col-sm-10">
                                                    <input name="nama_usaha" id="nama_usaha" placeholder="Nama Unit Usaha" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="deskripsi_usaha" class="col-sm-2 col-form-label">Deskripsi Usaha</label>
                                                <div class="col-sm-10">
                                                    <textarea name="deskripsi_usaha" id="deskripsi_usaha" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="nama_pemilik" class="col-sm-2 col-form-label">Nama Pemilik</label>
                                                <div class="col-sm-10">
                                                    <input name="nama_pemilik" id="nama_pemilik" placeholder="Nama Pemilik" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="alamat_usaha" class="col-sm-2 col-form-label">Alamat Unit Usaha</label>
                                                <div class="col-sm-10">
                                                    <input name="alamat_usaha" id="alamat_usaha" placeholder="Alamat Unit Usaha" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="perizinan" class="col-sm-2 col-form-label">Perizinan</label>
                                                <div class="col-sm-10">
                                                    <input name="perizinan" id="perizinan" placeholder="Perizinan" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="koordinat" class="col-sm-2 col-form-label">Koordinat</label>
                                                <div class="col-sm-10">
                                                    <input name="koordinat" id="koordinat" placeholder="koordinat" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="nohp" class="col-sm-2 col-form-label">Nomor HP</label>
                                                <div class="col-sm-10">
                                                    <input name="nohp" id="nohp" placeholder="Nomor HP" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="nama_desa" class="col-sm-2 col-form-label">Nama Desa</label>
                                                <div class="col-sm-10">
                                                    <select name="desa_id" id="nama_desa" class="form-control">
                                                        @foreach ( $desas as $desa)
                                                        <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="gambar" class="col-sm-2 col-form-label">Gambar Unit Usaha</label>
                                                <div class="col-sm-10">
                                                    <input name="gambars[]" id="gambar" type="file" class="form-control-file" multiple required onchange="previewImage">
                                                    <small class="form-text text-muted">Pilih semua gambar sekaligus.</small>
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