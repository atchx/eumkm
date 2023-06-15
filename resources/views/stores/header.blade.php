<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="/store/img/logo.png" alt=""></a>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li ><a href="/">Home</a></li>
                <li class="{{ Request::is('stores*') ? 'active' : '' }}"><a href="/stores">Unit Usaha</a></li>
                <li class="{{ Request::is('products*') ? 'active' : '' }}"><a href="/products">Produk</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="header__logo">
                        <a href="/"><img src="/store/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li class="{{ Request::is('stores*') ? 'active' : '' }}"><a href="/stores">Unit Usaha</a></li>
                            <li class="{{ Request::is('products*') ? 'active' : '' }}"><a href="/products">Produk</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->