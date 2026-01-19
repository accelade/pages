# PHP Page Classes

Create reusable page classes for programmatic rendering.

## Creating a Page Class

```php
<?php

namespace App\Pages;

use Accelade\Pages\Page;

class Dashboard extends Page
{
    protected static string $title = 'Dashboard';
    protected static string $slug = 'dashboard';
    protected static ?string $icon = 'heroicon-o-home';

    public static function getView(): string
    {
        return 'pages.dashboard';
    }
}
```

## Registering Routes

```php
use App\Pages\Dashboard;

Route::get('/dashboard', fn () => Dashboard::render());
```

## Page Properties

| Property | Type | Description |
|----------|------|-------------|
| `$title` | string | Page title |
| `$slug` | string | URL slug |
| `$icon` | string | Icon component |
| `$layout` | string | Layout variant |

## Static Methods

| Method | Returns | Description |
|--------|---------|-------------|
| `getTitle()` | string | Get page title |
| `getSlug()` | string | Get URL slug |
| `getUrl()` | string | Generate URL |
| `render()` | View | Render the page |

## With Panel

```php
use Accelade\Panel\Panel;
use App\Pages\Dashboard;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->pages([
                Dashboard::class,
            ]);
    }
}
```

## Standalone Usage

Pages work independently without the panel:

```php
// routes/web.php
Route::get('/', fn () => view('pages.home'));
Route::get('/about', fn () => view('pages.about'));
Route::get('/contact', fn () => view('pages.contact'));
```

Each view uses the page component:

```blade
{{-- resources/views/pages/home.blade.php --}}
<x-pages::page layout="empty" title="Welcome">
    {{-- Homepage content --}}
</x-pages::page>
```
