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
                            <img class="w-100" src="{{ asset('assets-guest/img/carousel-1.jpg') }}" alt="Image">
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
                            <img class="w-100" src="{{ asset('assets-guest/img/carousel-2.jpg') }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s">
                    <div class="about-img">
                        <img class="img-fluid w-100" src="{{asset('assets-guest/img/about.jpg')}}" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <p class="section-title bg-white text-start text-primary pe-3">About Us</p>
                    <h1 class="display-6 mb-4 wow fadeIn" data-wow-delay="0.2s">Join Hands, Change the World</h1>
                    <p class="mb-4 wow fadeIn" data-wow-delay="0.3s">Every hand extended in kindness brings us closer
                        to a world free from suffering. Be part of a global movement dedicated to building a future
                        where equality and compassion thrive.</p>
                    <div class="row g-4 pt-2">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                            <div class="h-100">
                                <h3>Our Mission</h3>
                                <p>Our mission is to uplift underprivileged communities by providing resources,
                                    education, and tools for growth.</p>
                                <p class="text-dark"><i class="fa fa-check text-primary me-2"></i>No one should go to
                                    bed hungry.</p>
                                <p class="text-dark"><i class="fa fa-check text-primary me-2"></i>We spread kindness
                                    and support.</p>
                                <p class="text-dark mb-0"><i class="fa fa-check text-primary me-2"></i>We can change
                                    someone’s life.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="h-100 bg-primary p-4 text-center">
                                <p class="fs-5 text-dark">Through your donations, we spread kindness and support to
                                    children and families.</p>
                                <a class="btn btn-secondary py-2 px-4" href="">Donate Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


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


    <!-- Donation Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Donation</p>
                <h1 class="display-6 mb-4">Our Donation Causes Around the World</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="donation-item d-flex h-100 p-4">
                        <div class="donation-progress d-flex flex-column flex-shrink-0 text-center me-4">
                            <h6 class="mb-0">Raised</h6>
                            <span class="mb-2">$8000</span>
                            <div class="progress d-flex align-items-end w-100 h-100 mb-2">
                                <div class="progress-bar w-100 bg-secondary" role="progressbar" aria-valuenow="85"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <span class="fs-4">85%</span>
                                </div>
                            </div>
                            <h6 class="mb-0">Goal</h6>
                            <span>$10000</span>
                        </div>
                        <div class="donation-detail">
                            <div class="position-relative mb-4">
                                <img class="img-fluid w-100" src="img/donation-1.jpg" alt="">
                                <a href="#"
                                    class="btn btn-sm btn-secondary px-3 position-absolute top-0 end-0">Food</a>
                            </div>
                            <a href="#" class="h3 d-inline-block">Healthy Food</a>
                            <p>Through your donations and volunteer work, we spread kindness and support to children.
                            </p>
                            <a href="#" class="btn btn-primary w-100 py-3"><i
                                    class="fa fa-plus me-2"></i>Donate Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.13s">
                    <div class="donation-item d-flex h-100 p-4">
                        <div class="donation-progress d-flex flex-column flex-shrink-0 text-center me-4">
                            <h6 class="mb-0">Raised</h6>
                            <span class="mb-2">$8000</span>
                            <div class="progress d-flex align-items-end w-100 h-100 mb-2">
                                <div class="progress-bar w-100 bg-secondary" role="progressbar" aria-valuenow="95"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <span class="fs-4">95%</span>
                                </div>
                            </div>
                            <h6 class="mb-0">Goal</h6>
                            <span>$10000</span>
                        </div>
                        <div class="donation-detail">
                            <div class="position-relative mb-4">
                                <img class="img-fluid w-100" src="img/donation-2.jpg" alt="">
                                <a href="#"
                                    class="btn btn-sm btn-secondary px-3 position-absolute top-0 end-0">Health</a>
                            </div>
                            <a href="#" class="h3 d-inline-block">Water Treatment</a>
                            <p>Through your donations and volunteer work, we spread kindness and support to children.
                            </p>
                            <a href="#" class="btn btn-primary w-100 py-3"><i
                                    class="fa fa-plus me-2"></i>Donate Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="donation-item d-flex h-100 p-4">
                        <div class="donation-progress d-flex flex-column flex-shrink-0 text-center me-4">
                            <h6 class="mb-0">Raised</h6>
                            <span class="mb-2">$8000</span>
                            <div class="progress d-flex align-items-end w-100 h-100 mb-2">
                                <div class="progress-bar w-100 bg-secondary" role="progressbar" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <span class="fs-4">75%</span>
                                </div>
                            </div>
                            <h6 class="mb-0">Goal</h6>
                            <span>$10000</span>
                        </div>
                        <div class="donation-detail">
                            <div class="position-relative mb-4">
                                <img class="img-fluid w-100" src="img/donation-3.jpg" alt="">
                                <a href="#"
                                    class="btn btn-sm btn-secondary px-3 position-absolute top-0 end-0">Education</a>
                            </div>
                            <a href="#" class="h3 d-inline-block">Education Support</a>
                            <p>Through your donations and volunteer work, we spread kindness and support to children.
                            </p>
                            <a href="#" class="btn btn-primary w-100 py-3"><i
                                    class="fa fa-plus me-2"></i>Donate Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donation End -->


    <!-- Banner Start -->
    <div class="container-fluid banner py-5">
        <div class="container">
            <div class="banner-inner bg-light p-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="row justify-content-center">
                    <div class="col-lg-8 py-5 text-center">
                        <h1 class="display-6 wow fadeIn" data-wow-delay="0.3s">Our Door Are Always Open to More People
                            Who Want to Support Each Others!</h1>
                        <p class="fs-5 mb-4 wow fadeIn" data-wow-delay="0.5s">Through your donations and volunteer
                            work, we spread kindness and support to children, families, and communities struggling to
                            find stability.</p>
                        <div class="d-flex justify-content-center wow fadeIn" data-wow-delay="0.7s">
                            <a class="btn btn-primary py-3 px-4 me-3" href="">Donate Now</a>
                            <a class="btn btn-secondary py-3 px-4" href="">Join Us Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->


    <!-- Event Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Events</p>
                <h1 class="display-6 mb-4">Be a Part of a Global Movement</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="event-item h-100 p-4">
                        <img class="img-fluid w-100 mb-4" src="img/event-1.jpg" alt="">
                        <a href="#" class="h3 d-inline-block">Education Program</a>
                        <p>Through your donations and volunteer work, we spread kindness and support to children.</p>
                        <div class="bg-light p-4">
                            <p class="mb-1"><i class="fa fa-clock text-primary me-2"></i>10:00 AM - 18:00 PM</p>
                            <p class="mb-1"><i class="fa fa-calendar-alt text-primary me-2"></i>Jan 01 - Jan 10</p>
                            <p class="mb-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New
                                York, USA</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="event-item h-100 p-4">
                        <img class="img-fluid w-100 mb-4" src="img/event-2.jpg" alt="">
                        <a href="#" class="h3 d-inline-block">Awareness Program</a>
                        <p>Through your donations and volunteer work, we spread kindness and support to children.</p>
                        <div class="bg-light p-4">
                            <p class="mb-1"><i class="fa fa-clock text-primary me-2"></i>10:00 AM - 18:00 PM</p>
                            <p class="mb-1"><i class="fa fa-calendar-alt text-primary me-2"></i>Jan 01 - Jan 10</p>
                            <p class="mb-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New
                                York, USA</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="event-item h-100 p-4">
                        <img class="img-fluid w-100 mb-4" src="img/event-3.jpg" alt="">
                        <a href="#" class="h3 d-inline-block">Health Care Program</a>
                        <p>Through your donations and volunteer work, we spread kindness and support to children.</p>
                        <div class="bg-light p-4">
                            <p class="mb-1"><i class="fa fa-clock text-primary me-2"></i>10:00 AM - 18:00 PM</p>
                            <p class="mb-1"><i class="fa fa-calendar-alt text-primary me-2"></i>Jan 01 - Jan 10</p>
                            <p class="mb-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New
                                York, USA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event End -->


    <!-- Donate Start -->
    <div class="container-fluid donate py-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-7 donate-text bg-light py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column justify-content-center h-100 p-5 wow fadeIn" data-wow-delay="0.3s">
                        <h1 class="display-6 mb-4">Let's Donate to Needy People for Better Lives</h1>
                        <p class="fs-5 mb-0">Through your donations, we spread kindness and support to children,
                            families, and communities struggling to find stability.</p>
                    </div>
                </div>
                <div class="col-lg-5 donate-form bg-primary py-5 text-center wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 p-5">
                        <form>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-group" role="group"
                                        aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1"
                                            autocomplete="off" checked>
                                        <label class="btn btn-light" for="btnradio1">$10</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2"
                                            autocomplete="off">
                                        <label class="btn btn-light" for="btnradio2">$20</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3"
                                            autocomplete="off">
                                        <label class="btn btn-light" for="btnradio3">$30</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio4"
                                            autocomplete="off">
                                        <label class="btn btn-light" for="btnradio4">$40</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio5"
                                            autocomplete="off">
                                        <label class="btn btn-light" for="btnradio5">$50</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-secondary py-3 w-100" type="submit">Donate Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donate End -->


    <!-- Team Start -->
    <!-- Developer Profile Section Start -->
