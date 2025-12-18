<!-- Navbar Start -->
<div class="container-fluid bg-secondary px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="nav-bar">
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark px-4 py-lg-0">

            <!-- Title untuk Mobile -->
            <h4 class="d-lg-none m-0 text-white">Menu</h4>

            <!-- Toggle -->
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- COLLAPSE WRAPPER -->
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <!-- LEFT MENUS -->
                <div class="navbar-nav me-auto">

                    <a href="{{ url('dashboard') }}"
                        class="nav-item nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        Home
                    </a>

                    <a href="{{ url('warga') }}"
                        class="nav-item nav-link {{ request()->is('warga') ? 'active' : '' }}">
                        Data Warga
                    </a>

                    <a href="{{ url('posko') }}"
                        class="nav-item nav-link {{ request()->is('posko') ? 'active' : '' }}">
                        Posko
                    </a>

                    <a href="{{ url('kejadian') }}"
                        class="nav-item nav-link {{ request()->is('kejadian') ? 'active' : '' }}">
                        Kejadian
                    </a>

                    <a href="{{ url('donasi') }}"
                        class="nav-item nav-link {{ request()->is('donasi*') ? 'active' : '' }}">
                        Donasi
                    </a>

                    <a href="{{ route('user.index') }}"
                        class="nav-item nav-link {{ request()->is('user') ? 'active' : '' }}">
                        Data User
                    </a>

                    <a href="{{ route('tentang.index') }}"
                        class="nav-item nav-link {{ request()->is('tentang') ? 'active' : '' }}">
                        Tentang
                    </a>
                    <a href="{{ route('logistik.index') }}"
                        class="nav-item nav-link {{ request()->is('logistik') ? 'active' : '' }}">
                        Logistik Bencana
                    </a>
                     <a href="{{ route('distribusi-logistik.index') }}"
                        class="nav-item nav-link {{ request()->is('distribusi') ? 'active' : '' }}">
                        Distribusi Logistik
                </div>

                <!-- RIGHT PANEL -->
                <!-- RIGHT PANEL -->
                <div class="d-none d-lg-flex ms-auto align-items-center">

                    <!-- 👇 Tetap ditampilkan, tapi BUKAN flash message -->
                    <p class="text-white mb-0 me-3">Anda berhasil login!</p>

                    <a class="btn btn-square btn-dark ms-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-dark ms-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-dark ms-2" href="#"><i class="fab fa-youtube"></i></a>

                    <!-- 🔥 Tombol LOGOUT -->
                    <form action="{{ route('logout') }}" method="POST" class="ms-2">
                        @csrf
                        <button class="btn btn-square btn-danger" type="submit">
                            <i class="fa fa-sign-out-alt"></i>
                        </button>
                    </form>

                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
