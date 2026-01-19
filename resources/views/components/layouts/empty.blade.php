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
    <x-panel::layouts.empty :title="$title">
        {{ $slot }}
    </x-panel::layouts.empty>
@else
    {{-- Standalone empty layout (no chrome) --}}
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
    <body class="min-h-full font-sans antialiased bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100">
        {{ $slot }}

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
