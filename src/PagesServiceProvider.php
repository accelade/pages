<?php

declare(strict_types=1);

namespace Accelade\Pages;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class PagesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Merge config
        $this->mergeConfigFrom(
            __DIR__.'/../config/accelade-pages.php',
            'accelade-pages'
        );

        // Register any services, bindings, or singletons here
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Load translations
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'pages');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'pages');

        // Register Blade components
        $this->registerBladeComponents();

        // Register documentation after all service providers are booted
        $this->app->booted(function () {
            $this->registerDocs();
        });

        if ($this->app->runningInConsole()) {
            // Publish config
            $this->publishes([
                __DIR__.'/../config/accelade-pages.php' => config_path('accelade-pages.php'),
            ], 'accelade-pages-config');

            // Publish views
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/pages'),
            ], 'accelade-pages-views');

            // Register commands
            $this->commands([
                Commands\InstallPagesCommand::class,
            ]);
        }
    }

    /**
     * Register Blade components.
     */
    protected function registerBladeComponents(): void
    {
        Blade::component('pages::components.page', 'pages::page');
        Blade::component(Components\Page::class, 'accelade-page');
    }

    /**
     * Register documentation with Accelade docs system.
     */
    protected function registerDocs(): void
    {
        if (! $this->app->bound('accelade.docs')) {
            return;
        }

        $docs = $this->app->make('accelade.docs');

        // Register package path
        $docs->registerPackage('pages', __DIR__.'/../docs');

        // Register pages group
        $docs->registerGroup('pages', 'Pages', 'document-text', 60);

        // Register sub-groups
        $docs->registerSubgroup('pages', 'layouts', '🖼️ Layouts', '', 10);
        $docs->registerSubgroup('pages', 'usage', '📖 Usage', '', 20);

        // Overview (at group level)
        $docs->section('pages-overview')
            ->label('Overview')
            ->icon('📄')
            ->markdown('getting-started.md')
            ->package('pages')
            ->inGroup('pages')
            ->demo()
            ->register();

        // Layouts sub-group
        $docs->section('pages-layouts')
            ->label('Layouts')
            ->icon('🎨')
            ->markdown('layouts.md')
            ->package('pages')
            ->inGroup('pages')
            ->inSubgroup('layouts')
            ->demo()
            ->register();

        $docs->section('pages-slots')
            ->label('Headers & Slots')
            ->icon('🧱')
            ->markdown('slots.md')
            ->package('pages')
            ->inGroup('pages')
            ->inSubgroup('layouts')
            ->register();

        // Usage sub-group
        $docs->section('pages-examples')
            ->label('Examples')
            ->icon('💡')
            ->markdown('examples.md')
            ->package('pages')
            ->inGroup('pages')
            ->inSubgroup('usage')
            ->register();

        $docs->section('pages-php-classes')
            ->label('PHP Classes')
            ->icon('⚙️')
            ->markdown('php-classes.md')
            ->package('pages')
            ->inGroup('pages')
            ->inSubgroup('usage')
            ->register();
    }
}
