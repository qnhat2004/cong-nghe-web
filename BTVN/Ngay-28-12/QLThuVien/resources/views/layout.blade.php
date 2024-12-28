<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/fontawesome-free-6.7.2-web/css/all.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
            // Auto hide alert after 3 seconds
            setTimeout(function () {
                const alert = document.querySelector('.alert');
                if (alert) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }
            }, 3000);
            var myModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        });
    </script>
    <style>
        .tooltip .tooltip-inner {
            background-color: #333;
            color: white;
            padding: 8px 15px;
            font-size: 14px;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .tooltip.bs-tooltip-top .tooltip-arrow::before {
            border-top-color: #333;
        }

        .btn-primary:hover,
        .btn-danger:hover {
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }

        .action-buttons a {
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        .custom-alert {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .custom-alert .btn-close {
            font-size: 0.8rem;
            padding: 0.5rem;
            margin-right: 0.5rem;
            opacity: 0.7;
        }

        .custom-alert .btn-close:hover {
            opacity: 1;
        }

        .pagination {
            --bs-pagination-color: #333;
            --bs-pagination-hover-color: #007bff;
            --bs-pagination-active-bg: #007bff;
            --bs-pagination-active-border-color: #007bff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .page-item.active .page-link {
            font-weight: bold;
        }

        .page-link {
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .page-link:hover {
            transform: translateY(-1px);
        }
        .w-60 {
            width: 60%;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100"
        style="background: linear-gradient(to bottom, #A0DEF7FF, #F6D4E3FF);">
        <div class="container mt-2 w-80 bg-white p-2 rounded-3 shadow">
            @if(session('success'))
                <div class="alert custom-alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <i class="fas fa-check-circle me-2"></i>
                </div>
            @endif

           <div class="container mt-2">
                @yield('content')
           </div>
        </div>
    </div>

</body>

</html>