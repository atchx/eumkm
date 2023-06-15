@extends('dashboard.layouts.main')

@section('container')
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-map-marker icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>Kecamatan
                                        <div class="page-title-subheading">Halaman untuk mengelola Kecamatan yang tersedia pada E-UMKM.
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
                        @if(session()->has('failure'))
                        <div class="alert alert-danger fade show" role="alert">
                            {{ session('failure') }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Daftar Kecamatan
                                        <div class="btn-actions-pane-right">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <a href="/dashboard/kecamatans/create" class="btn-wide btn btn-success">+ Tambah Kecamatan</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Nama Kabupaten Kota</th>
                                                <th class="text-center">Nama Kecamatan</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($kecamatans as $kecamatan)
                                            <tr>
                                                <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                                <td class="text-center">
                                                    {{ $kecamatan->kabkot->nama_kabkot }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $kecamatan->nama_kecamatan }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="/dashboard/kecamatans/{{ $kecamatan->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="/dashboard/kecamatans/{{ $kecamatan->id }}" method="POST" class="d-inline">
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
