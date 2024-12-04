<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Đặt body và html full height */
        html, body {
            height: 100%;  /* Chiều cao 100% màn hình */
            margin: 0;     /* Xóa margin mặc định */
            display: flex;
            flex-direction: column;  /* Hiển thị theo chiều dọc */
        }

        /* Phần nội dung chính */
        .content {
            flex: 1;  /* Chiếm phần còn lại của màn hình */
        }

        /* Footer */
        footer {
            background-color: #45526e;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        /* Đảm bảo nội dung trong container được căn giữa và đẹp */
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <!-- Nội dung chính của trang -->
    <div class="content">
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start text-white">
        <div class="container p-4 pb-0">
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Company name</h6>
                        <p>
                            Here you can use rows and columns to organize your footer
                            content. Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                        <p><a class="text-white">MDBootstrap</a></p>
                        <p><a class="text-white">MDWordPress</a></p>
                        <p><a class="text-white">BrandFlow</a></p>
                        <p><a class="text-white">Bootstrap Angular</a></p>
                    </div>

                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                        <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                        <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->

            <hr class="my-3">

            <!-- Section: Copyright -->
            <section class="p-3 pt-0">
                <div class="row d-flex align-items-center">
                    <!-- Grid column -->
                    <div class="col-md-7 col-lg-8 text-center text-md-start">
                        <div class="p-3">
                            © 2020 Copyright:
                            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                        </div>
                    </div>

                    <!-- Grid column -->
                    <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                        <!-- Facebook -->
                        <a class="btn btn-outline-light btn-floating m-1" role="button"><i class="fab fa-facebook-f"></i></a>
                        <!-- Twitter -->
                        <a class="btn btn-outline-light btn-floating m-1" role="button"><i class="fab fa-twitter"></i></a>
                        <!-- Google -->
                        <a class="btn btn-outline-light btn-floating m-1" role="button"><i class="fab fa-google"></i></a>
                        <!-- Instagram -->
                        <a class="btn btn-outline-light btn-floating m-1" role="button"><i class="fab fa-instagram"></i></a>
                    </div>
                    <!-- Grid column -->
                </div>
            </section>
        </div>
    </footer>
</body>

</html>