<div class="container-fluid bg-dark text-light py-5">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-4 text-center">
                <img src="{{ asset('assets-guest/img/profile.jpg') }}"
                     alt="Foto Pengembang"
                     class="img-fluid rounded-circle shadow"
                     style="width: 200px; height: 200px; object-fit: cover;">
            </div>

            <div class="col-lg-8">
                <h3 class="text-light mb-3">Identitas Pengembang</h3>
                <p class="mb-1"><strong>Nama :</strong> Difa Mardiani</p>
                <p class="mb-1"><strong>NIM :</strong> 2457301034</p>
                <p class="mb-1"><strong>Program Studi :</strong> Sistem Informasi</p>
                <p class="mb-3"><strong>Kampus :</strong> Politeknik Caltex Riau</p>

                <div class="d-flex align-items-center mt-3 flex-wrap">

                    <a href="#" class="https://www.linkedin.com/in/difa-mardiani-4464a6399?utm_source=share_via&utm_content=profile&utm_medium=member_ios" target="_blank">
                        <i class="fab fa-linkedin me-2"></i>LinkedIn
                    </a>

                    <a href="#" class="https://github.com/difa24si/kebencanaan-guest.git" target="_blank">
                        <i class="fab fa-github me-2"></i>GitHub
                    </a>

                    <a href="#" class="https://www.instagram.com/dpakepsyc?igsh=MWdnbXpuanVyNHp0Ng%3D%3D&utm_source=qr" target="_blank">
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
