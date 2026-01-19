<x-panel::page :title="$title">
    <x-slot:header>
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
            {{ $title }}
        </h1>
    </x-slot:header>

    @if(count($widgets) > 0)
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($widgets as $widget)
                <x-dynamic-component :component="$widget" />
            @endforeach
        </div>
    @else
        <div class="rounded-lg border border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-800">
            <div class="text-center">
                <x-heroicon-o-chart-bar class="mx-auto h-12 w-12 text-gray-400" />
                <h3 class="mt-2 text-sm font-semibold text-gray-900 dark:text-white">{{ __('pages::dashboard.no_widgets') }}</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('pages::dashboard.no_widgets_description') }}
                </p>
            </div>
        </div>
    @endif
</x-panel::page>
