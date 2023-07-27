<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css') }}//login.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>SIPAMAD | Login Page</title>
</head>

<body>

    <div class="box">
        <video id="bg-video" src="images/bgVideo2.mp4" loop muted autoplay>
        </video>

        <div class="container">
            <form action="{{ route('loginProcess') }}" method="POST" accept-charset="utf-8">
                @csrf
                <div class="top">
                    <header>Login</header>
                </div>
                <div class="input-field">
                    <input type="text" class="input" placeholder="Nama Pengguna" name="name" id="">
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-field">
                    <input type="Password" class="input" placeholder="Kata Sandi" name="password" id="">
                    <i class='bx bx-lock-alt'></i>
                </div>
                <div class="input-field">
                    <input type="submit" class="submit" value="Login" id="">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
