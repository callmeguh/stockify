@props(['routeName', 'title'])

<li>
    <a href="{{ route($routeName) }}"
       class="flex items-center w-full p-2 pl-11 text-gray-700 rounded-lg hover:bg-gray-100
       {{ request()->routeIs($routeName) ? 'bg-gray-100 font-semibold text-blue-600' : '' }}">
        {{ $title }}
    </a>
</li>
