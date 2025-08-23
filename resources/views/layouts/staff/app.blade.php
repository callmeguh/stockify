<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Staff Gudang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex">

    {{-- Sidebar --}}
    <aside class="w-64 bg-white shadow-md min-h-screen p-4">
        <h1 class="text-xl font-bold mb-6">Staff Gudang</h1>
        <nav class="space-y-2">
            <a href="{{ route('staff.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('staff.dashboard') ? 'bg-gray-200 font-semibold' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('staff.stocks.incoming') }}" class="block px-4 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('staff.stocks.incoming') ? 'bg-gray-200 font-semibold' : '' }}">
                Barang Masuk
            </a>
            <a href="{{ route('staff.stocks.outgoing') }}" class="block px-4 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('staff.stocks.outgoing') ? 'bg-gray-200 font-semibold' : '' }}">
                Barang Keluar
            </a>
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 rounded hover:bg-gray-200">
                Profil
            </a>
            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-red-200 text-red-600">
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 p-6">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
