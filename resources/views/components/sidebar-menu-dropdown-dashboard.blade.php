@props(['title', 'icon' => null, 'routeName' => null])

@php
    $dropdownId = 'dropdown-' . \Illuminate\Support\Str::slug($title);
    $isActive = request()->routeIs($routeName . '*');
@endphp

<li>
    <button type="button"
        class="flex items-center w-full p-2 text-gray-900 rounded-lg hover:bg-gray-100
        {{ $isActive ? 'bg-gray-100 font-semibold text-blue-600' : '' }}"
        aria-controls="{{ $dropdownId }}" data-collapse-toggle="{{ $dropdownId }}">
        @if($icon)
            <span class="mr-3">{{ $icon }}</span>
        @endif
        <span class="flex-1 text-left whitespace-nowrap">{{ $title }}</span>
        <svg class="w-5 h-5 transition-transform {{ $isActive ? 'rotate-180' : '' }}" fill="currentColor"
             viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"></path>
        </svg>
    </button>

    <ul id="{{ $dropdownId }}" class="{{ $isActive ? '' : 'hidden' }} space-y-2 py-2">
        {{ $slot }}
    </ul>
</li>
