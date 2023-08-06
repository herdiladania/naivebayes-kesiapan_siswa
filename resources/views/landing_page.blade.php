<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ asset('HeroBiz') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('HeroBiz') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <link href="{{ asset('HeroBiz') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('HeroBiz') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('HeroBiz') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('HeroBiz') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('HeroBiz') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{ asset('HeroBiz') }}/assets/css/variables.css" rel="stylesheet">
    <link href="{{ asset('HeroBiz') }}/assets/css/main.css" rel="stylesheet">
</head>

<body>


    <header id="header" class="header fixed-top" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                <h1>SIPAMAD <span><img src="{{ asset('HeroBiz') }}/assets/img/logo.png" alt="SIPAMAD Logo"></span></h1>

            </a>
            <a class="btn-getstarted scrollto" href="/login">Masuk</a>

        </div>
    </header><!-- End Header -->

    <section id="hero-animated" class="hero-animated d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">
            <img src="{{ asset('HeroBiz') }}/assets/img/hero-carousel/1.svg" class="img-fluid animated">
            <h3>Selamat Datang Di <span>SIPAMAD</span></h3>
            <p>Sebuah sistem untuk menentukan kesiapan siswa masuk sekolah dasar dengan penerapan
                algoritma Naive Bayes</p>
            <div class="d-flex">
                <a href="/login" class="btn-get-started scrollto">Coba Sekarang</a>
            </div>
        </div>
    </section>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('HeroBiz') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('HeroBiz') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('HeroBiz') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('HeroBiz') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('HeroBiz') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('HeroBiz') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- HeroBiz Main JS File -->
    <script src="{{ asset('HeroBiz') }}/assets/js/main.js"></script>

</body>

</html>
