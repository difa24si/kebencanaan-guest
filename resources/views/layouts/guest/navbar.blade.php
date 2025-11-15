<!-- Navbar Start -->
<div class="container-fluid bg-secondary px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="nav-bar">
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark px-4 py-lg-0">
            <h4 class="d-lg-none m-0">Menu</h4>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto">
                    <a href="{{ url('dashboard') }}" class="nav-item nav-link {{ request()->is('dashboard') ? 'active' : '' }}">Home</a>
                    <a href="{{ url('warga') }}" class="nav-item nav-link {{ request()->is('warga') ? 'active' : '' }}">Data Warga</a>
                    <a href="{{ url('posko') }}" class="nav-item nav-link {{ request()->is('posko') ? 'active' : '' }}">Posko</a>
                    <a href="{{ url('kejadian') }}" class="nav-item nav-link {{ request()->is('kejadian') ? 'active' : '' }}">Kejadian</a>
                    <a href="{{ url('user') }}" class="nav-item nav-link {{ request()->is('user') ? 'active' : '' }}">Data User</a>

                    {{-- ✅ Tambahkan menu Tentang di sini --}}
                    <a href="{{ route('tentang.index') }}" class="nav-item nav-link {{ request()->is('tentang') ? 'active' : '' }}">Tentang</a>
                </div>

                <div class="d-none d-lg-flex ms-auto align-items-center">
                    @if (session('success'))
                        <div class="alert alert-success mb-0 me-3 py-2 px-3">{{ session('success') }}</div>
                    @endif

                    <p class="text-white mb-0 me-3">Anda berhasil login!</p>
                    <a class="btn btn-square btn-dark ms-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-dark ms-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-dark ms-2" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
