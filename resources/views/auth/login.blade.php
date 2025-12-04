<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Sinau.ao</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root { --sinau-green: #009978; --sinau-dark: #333; --footer-dark: #1a1a1a; }
        /* Import Font Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: #ececec;
        }

        .footer-link:hover, .footer-sosmed-link:hover { color: #fff !important; transition: color 0.3s ease; }

        .box-area { width: 930px; }
        .right-box { padding: 30px 30px; }
        ::placeholder { font-size: 16px; color: #aaa; }
        .btn-primary { background-color: var(--sinau-green); border-color: var(--sinau-green); }
        .btn-primary:hover { background-color: #008f70; border-color: #008f70; }

        @media only screen and (max-width: 768px){
            .box-area { margin: 0 10px; }
            .left-box { height: 150px; overflow: hidden; }
            .right-box { padding: 20px; }
        }
    </style>

</head>
<body class="d-flex flex-column min-vh-100">

    <main class="container d-flex justify-content-center align-items-center flex-grow-1 py-5">

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #ffff;">
                <div class="featured-image mb-3">
                    <img src="{{ asset('frontuser/gambar/sinauuu.png') }}" class="img-fluid rounded-4" style="max-width: 100%;">
                </div>
            </div>

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-3 mt-2">
                        <h2 class="fw-bold">Masuk</h2>
                        <p class="text-muted">Selamat Datang Kembali.</p>
                    </div>

                    <form action="#">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="E-mail">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
                        </div>

                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6 fw-bold">Masuk</button>
                        </div>
                    </form>

                    <div class="input-group mb-4">
                        <button class="btn btn-lg btn-light w-100 fs-6 border">
                            <img src="{{ asset('frontuser/gambar/googleLogo.png') }}" alt="Google" style="width: 20px;" class="me-2">
                            <small class="fw-bold text-secondary">Masuk Dengan Google</small>
                        </button>
                    </div>

                    <div class="regist mb-3 text-center">
                        <p class="text-secondary">Kamu belum memiliki akun? <a href="/registrasi" class="text-decoration-none fw-bold" style="color: var(--sinau-green);">Registrasi</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>


    @include('front.part.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>