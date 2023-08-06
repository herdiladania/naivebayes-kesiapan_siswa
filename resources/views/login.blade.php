<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIPAMAD | Login</title>

    <link href="{{ asset('HeroBiz') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('HeroBiz') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('HeroBiz') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('HeroBiz') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('HeroBiz') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{ asset('HeroBiz') }}/assets/css/variables.css" rel="stylesheet">
    <link href="{{ asset('HeroBiz') }}/assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

    <header id="header" class="header fixed-top" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                <h1>SIPAMAD <span><img src="{{ asset('HeroBiz') }}/assets/img/logo.png" alt="SIPAMAD Logo"></span></h1>

            </a>
        </div>
    </header>
    <div class="content">
        <div class="text">
            Login
        </div>
        <form action="{{ route('loginProcess') }}" method="post">
            <div class="field">
                @csrf
                <input required="" type="text" class="input" name="name">
                <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512"
                        viewBox="0 0 512 512" y="0" x="0" height="20" width="50"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path class="" data-original="#000000" fill="#595959"
                                d="M256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135S330.439 0 256 0zM423.966 358.195C387.006 320.667 338.009 300 286 300h-60c-52.008 0-101.006 20.667-137.966 58.195C51.255 395.539 31 444.833 31 497c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15 0-52.167-20.255-101.461-57.034-138.805z">
                            </path>
                        </g>
                    </svg></span>
                <label class="label">Nama Pengguna</label>
            </div>
            <div class="field">
                <input required="" type="password" class="input" name="password">
                <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512"
                        viewBox="0 0 512 512" y="0" x="0" height="20" width="50"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path class="" data-original="#000000" fill="#595959"
                                d="M336 192h-16v-64C320 57.406 262.594 0 192 0S64 57.406 64 128v64H48c-26.453 0-48 21.523-48 48v224c0 26.477 21.547 48 48 48h288c26.453 0 48-21.523 48-48V240c0-26.477-21.547-48-48-48zm-229.332-64c0-47.063 38.27-85.332 85.332-85.332s85.332 38.27 85.332 85.332v64H106.668zm0 0">
                            </path>
                        </g>
                    </svg></span>
                <label class="label">Kata Sandi</label>
            </div>
            <button class="button" type="submit">Masuk</button>
        </form>
    </div>

</body>

</html>
