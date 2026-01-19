@props([
    'title' => null,
])

@php
    // Check if panel is available and use its layout, otherwise use standalone
    $panelManager = app()->bound('accelade.panel') ? app('accelade.panel') : null;
    $panel = $panelManager?->getCurrent();
@endphp

@if($panel)
    {{-- Use panel layout when panel is active --}}
    <x-panel::layouts.simple :title="$title">
        {{ $slot }}

        @isset($footer)
            <x-slot:footer>
                {{ $footer }}
            </x-slot:footer>
        @endisset
    </x-panel::layouts.simple>
@else
    {{-- Standalone simple layout (card-centered) --}}
    <!DOCTYPE html>
    <html
        lang="{{ str_replace('_', '-', app()->getLocale()) }}"
        class="h-full"
        x-data="{ darkMode: localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches) }"
        x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))"
        :class="{ 'dark': darkMode }"
    >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ? $title . ' - ' : '' }}{{ config('app.name', 'Laravel') }}</title>

        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Accelade Styles --}}
        @if(class_exists(\Accelade\Accelade\AcceladeServiceProvider::class))
            @acceladeStyles
        @endif

        @stack('styles')
    </head>
    <body class="h-full font-sans antialiased bg-gray-100 dark:bg-gray-900">
        <div class="flex min-h-full flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            {{-- Logo --}}
            <div class="mb-8">
                <span class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ config('app.name') }}
                </span>
            </div>

            {{-- Card --}}
            <div class="w-full max-w-md">
                <div class="rounded-xl bg-white dark:bg-gray-800 shadow-lg ring-1 ring-gray-900/5 dark:ring-gray-800 p-6 sm:p-8">
                    {{ $slot }}
                </div>

                {{-- Footer --}}
                @isset($footer)
                    <div class="mt-6 text-center">
                        {{ $footer }}
                    </div>
                @endisset
            </div>

            {{-- Theme toggle --}}
            <div class="fixed bottom-4 right-4">
                <button
                    @click="darkMode = !darkMode"
                    class="p-2 rounded-lg bg-white dark:bg-gray-800 shadow-lg text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700"
                >
                    <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg x-show="darkMode" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Notifications --}}
        @if(class_exists(\Accelade\Accelade\AcceladeServiceProvider::class))
            <x-accelade::notifications position="top-right" />
        @endif

        {{-- Accelade Scripts --}}
        @if(class_exists(\Accelade\Accelade\AcceladeServiceProvider::class))
            @acceladeScripts
        @endif

        @stack('scripts')
    </body>
    </html>
@endif
