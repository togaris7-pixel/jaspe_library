<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jaspe Library | Dashboard</title>

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('dashboard-template/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- AdminLTE -->

    <link rel="stylesheet" href="{{ asset('dashboard-template/dist/css/adminlte.min.css') }}">





    <!-- Custom Pro Theme -->
    <style>
        :root {
            --green-main: #1f9d55;
            --green-light: #e6f4ec;
            --blue-navy: #0f2a44;
            --black-soft: #1f2933;
            --white: #ffffff;
            --red-accent: #dc3545;
            --yellow-accent: #ffc107;
        }

        body {
            background-color: var(--green-light);
            color: var(--black-soft);
        }

        /* NAVBAR */
        .main-header {
            background-color: var(--white);
            border-bottom: 2px solid var(--green-main);
        }

        .menu-toggle {
            color: #0f2a44; /* bleu marine */
            font-size: 18px;
            transition: all 0.2s ease-in-out;
            border-radius: 6px;
        }

        .menu-toggle:hover {
            background-color: #e6f4ec; /* vert clair */
            color: #1f9d55; /* vert principal */
        }

        .dark-mode .menu-toggle {
            color: green;
        }

        .dark-mode .menu-toggle:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #ffc107;
        }


        /* DASHBOARD */

            /* Style de projets.index */

        .project-image-wrapper {
            height: 160px;
            overflow: hidden;
        }

        .project-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


    
        .stat-card {
            background: rgba(255,255,255,.9);
            backdrop-filter: blur(14px);
            border-radius: 18px;
            padding: 22px;
            display: flex;
            align-items: center;
            gap: 18px;
            box-shadow: 0 12px 30px rgba(0,0,0,.08);
            transition: all .25s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, transparent, rgba(255,255,255,.4));
            opacity: 0;
            transition: .25s;
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0,0,0,.12);
        }

        .stat-card:hover::before {
            opacity: 1;
        }

        .stat-icon {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: white;
            flex-shrink: 0;
        }

        .stat-content h3 {
            margin: 0;
            font-size: 26px;
            font-weight: 700;
        }

        .stat-content p {
            margin: 4px 0 6px;
            color: #6b7280;
            font-size: 14px;
        }

        .stat-content a {
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            color: inherit;
        }

        /* THEMES */
        .stat-info .stat-icon {
            background: linear-gradient(135deg, #0f2a44, #1e4b7a);
        }

        .stat-success .stat-icon {
            background: linear-gradient(135deg, #1f9d55, #2fbf71);
        }

        .stat-warning .stat-icon {
            background: linear-gradient(135deg, #ffc107, #ff9800);
            color: #1f2933;
        }

        .stat-danger .stat-icon {
            background: linear-gradient(135deg, #dc3545, #b02a37);
        }

        /* DARK MODE */
        .dark-mode .stat-card {
            background: rgba(30,30,30,.85);
            color: #fff;
        }

        .dark-mode .stat-content p {
            color: #cbd5e1;
        }
    





        /* SIDEBAR */
        .main-sidebar {
            background-color: var(--blue-navy) !important;
        }

        .brand-link {
            background-color: var(--green-main);
            color: var(--white) !important;
            font-weight: 600;
        }

        .brand-link img {
            background-color: white;
            padding: 3px;
        }

        /* Sidebar links */
        .nav-sidebar .nav-link {
            color: #dbe7f1;
            font-weight: 500;
        }

        .nav-sidebar .nav-link.active {
            background-color: var(--green-main);
            color: var(--white);
        }

        .nav-sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--white);
        }

        /* CONTENT */
        .content-wrapper {
            background-color: var(--green-light);
        }

        /* CARDS */
        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            background-color: var(--white);
            border-bottom: 2px solid var(--green-main);
            font-weight: 600;
        }

        /* BUTTONS */
        .btn-success {
            background-color: var(--green-main);
            border: none;
        }

        .btn-success:hover {
            background-color: #16864a;
        }

        .btn-danger {
            background-color: var(--red-accent);
        }

        .btn-warning {
            background-color: var(--yellow-accent);
            color: #000;
        }

        /* FOOTER */
        .main-footer {
            background-color: var(--white);
            border-top: 1px solid #ddd;
            font-size: 14px;
        }

        /* SCROLLBAR */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: var(--green-main);
            border-radius: 10px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand">
        @include('layouts.partials._navbar-left')
        @include('layouts.partials._navbar-right')
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar elevation-4">
        <a href="{{ route('dashboard') }}" class="brand-link text-center">
        <img src="{{ asset('image/jaspe.png') }}" alt="Logo"
     class="brand-image img-circle elevation-3">

            <span class="brand-text">Jaspe Library</span>
        </a>

        @include('layouts.partials._sidebar')
    </aside>

    <!-- Content -->
    <div class="content-wrapper">
        @yield('dashboard-content')
    </div>

    <!-- Footer -->
    @include('layouts.partials._footer')

</div>

<!-- Scripts -->
<script src="{{ asset('dashboard-template/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard-template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dashboard-template/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('dashboard-template/dist/js/adminlte.js') }}"></script>


</body>
</html>
