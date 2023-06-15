<div class="top-header-area" id="sticker">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12 text-center">
				<div class="main-menu-wrap">
					<!-- logo -->
					<div class="site-logo">
						<a href="index.html">
							<img src="assets/img/logo.png" alt="">
						</a>
					</div>
					<!-- logo -->
					<!-- menu start -->
					<nav class="main-menu">
						<ul>
							<li class="{{ Request::is('/') ? 'current-list-item' : '' }}"><a href="/">Beranda</a></li>
							<li class="{{ Request::is('about*') ? 'current-list-item' : '' }}"><a href="/about">Tentang</a></li>
							<li class="{{ Request::is('usaha*') ? 'current-list-item' : '' }}"><a href="/usaha">Unit Usaha</a></li>
							<li class="{{ Request::is('kontak*') ? 'current-list-item' : '' }}"><a href="/kontak">Kontak</a></li>
						</ul>
					</nav>
					<div class="mobile-menu"></div>
					<!-- menu end -->
				</div>
			</div>
		</div>
	</div>
</div>