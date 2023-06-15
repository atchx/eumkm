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
                                    <div>Mengubah Pengguna
                                        <div class="page-title-subheading">Mengubah data pengguna yang dapat mengakses Dashboard Admin E-UMKM.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Formulir Pengguna</h5>
                                        <form class="" method="POST" action="/dashboard/users/{{ $user->id }}">
                                            @method('put')
                                            @csrf
                                            <div class="position-relative row form-group">
                                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input name="name" id="name" placeholder="Nama Pengguna" type="text" class="form-control" required autofocus value="{{ old('name', $user->name) }}">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input name="email" id="email" placeholder="Email Pengguna" type="email" class="form-control" required value="{{ old('email', $user->email) }}">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input name="password" id="password" placeholder="Password Pengguna" type="password" class="form-control" required>
                                                    <small class="form-text text-muted">Harap masukan kembali password</small>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="nohp" class="col-sm-2 col-form-label">Nomor HP</label>
                                                <div class="col-sm-10">
                                                    <input name="nohp" id="nohp" placeholder="Nomor HP Pengguna" type="text" class="form-control" required value="{{ old('nohp', $user->nohp) }}">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                    <a href="/dashboard/users" class="btn btn-danger">Batal</a>
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