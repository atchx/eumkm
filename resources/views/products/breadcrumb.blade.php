<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/store/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ $produk->nama_produk }}</h2>
                        <div class="breadcrumb__option">
                            <a href="/stores">Home</a>
                            <a href="/stores/{{ $produk->usaha_id }}">{{ $produk->usaha->nama_usaha }}</a>
                            <span>{{ $produk->nama_produk }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>