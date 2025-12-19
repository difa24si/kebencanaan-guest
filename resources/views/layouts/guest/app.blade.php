<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    {{-- CSS --}}
    @include('layouts.guest.css')
</head>

<body>

    {{-- Spinner --}}
    <div id="spinner"
         class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50
                d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>

    {{-- Topbar --}}
    @include('layouts.guest.topbar')

    {{-- Navbar --}}
    @include('layouts.guest.navbar')

    {{-- MAIN CONTENT --}}
    @yield('content')

    {{-- Footer --}}
    @include('layouts.guest.footer')

    {{-- Back to Top
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a> --}}

    {{-- Floating WhatsApp --}}
    <a href="https://wa.me/6281234567890?text=Halo%20Admin,%20saya%20ingin%20bertanya."
       class="floating-whatsapp"
       target="_blank">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" class="whatsapp-icon">
    </a>

    {{-- JS --}}
    @include('layouts.guest.js')

</body>
</html>
