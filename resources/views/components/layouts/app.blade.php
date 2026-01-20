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
    <x-panel::layouts.app :title="$title">
        {{ $slot }}
    </x-panel::layouts.app>
@else
    {{-- Standalone layout when no panel --}}
    <!DOCTYPE html>
    <html
        lang="{{ str_replace('_', '-', app()->getLocale()) }}"
        class="h-full"
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
    <body class="min-h-full font-sans antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100">
        {{-- Dark Mode Handler --}}
        <x-accelade::data :default="['darkMode' => false]" store="app" persist="darkMode">
            <x-accelade::script>
                // Initialize dark mode from localStorage or system preference
                const savedTheme = localStorage.getItem('theme');
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                const isDark = savedTheme === 'dark' || (!savedTheme && prefersDark);

                if (isDark) {
                    document.documentElement.classList.add('dark');
                    $set('darkMode', true);
                }

                // Watch for dark mode changes
                $watch('darkMode', (value) => {
                    if (value) {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    }
                });
            </x-accelade::script>

            <div class="min-h-screen">
                {{-- Main content --}}
                <main class="p-4 lg:p-6">
                    {{ $slot }}
                </main>
            </div>
        </x-accelade::data>

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
