                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a href="/dashboard" class="{{ Request::is('dashboard') ? 'mm-active' : '' }}" >
                                        <i class="metismenu-icon pe-7s-home"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Utama</li>
                                <li>
                                    <a href="/dashboard/usahas" class="{{ Request::is('dashboard/usahas*') ? 'mm-active' : '' }}">
                                        <i class="metismenu-icon pe-7s-culture"></i>
                                        Unit Usaha
                                    </a>
                                </li>
                                <li>
                                    <a href="/dashboard/produks" class="{{ Request::is('dashboard/produks*') ? 'mm-active' : '' }}">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Produk
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Lokasi</li>
                                <li>
                                    <a href="/dashboard/provinsis" class="{{ Request::is('dashboard/provinsis*') ? 'mm-active' : '' }}">
                                        <i class="metismenu-icon pe-7s-map"></i>
                                        Provinsi
                                    </a>
                                </li>
                                <li>
                                    <a href="/dashboard/kabkots" class="{{ Request::is('dashboard/kabkots*') ? 'mm-active' : '' }}">
                                        <i class="metismenu-icon pe-7s-map-2"></i>
                                        Kabupaten Kota
                                    </a>
                                </li>
                                <li>
                                    <a href="/dashboard/kecamatans" class="{{ Request::is('dashboard/kecamatans*') ? 'mm-active' : '' }}">
                                        <i class="metismenu-icon pe-7s-map-marker"></i>
                                        Kecamatan
                                    </a>
                                </li>
                                <li>
                                    <a href="/dashboard/desas" class="{{ Request::is('dashboard/desas*') ? 'mm-active' : '' }}">
                                        <i class="metismenu-icon pe-7s-pin"></i>
                                        Desa
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Admin</li>
                                <li>
                                    <a href="/dashboard/users" class="{{ Request::is('dashboard/users*') ? 'mm-active' : '' }}">
                                        <i class="metismenu-icon pe-7s-users">
                                        </i>Pengguna
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>