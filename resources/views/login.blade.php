<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIPAMAD | Login</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('Template') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('Template') }}/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters row justify-content-center">
                    <div class="col-md-5">
                        <img src="assets/images/sd.jpg" alt="login" class="login-card-img">
                    </div>

                    <div class="col-md-7">
                        <div class="card-body text-center ">
                            <h1 class="login-card-description">SIPAMAD</h1>
                            <form action="{{ route('loginProcess') }}" method="post">
                                @csrf
                                <div class="form-group ">
                                    <input type="text" class="form-control form-control-user" id="name"
                                        placeholder="Nama Pengguna" name="name" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password"
                                        placeholder="Kata sandi" name="password" required>
                                </div>
                                <button class="btn btn-dark btn-block" type="submit">Masuk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
