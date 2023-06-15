@extends('dashboard.layouts.main')

@section('container')
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-map text-success">
                                        </i>
                                    </div>
                                    <div>Provinsi
                                        <div class="page-title-subheading">Halaman untuk menambah Data Provinsi yang tersedia pada E-UMKM.
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>            
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Formulir Provinsi</h5>
                                        <form class="" method="POST" action="/dashboard/provinsis">
                                            @csrf
                                            <div class="position-relative row form-group">
                                                <label for="nama_provinsi" class="col-sm-2 col-form-label">Nama Provinsi</label>
                                                <div class="col-sm-10">
                                                    <input name="nama_provinsi" id="nama_provinsi" placeholder="Nama Provinsi" type="text" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                    <a href="/dashboard/provinsis" class="btn btn-danger">Batal</a>
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