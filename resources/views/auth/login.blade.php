<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Stockify</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900">

    <div class="flex min-h-screen">
        <!-- Left Section (Branding) -->
        <div class="hidden lg:flex w-1/2 bg-stockify text-white flex-col justify-center items-center p-12">


            <div class="text-center">
                <img src="{{ asset('static/images/logo.png') }}" alt="Stockify Logo"
     class="h-40 w-40 mx-auto mb-6 rounded-full shadow-lg bg-white/90 p-3">

                
                <h1 class="text-4xl font-bold mb-2">Selamat Datang di <span class="text-yellow-300">Stockify</span></h1>
                <p class="text-lg text-blue-100">Kelola stok & gudang Anda lebih mudah, cepat, dan efisien.</p>
            </div>
        </div>

        <!-- Right Section (Login Form) -->
        <div class="flex w-full lg:w-1/2 justify-center items-center bg-white dark:bg-gray-800">
            <div class="w-full max-w-md p-8">
                <div class="mb-6 text-center">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Login ke Stockify</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Masuk untuk melanjutkan ke dashboard</p>
                </div>

                @if(session('status'))
                    <div class="p-3 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    <!-- Email -->
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 
                                   focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                                   dark:placeholder-gray-400 dark:text-white">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 
                                   focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                                   dark:placeholder-gray-400 dark:text-white">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember + Forgot -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600">
                            <label for="remember" class="ml-2 text-sm text-gray-600 dark:text-gray-400">Ingat saya</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline dark:text-blue-400">Lupa password?</a>
                        @endif
                    </div>

                    <!-- Button -->
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center 
                               focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                        Masuk
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400">
                    &copy; {{ date('Y') }} <span class="font-semibold text-blue-600">Stockify</span>. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
