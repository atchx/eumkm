@extends('dashboard.layouts.main')

@section('container')
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-pin icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>Desa
                                        <div class="page-title-subheading">Halaman untuk mengelola Desa yang tersedia pada E-UMKM.
                                        </div>
                                    </div>
                                </div> 
                             </div>
                        </div>
                        @if(session()->has('success'))
                        <div class="alert alert-success fade show" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Daftar Desa
                                        <div class="btn-actions-pane-right">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <a href="/dashboard/desas/create" class="btn-wide btn btn-success">+ Tambah Desa</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Nama Kecamatan</th>
                                                <th class="text-center">Nama Desa</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($desas as $desa)
                                            <tr>
                                                <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                                <td class="text-center">
                                                    {{ $desa->kecamatan->nama_kecamatan }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $desa->nama_desa }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="/dashboard/desas/{{ $desa->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="/dashboard/desas/{{ $desa->id }}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
