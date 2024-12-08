<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bored Cow Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PolySans:wght@600&display=swap" rel="stylesheet">
    <style>
        .navbar-brand-centered {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
        }

        .nav-link:hover {
            color: rgba(0, 0, 0, 0.7) !important;
        }

        .nav-link {
            position: relative;
            display: inline-block;
            color: #000;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            display: block;
            margin-top: 5px;
            right: 0;
            background: #000;
            transition: width 0.3s ease;
            -webkit-transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
            left: 0;
            background: #000;
        }

        .bg-yellow {
            background-color: #FFB800;
            border-color: #FFB800;
        }

        .bg-yellow:hover {
            background-color: #E6A700;
        }

        .bg-rounded {
            border-radius: 10px;
        }

        .logo {
            color: #FFFFFF;
            display: flex;
            font-family: 'PolySans', sans-serif;
            font-size: 17px;
            font-weight: 600;
            justify-content: center;
            line-height: 17px;
            padding: 12px 0px;
        }

        .bg-blue {
            background-color: #5698FAFF;
            border-color: #0D6EFD;
        }
    </style>
</head>

<body>
    <header class="sticky-top bg-blue border-bottom fixed-top">
        <nav class="navbar navbar-expand-md navbar-light container py-2">
            <div class="container-fluid px-4 d-flex justify-content-between align-items-center">

                <!-- Left side navigation -->
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ Route('shop') }}"
                        class="btn bg-yellow text-black fw-bold rounded-pill px-4 border border-dark bg-rounded">Shop</a>
                    <div class="d-none d-md-flex gap-4">
                        <a href="/products" class="nav-link text-dark fw-medium">Products</a>
                        <a href="/learn" class="nav-link text-dark fw-medium">Learn</a>
                        <a href="/bored" class="nav-link text-dark fw-medium">Bored?</a>
                    </div>
                </div>

                <!-- Center logo -->
                <a href="/" class="navbar-brand navbar-brand-centered fw-bold fs-4 text-uppercase logo">Sunshine Shop</a>

                <!-- Right side navigation -->
                <div class="d-flex align-items-center gap-3">
                    <div class="d-none d-md-flex gap-4">
                        <a href="/contact" class="nav-link text-dark fw-medium">Contact & FAQ</a>
                        <a href="/where-to-buy" class="nav-link text-dark fw-medium">Where to Buy</a>
                    </div>
                    <!-- Search Icon -->
                    <button class="btn btn-link text-dark p-0" aria-label="Search">
                        <i class="bi bi-search fs-5"></i>
                    </button>
                    <!-- Shopping Cart Icon -->
                    <button class="btn btn-link text-dark position-relative p-0" aria-label="Shopping cart">
                        <i class="bi bi-bag fs-5"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            10
                        </span>
                    </button>
                    @if(Auth::check())
                        <div class="d-flex align-items-center gap-3">
                            <span class="nav-link text-dark fw-medium">{{ Auth::user()->name }}</span>
                            <a href="#" class=""
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="#" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @else
                        <a href="" class="">Login</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>