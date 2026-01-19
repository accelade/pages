<?php

declare(strict_types=1);

namespace Accelade\Pages;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Router;

abstract class Page
{
    /**
     * The page title.
     */
    protected static ?string $title = null;

    /**
     * The navigation icon.
     */
    protected static ?string $navigationIcon = null;

    /**
     * The navigation label.
     */
    protected static ?string $navigationLabel = null;

    /**
     * The navigation group.
     */
    protected static ?string $navigationGroup = null;

    /**
     * The navigation sort order.
     */
    protected static int $navigationSort = 0;

    /**
     * The page slug.
     */
    protected static ?string $slug = null;

    /**
     * The view to render.
     */
    protected static string $view = '';

    /**
     * Whether the page should appear in navigation.
     */
    protected static bool $shouldRegisterNavigation = true;

    /**
     * Get the page title.
     */
    public static function getTitle(): string
    {
        return static::$title ?? class_basename(static::class);
    }

    /**
     * Get the navigation icon.
     */
    public static function getNavigationIcon(): ?string
    {
        return static::$navigationIcon;
    }

    /**
     * Get the navigation label.
     */
    public static function getNavigationLabel(): string
    {
        return static::$navigationLabel ?? static::getTitle();
    }

    /**
     * Get the navigation group.
     */
    public static function getNavigationGroup(): ?string
    {
        return static::$navigationGroup;
    }

    /**
     * Get the navigation sort order.
     */
    public static function getNavigationSort(): int
    {
        return static::$navigationSort;
    }

    /**
     * Get the page slug.
     */
    public static function getSlug(): string
    {
        if (static::$slug !== null) {
            return static::$slug;
        }

        return str(class_basename(static::class))
            ->kebab()
            ->toString();
    }

    /**
     * Get the route name.
     */
    public static function getRouteName(): string
    {
        return static::getSlug();
    }

    /**
     * Get the URL for this page.
     */
    public static function getUrl(array $parameters = []): string
    {
        return route(static::getRouteName(), $parameters);
    }

    /**
     * Whether the page should register navigation.
     */
    public static function shouldRegisterNavigation(): bool
    {
        return static::$shouldRegisterNavigation;
    }

    /**
     * Register routes for this page.
     */
    public static function routes(Router $router, mixed $panel = null): void
    {
        $slug = static::getSlug();
        $routeName = static::getRouteName();

        $router->get($slug, [static::class, 'render'])
            ->name($routeName);
    }

    /**
     * Render the page.
     */
    public function render(): View
    {
        return view(static::$view, $this->getViewData());
    }

    /**
     * Get the view data.
     *
     * @return array<string, mixed>
     */
    protected function getViewData(): array
    {
        return [
            'title' => static::getTitle(),
        ];
    }

    /**
     * Get the page breadcrumbs.
     *
     * @return array<string, string>
     */
    public function getBreadcrumbs(): array
    {
        return [
            static::getNavigationLabel() => static::getUrl(),
        ];
    }

    /**
     * Check if user can access this page.
     */
    public static function canAccess(): bool
    {
        return true;
    }
}
