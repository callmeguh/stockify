<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @php
      $setting = $setting ?? \App\Models\Setting::first();
  @endphp

  <title>{{ $setting?->app_name ?? 'Stockify' }} | Login</title>
  <link rel="icon" href="{{ $setting?->favicon ? asset('storage/'.$setting->favicon) : asset('static/images/favicon.png') }}">
  @vite(['resources/css/app.css','resources/js/app.js'])

  <style>
    @keyframes fade-in {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slide-left {
      from { opacity: 0; transform: translateX(-50px); }
      to { opacity: 1; transform: translateX(0); }
    }
    @keyframes slide-right {
      from { opacity: 0; transform: translateX(50px); }
      to { opacity: 1; transform: translateX(0); }
    }
    .animate-fade-in { animation: fade-in 0.8s ease-out forwards; }
    .animate-slide-left { animation: slide-left 1s ease-out forwards; }
    .animate-slide-right { animation: slide-right 1s ease-out forwards; }
  </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900">

  <div class="flex min-h-screen">
    <!-- Left Section (Branding) -->
    <div class="hidden lg:flex w-1/2 text-white flex-col justify-center items-center p-12 animate-slide-left"
         style="background: {{ $setting?->bg_color ?? '#1e40af' }};">
      <div class="text-center">
        <img src="{{ $setting?->logo ? asset('storage/'.$setting->logo) : asset('static/images/logo.png') }}" 
             alt="{{ $setting?->app_name ?? 'Stockify' }} Logo"
             class="h-48 mx-auto mb-6 object-contain transform transition duration-500 hover:scale-105">
        
        <h1 class="text-4xl font-bold mb-2">
          Selamat Datang di 
          <span class="text-yellow-300">{{ $setting?->app_name ?? 'Stockify' }}</span>
        </h1>
        <p class="text-lg text-blue-100">
          {{ $setting?->description ?? 'Kelola stok & gudang Anda lebih mudah, cepat, dan efisien.' }}
        </p>
      </div>
    </div>

    <!-- Right Section (Login Form) -->
    <div class="flex w-full lg:w-1/2 justify-center items-center bg-white dark:bg-gray-800 animate-slide-right">
      <div class="w-full max-w-md p-8 rounded-xl animate-fade-in">
        <!-- Header -->
        <div class="mb-6 text-center">
          <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            Login ke {{ $setting?->app_name ?? 'Stockify' }}
          </h2>
          <p class="text-sm text-gray-500 dark:text-gray-400">
            Masuk untuk melanjutkan ke dashboard
          </p>
        </div>

        <!-- Session Status -->
        @if(session('status'))
          <div class="p-3 mb-4 text-sm text-green-700 bg-green-100 rounded-lg 
                      dark:bg-green-800 dark:text-green-200 animate-fade-in">
            {{ session('status') }}
          </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
          @csrf

          <!-- Email -->
          <div class="group">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                     dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                     transition duration-300 transform hover:scale-[1.01]">
            @error('email')
              <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
          </div>

          <!-- Password -->
          <div class="group">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" id="password" required
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg 
                     focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                     dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                     transition duration-300 transform hover:scale-[1.01]">
            @error('password')
              <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
          </div>

          <!-- Remember + Forgot -->
          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <input id="remember" name="remember" type="checkbox"
                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 
                       dark:bg-gray-700 dark:border-gray-600 transition duration-200">
              <label for="remember" class="ml-2 text-sm text-gray-600 dark:text-gray-400">Ingat saya</label>
            </div>
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" 
                 class="text-sm font-medium text-blue-600 hover:text-blue-800 
                        dark:text-blue-400 dark:hover:text-blue-300 transition">
                 Lupa password?
              </a>
            @endif
          </div>

          <!-- Button -->
          <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center 
                   focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 
                   transform transition duration-300 hover:scale-[1.02] active:scale-95 shadow-md">
            Masuk
          </button>
        </form>

        <!-- Footer -->
        <p class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400 animate-fade-in">
          &copy; {{ date('Y') }} 
          <span class="font-semibold text-blue-600">{{ $setting?->app_name ?? 'Stockify' }}</span>. 
          All rights reserved.
        </p>
      </div>
    </div>
  </div>
</body>
</html>
