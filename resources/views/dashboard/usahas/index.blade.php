@extends('dashboard.layouts.main')

@section('container')
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-culture icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>Unit Usaha
                                        <div class="page-title-subheading">Halaman untuk mengelola Unit Usaha yang tersedia pada E-UMKM.
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
                                    <div class="card-header">Daftar Unit Usaha
                                        <div class="btn-actions-pane-right">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <a href="/dashboard/usahas/create" class="btn-wide btn btn-success">+ Tambah Unit Usaha</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Nama Unit Usaha</th>
                                                <th>Nama Pemilik</th>
                                                <th class="text-center">Perizinan</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($usahas as $usaha)
                                            <tr>
                                                <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                                <td>{{ $usaha->nama_usaha }}</td>
                                                <td>{{ $usaha->nama_pemilik }}</td>
                                                <td class="text-center">
                                                    {{ $usaha->perizinan }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="/stores/{{ $usaha->id }}" target="_blank" class="btn btn-primary btn-sm">Detail</a>
                                                    <a href="/dashboard/usahas/{{ $usaha->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="/dashboard/usahas/{{ $usaha->id }}" method="POST" class="d-inline">
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
