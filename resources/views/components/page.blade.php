@props([
    'title' => null,
    'layout' => 'app',
    'heading' => null,
    'subheading' => null,
    'hasHeader' => true,
    'hasFooter' => true,
])

@php
    // Check if panel is available and use its layout, otherwise use standalone
    $panelManager = app()->bound('accelade.panel') ? app('accelade.panel') : null;
    $panel = $panelManager?->getCurrent();

    // Determine the correct layout
    if ($panel) {
        // Use panel layouts when panel is active
        $layoutComponent = match($layout) {
            'simple' => 'panel::layouts.simple',
            'empty' => 'panel::layouts.empty',
            default => 'panel::layouts.app',
        };
    } else {
        // Use pages package layouts (standalone)
        $layoutComponent = match($layout) {
            'simple' => 'pages::components.layouts.simple',
            'empty' => 'pages::components.layouts.empty',
            default => 'pages::components.layouts.app',
        };
    }
@endphp

<x-dynamic-component :component="$layoutComponent" :title="$title">
    @if($hasHeader && ($heading || $subheading || isset($header)))
        <div class="mb-6">
            @isset($header)
                {{ $header }}
            @else
                @if($heading)
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
                        {{ $heading }}
                    </h1>
                @endif

                @if($subheading)
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        {{ $subheading }}
                    </p>
                @endif
            @endisset
        </div>
    @endif

    {{ $slot }}

    @if($hasFooter && isset($footer))
        <div class="mt-6">
            {{ $footer }}
        </div>
    @endif
</x-dynamic-component>
