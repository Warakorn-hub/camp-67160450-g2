<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f4f6f9;
        }

        .navbar {
            border-bottom: 1px solid #e0e0e0;
        }

        .content-wrapper {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .page-title {
            font-weight: 500;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-semibold" href="#">
                <i class="bi bi-bootstrap-fill text-primary"></i> My App
            </a>
        </div>
    </nav>

    <!-- Content -->
    <div class="container content-wrapper">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h4 class="page-title mb-4">@yield('header1')</h4>
                @yield('content')
            </div>
        </div>
    </div>

    @stack('scripts')
</body>

</html>
