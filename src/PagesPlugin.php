<?php

declare(strict_types=1);

namespace Accelade\Pages;

use Accelade\Plugins\BasePlugin;

class PagesPlugin extends BasePlugin
{
    /**
     * The plugin ID (must be unique).
     */
    protected static string $id = 'pages';

    /**
     * The plugin name.
     */
    protected static string $name = 'Pages';

    /**
     * The plugin version.
     */
    protected static string $version = '1.0.0';

    /**
     * The plugin description.
     */
    protected static string $description = 'Pages plugin for Accelade';

    /**
     * The plugin author.
     */
    protected static string $author = 'Fady Mondy';

    /**
     * Plugin dependencies (other plugin IDs).
     *
     * @var array<string>
     */
    protected static array $dependencies = [];

    /**
     * Register the plugin.
     *
     * This method is called during the registration phase.
     * Register any bindings, singletons, or services here.
     */
    public function register(): void
    {
        // Register plugin-specific services
    }

    /**
     * Boot the plugin.
     *
     * This method is called after all plugins are registered.
     * Load views, routes, register components, etc.
     */
    public function boot(): void
    {
        // Load plugin resources
        $this->loadPluginViews();
        $this->loadPluginTranslations();
        $this->loadPluginMigrations();
        $this->loadPluginCommands();
    }

    /**
     * Get the plugin base path.
     */
    protected function getPluginPath(string $path = ''): string
    {
        $basePath = dirname(__DIR__);

        return $path ? "{$basePath}/{$path}" : $basePath;
    }
}
