<?php

declare(strict_types=1);

namespace Accelade\Pages\Pages;

use Accelade\Pages\Page;
use Illuminate\Contracts\View\View;

class Dashboard extends Page
{
    /**
     * The page title.
     */
    protected static ?string $title = 'Dashboard';

    /**
     * The navigation icon.
     */
    protected static ?string $navigationIcon = 'heroicon-o-home';

    /**
     * The navigation label.
     */
    protected static ?string $navigationLabel = 'Dashboard';

    /**
     * The navigation sort order.
     */
    protected static int $navigationSort = -2;

    /**
     * The page slug.
     */
    protected static ?string $slug = 'dashboard';

    /**
     * Render the page.
     */
    public function render(): View
    {
        return view('pages::pages.dashboard', $this->getViewData());
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
            'widgets' => $this->getWidgets(),
        ];
    }

    /**
     * Get the dashboard widgets.
     *
     * @return array<class-string>
     */
    protected function getWidgets(): array
    {
        return [];
    }

    /**
     * Get the page breadcrumbs.
     *
     * @return array<string, string>
     */
    public function getBreadcrumbs(): array
    {
        return [];
    }
}
