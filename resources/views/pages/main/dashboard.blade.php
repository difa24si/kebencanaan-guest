@extends('layouts.guest.app')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="carousel-text">
                            <h1 class="display-1 text-uppercase mb-3">Bantuan Kebencanaan</h1>
                            <p class="fs-5 mb-5">Siaga, Tanggap, dan Tangguh Bersama.</p>
                            <div class="d-flex">
                                <a class="btn btn-primary py-3 px-4 me-3" href="">Donate Now</a>
                                <a class="btn btn-secondary py-3 px-4" href="">Join Us Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="carousel-img">
                            <img class="w-100" src="{{ asset('assets-guest/img/bencana2.jpg') }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="carousel-text">
                            <h1 class="display-1 text-uppercase mb-3">Kalaborasi untuk kemanusiaan</h1>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary py-3 px-4 me-3" href="">Donate Now</a>
                                <a class="btn btn-secondary py-3 px-4" href="">Join Us Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="carousel-img">
                            <img class="w-100" src="{{ asset('assets-guest/img/bencana2.jpeg') }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-12 col-lg-4 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="service-title">
                        <h1 class="display-6 mb-4">What We Do for Those in Need.</h1>
                        <p class="fs-5 mb-0">We work to bring smiles, hope, and a brighter future to those in need.</p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 col-xl-9">
                    <div class="row g-5">
                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-droplet fa-2x text-secondary"></i>
                                </div>
                                <h3>Pure Water</h3>
                                <p class="mb-2">We’re creating programs that address urgent needs while fostering
                                    long-term solutions for sustainable change.</p>
                                <a href="">Read More</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-hospital fa-2x text-secondary"></i>
                                </div>
                                <h3>Health Care</h3>
                                <p class="mb-2">We’re creating programs that address urgent needs while fostering
                                    long-term solutions for sustainable change.</p>
                                <a href="">Read More</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-hands-holding-child fa-2x text-secondary"></i>
                                </div>
                                <h3>Social Care</h3>
                                <p class="mb-2">We’re creating programs that address urgent needs while fostering
                                    long-term solutions for sustainable change.</p>
                                <a href="">Read More</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-bowl-food fa-2x text-secondary"></i>
                                </div>
                                <h3>Healthy Food</h3>
                                <p class="mb-2">We’re creating programs that address urgent needs while fostering
                                    long-term solutions for sustainable change.</p>
                                <a href="">Read More</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-school-flag fa-2x text-secondary"></i>
                                </div>
                                <h3>Primary Education</h3>
                                <p class="mb-2">We’re creating programs that address urgent needs while fostering
                                    long-term solutions for sustainable change.</p>
                                <a href="">Read More</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="service-item h-100">
                                <div class="btn-square bg-light mb-4">
                                    <i class="fa fa-home fa-2x text-secondary"></i>
                                </div>
                                <h3>Residence Facilities</h3>
                                <p class="mb-2">We’re creating programs that address urgent needs while fostering
                                    long-term solutions for sustainable change.</p>
                                <a href="">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Features Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="rounded overflow-hidden">
                        <div class="row g-0">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="text-center bg-primary py-5 px-4 h-100">
                                    <i class="fa fa-users fa-3x text-secondary mb-3"></i>
                                    <h1 class="display-5 mb-0" data-toggle="counter-up">500</h1>
                                    <span class="text-dark">Team Members</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="text-center bg-secondary py-5 px-4 h-100">
                                    <i class="fa fa-award fa-3x text-primary mb-3"></i>
                                    <h1 class="display-5 text-white mb-0" data-toggle="counter-up">70</h1>
                                    <span class="text-white">Award Winning</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="text-center bg-secondary py-5 px-4 h-100">
                                    <i class="fa fa-list-check fa-3x text-primary mb-3"></i>
                                    <h1 class="display-5 text-white mb-0" data-toggle="counter-up">3000</h1>
                                    <span class="text-white">Total Projects</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                                <div class="text-center bg-primary py-5 px-4 h-100">
                                    <i class="fa fa-comments fa-3x text-secondary mb-3"></i>
                                    <h1 class="display-5 mb-0" data-toggle="counter-up">7000</h1>
                                    <span class="text-dark">Client's Review</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="section-title bg-white text-start text-primary pe-3">Why Us!</p>
                    <h1 class="display-6 mb-4 wow fadeIn" data-wow-delay="0.2s">Few Reasons Why People Choosing Us!
                    </h1>
                    <p class="mb-4 wow fadeIn" data-wow-delay="0.3s">We believe in creating opportunities and
                        empowering communities through education, healthcare, and sustainable development. Your support
                        helps us bring smiles, hope, and a brighter future to those in need.</p>
                    <p class="text-dark wow fadeIn" data-wow-delay="0.4s"><i
                            class="fa fa-check text-primary me-2"></i>Justo magna erat amet</p>
                    <p class="text-dark wow fadeIn" data-wow-delay="0.5s"><i
                            class="fa fa-check text-primary me-2"></i>Aliqu diam amet diam et eos</p>
                    <p class="text-dark wow fadeIn" data-wow-delay="0.6s"><i
                            class="fa fa-check text-primary me-2"></i>Clita erat ipsum et lorem et sit</p>
                    <div class="d-flex mt-4 wow fadeIn" data-wow-delay="0.7s">
                        <a class="btn btn-primary py-3 px-4 me-3" href="">Donate Now</a>
                        <a class="btn btn-secondary py-3 px-4" href="">Join Us Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Logistik Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-6 mb-4">Logistik</h1>
                    <p class="fs-5 mb-4">Akses informasi logistik bantuan dan distribusi barang.</p>
                    <a class="btn btn-primary py-3 px-4" href="{{ route('logistik.index') }}">Lihat Dashboard Logistik</a>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid" src="{{ asset('assets-guest/img/logistics.jpeg') }}" alt="Logistik Image">
                </div>
            </div>
        </div>
    </div>
    <!-- Logistik End -->

    <!-- Team Start -->
    <!-- Developer Profile Section Start -->
    <div class="container-fluid bg-dark text-light py-5">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-4 text-center">
                    <img src="{{ asset('assets-guest/img/profile.jpg') }}" alt="Foto Pengembang"
                        class="img-fluid rounded-circle shadow" style="width: 200px; height: 200px; object-fit: cover;">
                </div>

                <div class="col-lg-8">
                    <h3 class="text-light mb-3">Identitas Pengembang</h3>
                    <p class="mb-1"><strong>Nama :</strong> Difa Mardiani</p>
                    <p class="mb-1"><strong>NIM :</strong> 2457301034</p>
                    <p class="mb-1"><strong>Program Studi :</strong> Sistem Informasi</p>
                    <p class="mb-3"><strong>Kampus :</strong> Politeknik Caltex Riau</p>

                    <div class="d-flex align-items-center mt-3 flex-wrap">

                        <a href="https://www.linkedin.com/in/difa-mardiani-4464a6399?utm_source=share_via&utm_content=profile&utm_medium=member_ios"
                            target="_blank">
                            <i class="fab fa-linkedin me-2"></i>LinkedIn
                        </a>

                        <a href="https://github.com/difa24si"
                           target="_blank">
                            <i class="fab fa-github me-2"></i>GitHub
                        </a>

                        <a href="https://www.instagram.com/dpakepsyc?igsh=MWdnbXpuanVyNHp0Ng%3D%3D&utm_source=qr"
                            target="_blank">
                            <i class="fab fa-instagram me-2"></i>Instagram
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Developer Profile Section End -->

    <!-- Team End -->
@endsection
