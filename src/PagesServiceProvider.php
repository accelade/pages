<?php

declare(strict_types=1);

namespace Accelade\Pages;

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
            __DIR__ . '/../config/accelade-pages.php',
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
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'pages');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'pages');

        // Register documentation after all service providers are booted
        $this->app->booted(function () {
            $this->registerDocs();
        });

        if ($this->app->runningInConsole()) {
            // Publish config
            $this->publishes([
                __DIR__ . '/../config/accelade-pages.php' => config_path('accelade-pages.php'),
            ], 'accelade-pages-config');

            // Publish views
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/pages'),
            ], 'accelade-pages-views');

            // Register commands
            $this->commands([
                Commands\InstallPagesCommand::class,
            ]);
        }
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
        $docs->registerPackage('pages', __DIR__ . '/../docs');

        // Register navigation group
        $docs->registerGroup('pages', 'Pages', 'document-text', 50);

        // Register sections
        $docs->section('pages-overview')
            ->label('Overview')
            ->markdown('getting-started.md')
            ->package('pages')
            ->icon('document-text')
            ->inGroup('pages')
            ->register();
    }
}
