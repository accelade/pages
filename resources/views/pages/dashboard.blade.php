@php
    $panelManager = app()->bound('accelade.panel') ? app('accelade.panel') : null;
    $panel = $panelManager?->getCurrent();
    $theme = $panel?->getTheme();
    $layoutView = $theme?->getLayoutComponent() ?? 'panel::layouts.app';
@endphp

@component($layoutView, ['title' => $title])
    {{-- Page Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-semibold" style="color: var(--fi-text, #111827);">
            {{ $title }}
        </h1>
    </div>

    {{-- Dashboard Content --}}
    @if(count($widgets) > 0)
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($widgets as $widget)
                <x-dynamic-component :component="$widget" />
            @endforeach
        </div>
    @else
        <div class="rounded-lg border p-6" style="background-color: var(--fi-card-bg, #ffffff); border-color: var(--fi-card-border, #e5e7eb);">
            <div class="text-center">
                <svg class="mx-auto h-12 w-12" style="color: var(--fi-text-muted, #6b7280);" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                </svg>
                <h3 class="mt-2 text-sm font-semibold" style="color: var(--fi-text, #111827);">No widgets</h3>
                <p class="mt-1 text-sm" style="color: var(--fi-text-muted, #6b7280);">
                    Get started by adding widgets to your dashboard.
                </p>
            </div>
        </div>
    @endif
@endcomponent
