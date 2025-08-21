<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Dashboard">
    <meta name="author" content="Team Project">
    <meta name="generator" content="Laravel">

    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="canonical" href="{{ request()->fullUrl() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="#0ea5e9">

    <!-- Social meta -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="og:type" content="website">

    <script>
        // Dark mode handler
        if (localStorage.getItem('color-theme') === 'dark' 
            || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
@php
    $whiteBg = isset($params['white_bg']) && $params['white_bg'];
@endphp
<body class="font-inter {{ $whiteBg ? 'bg-white' : 'bg-gray-50 dark:bg-gray-900' }}">

    <!-- Navbar -->
    <x-navbar-dashboard class="fixed top-0 z-50 w-full border-b border-gray-200 bg-white shadow-sm dark:bg-gray-800 dark:border-gray-700"/>

    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        
        <!-- Sidebar -->
        <x-sidebar.admin-sidebar class="fixed top-0 left-0 z-40 w-64 h-screen pt-16 transition-transform bg-white border-r border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700"/>

        <!-- Main Content -->
        <div id="main-content" class="relative w-full h-full min-h-screen overflow-y-auto lg:ml-64">
            <main class="p-6 space-y-6">
                @yield('content')
            </main>

            <!-- Footer -->
            <x-footer-dashboard class="bg-white border-t border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700"/>
        </div>
    </div>

    <!-- Scripts -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
   <!-- Flowbite Core JS (wajib untuk tabs/modal/dll) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

<!-- Opsional: kalau mau pakai datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>


    {{-- Tambahkan ini supaya section scripts bisa jalan --}}
    @yield('scripts')
</body>
</html>
