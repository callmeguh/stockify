@props(['routeName' => null, 'icon' => null, 'title'])

<li>
    <a href="{{ $routeName && Route::has($routeName) ? route($routeName) : '#' }}"
       class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100
       {{ $routeName && request()->routeIs($routeName) ? 'bg-gray-100 font-semibold text-blue-600' : '' }}">
        @if($icon)
            <span class="mr-3">{{ $icon }}</span>
        @endif
        <span>{{ $title }}</span>
    </a>
</li>
