<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-5 py-5">

            <!-- Informasi Kantor -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Pusat Informasi</h4>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt me-3"></i>
                    Sekretariat Penanggulangan Bencana, Jakarta, Indonesia
                </p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 812 3456 7890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i> bantuan@kebencanaan.id</p>

                <div class="d-flex pt-3">
                    <a class="btn btn-square btn-primary me-2" href="#"><i class="fab fa-x-twitter"></i></a>
                    <a class="btn btn-square btn-primary me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-primary me-2" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-primary me-2" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Link Cepat -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Navigasi</h4>
                <a class="btn btn-link" href="{{ url('dashboard') }}">Beranda</a>
                <a class="btn btn-link" href="{{ route('tentang.index') }}">Tentang Kami</a>
                <a class="btn btn-link" href="{{ url('kejadian') }}">Lapor Bencana</a>
                <a class="btn btn-link" href="{{ url('donasi') }}">Donasi</a>
                <a class="btn btn-link" href="#">Kontak</a>
            </div>

            <!-- Jam Layanan -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Layanan</h4>
                <p class="mb-1">Senin - Jumat</p>
                <h6 class="text-light">08.00 - 17.00 WIB</h6>

                <p class="mb-1">Sabtu</p>
                <h6 class="text-light">08.00 - 12.00 WIB</h6>

                <p class="mb-1">Minggu / Hari Libur</p>
                <h6 class="text-light">Layanan Darurat 24 Jam</h6>
            </div>

            <!-- Galeri -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Galeri Kegiatan</h4>
                <div class="row g-2">
                    <div class="col-4">
                        <img class="img-fluid w-100" src="{{ asset('assets-guest/img/bencana1.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid w-100" src="{{ asset('assets-guest/img/bencana2.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid w-100" src="{{ asset('assets-guest/img/bencana3.jpeg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid w-100" src="{{ asset('assets-guest/img/bencana4.jpg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid w-100" src="{{ asset('assets-guest/img/logistics.jpeg') }}" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid w-100" src="{{ asset('assets-guest/img/about.jpg') }}" alt="">
                    </div>
                </div>
            </div>

        </div>

        <!-- Copyright -->
        <div class="copyright pt-5">
            <div class="row">

                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-semi-bold" href="#">Kebencanaan Indonesia</a>. All Rights Reserved.
                </div>

                <div class="col-md-6 text-center text-md-end">
                    <!--/*** LISENSI TEMPLATE — JANGAN DIHAPUS ***/-->
                    Designed By <a class="fw-semi-bold" href="https://htmlcodex.com">HTML Codex</a>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- Footer End -->
