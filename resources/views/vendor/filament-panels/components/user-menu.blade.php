@php
    $user = filament()->auth()->user();
@endphp

<div class="filament-user-menu">
    <x-filament::dropdown placement="bottom-end">
        <x-slot name="trigger">
            <button class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-200 dark:bg-gray-700">
                @if ($user?->profile_photo_url)
                    <img src="{{ $user->profile_photo_url }}" class="w-10 h-10 rounded-full object-cover" />
                @else
                    <span class="font-semibold text-white bg-primary-600 w-10 h-10 rounded-full flex items-center justify-center">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </span>
                @endif
            </button>
        </x-slot>


        <div class="p-4 border-b dark:border-gray-700">
            <div class="flex flex-col items-center text-center gap-2">
                @if ($user?->profile_photo_url)
                    <img src="{{ $user->profile_photo_url }}" class="w-12 h-12 rounded-full object-cover" />
                @else
                    <span class="font-semibold text-white bg-primary-600 w-10 h-10 rounded-full flex items-center justify-center text-center leading-none tracking-tight">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </span>
                @endif

                <div class="leading-tight">
                    <p class="font-semibold text-sm">
                        {{ $user?->name }}
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        {{ $user?->email }}
                    </p>
                </div>
            </div>
        </div>


        <x-filament::dropdown.list>
            {{-- Profile --}}
            <x-filament::dropdown.list.item
                tag="a"
                :href="\App\Filament\Pages\Admin\Profile::getUrl()"
                icon="heroicon-o-user"
            >
                Profile
            </x-filament::dropdown.list.item>

            {{-- Light / Dark Toggle --}}
            {{-- <x-filament::dropdown.list.item
                x-on:click="window.Filament?.toggleTheme()"
                icon="heroicon-o-moon"
            >
                Theme
            </x-filament::dropdown.list.item> --}}

            {{-- Logout --}}
            <form method="POST" action="{{ filament()->getLogoutUrl() }}">
                @csrf
                <x-filament::dropdown.list.item
                    tag="button"
                    type="submit"
                    icon="heroicon-o-arrow-left-on-rectangle"
                >
                    Sign out
                </x-filament::dropdown.list.item>
            </form>
        </x-filament::dropdown.list>
    </x-filament::dropdown>
</div>
