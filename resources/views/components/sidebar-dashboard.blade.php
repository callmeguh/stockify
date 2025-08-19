@props(['page' => null])

<aside id="sidebar"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 w-64 h-full pt-16 font-normal bg-white border-r border-gray-200 transition-all"
    aria-label="Sidebar">

    <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
        <div class="flex-1 px-3 space-y-2 divide-y divide-gray-200">
            <ul class="space-y-2">
                {{ $slot }}
            </ul>
        </div>
    </div>
</aside>

{{-- backdrop untuk mobile --}}
<div class="fixed inset-0 z-10 hidden bg-gray-900/50" id="sidebarBackdrop"></div>
