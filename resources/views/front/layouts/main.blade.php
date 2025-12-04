<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sinau.ao') | Sinau.ao</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --sinau-green: #009978;
            --sinau-dark: #333;
            --footer-dark: #1a1a1a;
        }

        body {
            padding-top: 100px; /* Kompensasi untuk navbar fixed-top */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* --- STYLE NAVBAR GLOBAL --- */
        .navbar {
        background-color: #f8f9fa;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        height: 80px;
        margin: 20px;
        border-radius: 15px;
    }

    .navbar-brand {
        font-weight: 500;
        color: #009978;
        font-size: 24px;
        transition: 0.3s color;
    }

    .login-button {
        background-color: #009978;
        color: #fff;
        font-size: 14px;
        padding: 8px 20px;
        border-radius: 50px;
        text-decoration: none;
        transition: 0.3s background-color;
    }

    .login-button:hover {
        background-color: #00b383;
    }

    .navbar-toggler {
        border: none;
        font-size: 1.25rem;
    }

    .navbar-toggler:focus, .btn-close:focus {
        box-shadow: none;
        outline: none;
    }

    .nav-link {
        color: #666777;
        font-weight: 500;
    }

    .nav-link:hover, .nav-link:active {
        color: #000;
    }


    @media (min-width: 991px) { 
    .nav-link {
        position: relative; 
    }

    .nav-link::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background-color: #009978;
        transition: 0.3s ease-in-out;
    }

    .nav-link:hover::before { 
        width: 50%;
    }

    .nav-link.active::before { 
        width: 100%;
    }
}

        /* --- STYLE FOOTER GLOBAL --- */
        /* Efek hover untuk link di footer */
        .footer-link:hover,
        .footer-sosmed-link:hover {
            color: #fff !important;
            transition: color 0.3s ease;
        }


    @media (min-width: 991px) { 
    .nav-link {
        position: relative; 
    }

    .nav-link::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 0; 
        height: 2px;
        background-color: #009978; 
        transition: 0.3s ease-in-out;
    }

    .nav-link:hover::before, 
    .nav-link.active::before {  /* <--- INI KUNCINYA */
        width: 100%;
    }
}


        @yield('extra-css') 
    </style>
</head>

<body>

    @include('front.part.navbar')


    <main class="d-flex flex-column min-vh-100">
        @yield('content')
    </main>


    @include('front.part.footer')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>