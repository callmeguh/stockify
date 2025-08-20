@props(['routeName' => null, 'icon' => null, 'title'])

<li>
    <a href="{{ $routeName && Route::has($routeName) ? route($routeName) : '#' }}"
       class="flex items-center p-2 text-gray-900 rounded-lg transition-all duration-200 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700
       {{ $routeName && request()->routeIs($routeName) ? 'bg-gray-100 font-semibold text-blue-600 dark:bg-gray-700 dark:text-white' : '' }}">
        @if($icon)
            <span class="mr-3">{{ $icon }}</span>
        @endif
        <span>{{ $title }}</span>
    </a>
</li>
