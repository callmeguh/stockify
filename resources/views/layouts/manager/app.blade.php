<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manager Panel')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r shadow-md fixed inset-y-0 left-0 z-20">
        <div class="p-4 text-xl font-bold text-blue-600">
            Stockify Manager
        </div>
        <nav class="px-4 mt-4">
            <ul class="space-y-2">
                <!-- Dashboard -->
                <li>
                    <a href="{{ route('manager.dashboard') }}"
                       class="flex items-center p-2 rounded-lg hover:bg-blue-100 {{ request()->routeIs('manager.dashboard') ? 'bg-blue-50 font-semibold' : '' }}">
                        📊 <span class="ml-2">Dashboard</span>
                    </a>
                </li>

                <!-- Manajemen Data -->
                <li>
                    <button type="button"
                            class="flex items-center w-full p-2 rounded-lg hover:bg-blue-100"
                            onclick="document.getElementById('data-menu').classList.toggle('hidden')">
                        📂 <span class="ml-2">Manajemen Data</span>
                        <svg class="w-4 h-4 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <ul id="data-menu" class="hidden pl-6 space-y-1">
                        <li><a href="{{ route('manager.products.index') }}" class="block p-2 hover:bg-blue-50">Produk</a></li>
                        <li><a href="{{ route('manager.stocks.incoming') }}" class="block p-2 hover:bg-blue-50">Barang Masuk</a></li>
                        <li><a href="{{ route('manager.stocks.outgoing') }}" class="block p-2 hover:bg-blue-50">Barang Keluar</a></li>
                        <li><a href="{{ route('manager.stocks.opname') }}" class="block p-2 hover:bg-blue-50">Stock Opname</a></li>
                        <li><a href="{{ route('manager.suppliers.index') }}" class="block p-2 hover:bg-blue-50">Supplier</a></li>
                    </ul>
                </li>

                <!-- Laporan -->
                <li>
                    <button type="button"
                            class="flex items-center w-full p-2 rounded-lg hover:bg-blue-100"
                            onclick="document.getElementById('report-menu').classList.toggle('hidden')">
                        📑 <span class="ml-2">Laporan</span>
                        <svg class="w-4 h-4 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <ul id="report-menu" class="hidden pl-6 space-y-1">
                        <li><a href="{{ route('manager.reports.stock') }}" class="block p-2 hover:bg-blue-50">Stok Barang</a></li>
                        <li><a href="{{ route('manager.reports.transactions') }}" class="block p-2 hover:bg-blue-50">Barang Masuk & Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-h-screen ml-64">

        <!-- Navbar -->
        <header class="flex items-center justify-between bg-white border-b px-6 py-4 shadow-sm sticky top-0 z-30">
            <div class="text-lg font-semibold">Manager Panel</div>
            <div class="relative">
                <!-- Avatar + Dropdown -->
                <button id="profileDropdownButton" class="flex items-center space-x-2 focus:outline-none">
                    <img class="w-10 h-10 rounded-full border border-gray-300"
                         src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="profile"/>
                    <span class="font-medium">{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <!-- Dropdown -->
                <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-200 py-2 z-50">
                    <a href="{{ route('profile.edit') }}"
                       class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t text-center py-4 text-sm text-gray-500 shadow-inner">
            © {{ date('Y') }} Flowbite Manager. All rights reserved.
        </footer>
    </div>
</div>

<script>
    // Toggle dropdown profile
    const profileButton = document.getElementById('profileDropdownButton');
    const profileDropdown = document.getElementById('profileDropdown');
    profileButton.addEventListener('click', () => {
        profileDropdown.classList.toggle('hidden');
    });

    // Klik di luar untuk menutup dropdown
    window.addEventListener('click', function(e){
        if (!profileButton.contains(e.target) && !profileDropdown.contains(e.target)){
            profileDropdown.classList.add('hidden');
        }
    });
</script>

</body>
</html>
