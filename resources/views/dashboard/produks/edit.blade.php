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
                                    <div>Produk
                                        <div class="page-title-subheading">Halaman untuk mengubah Data Produk yang tersedia pada E-UMKM.
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>            
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Formulir Produk</h5>
                                        <form class="" method="POST" action="/dashboard/produks/{{ $produk->id }}" enctype="multipart/form-data">
                                            @method('put')
                                            @csrf
                                            <div class="position-relative row form-group">
                                                <label for="nama_usaha" class="col-sm-2 col-form-label">Nama Unit Usaha</label>
                                                <div class="col-sm-10">
                                                    <select name="usaha_id" id="nama_usaha" class="form-control">
                                                        @foreach ( $usahas as $usaha)
                                                            @if(old('usaha_id', $produk->usaha_id) == $usaha->id)
                                                                <option value="{{ $usaha->id }}" selected>{{ $usaha->nama_usaha }}</option>
                                                            @else
                                                                <option value="{{ $usaha->id }}">{{ $usaha->nama_usaha }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                                                <div class="col-sm-10">
                                                    <input name="nama_produk" id="nama_produk" placeholder="Nama Produk" type="text" class="form-control" required value="{{ old('nama_produk', $produk->nama_produk) }}">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="deskripsi_produk" class="col-sm-2 col-form-label">Deskripsi Produk</label>
                                                <div class="col-sm-10">
                                                    <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" required>{{ $produk->deskripsi_produk }}</textarea>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="harga" class="col-sm-2 col-form-label">Harga Produk</label>
                                                <div class="col-sm-10">
                                                    <input name="harga" id="harga" placeholder="Harga Produk" type="text" class="form-control" required value="{{ old('harga', $produk->harga) }}">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="satuan_beli" class="col-sm-2 col-form-label">Satuan Beli</label>
                                                <div class="col-sm-10">
                                                    <input name="satuan_beli" id="satuan_beli" placeholder="Satuan Beli" type="text" class="form-control" required value="{{ old('satuan_beli', $produk->satuan_beli) }}">
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group">
                                                <label for="gambar" class="col-sm-2 col-form-label">Gambar Produk</label>
                                                <div class="col-sm-10">
                                                    <input name="gambars[]" id="gambar" type="file" class="form-control-file" multiple required onchange="previewImage">
                                                    <small class="form-text text-muted">Harap masukan kembali gambar. Pilih semua gambar sekaligus.</small>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-check">
                                                <div class="col-sm-10 offset-sm-2">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                    <a href="/dashboard/produks" class="btn btn-danger">Batal</a>
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