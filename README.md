# Accelade Pages

[![Latest Version on Packagist](https://img.shields.io/packagist/v/accelade/pages.svg?style=flat-square)](https://packagist.org/packages/accelade/pages)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/accelade/pages/tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/accelade/pages/actions?query=workflow%3Atests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/accelade/pages.svg?style=flat-square)](https://packagist.org/packages/accelade/pages)

Build structured pages with consistent layouts, headers, footers, and slots for Laravel applications. Part of the Accelade ecosystem.

## Features

- **Page Component** - `<x-pages::page>` for consistent page structure
- **Multiple Layouts** - App (full), Simple (centered card), Empty (minimal)
- **Headers & Footers** - Customizable heading, subheading, and footer slots
- **Panel Integration** - Automatically uses panel layouts when available
- **Standalone Mode** - Works independently without panel package
- **Accelade Integration** - Includes `@acceladeStyles` and `@acceladeScripts` directives

## Installation

You can install the package via composer:

```bash
composer require accelade/pages
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="accelade-pages-config"
```

## Quick Start

### Basic Page

```blade
<x-pages::page title="Dashboard" heading="Dashboard" subheading="Welcome to your dashboard">
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        {{-- Your content --}}
    </div>
</x-pages::page>
```

### Page with Custom Header

```blade
<x-pages::page title="Users">
    <x-slot:header>
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">User Management</h1>
            <button class="btn btn-primary">Add User</button>
        </div>
    </x-slot:header>

    {{-- Content --}}
</x-pages::page>
```

### Simple Layout (Login/Register)

```blade
<x-pages::page layout="simple" title="Login">
    <form>
        {{-- Login form --}}
    </form>

    <x-slot:footer>
        <a href="/register">Don't have an account? Register</a>
    </x-slot:footer>
</x-pages::page>
```

### Empty Layout

```blade
<x-pages::page layout="empty" title="Print Preview">
    {{-- Minimal content without any chrome --}}
</x-pages::page>
```

## Layouts

| Layout | Description |
|--------|-------------|
| `app` | Full layout with header, sidebar, footer (default) |
| `simple` | Centered card layout, ideal for auth pages |
| `empty` | Minimal layout without any chrome |

## Panel Integration

When used with `accelade/panel`, pages automatically:

- Use panel's themed layouts (`panel::layouts.app`, etc.)
- Include panel's navigation, header, and footer
- Apply panel's color scheme and theme

When used standalone (without panel):

- Uses built-in responsive layouts
- Includes dark mode toggle
- Integrates Accelade notifications

## Documentation

The package includes comprehensive documentation available in the Accelade docs portal:

- [Getting Started](docs/getting-started.md) - Installation and basic usage
- [Layouts](docs/layouts.md) - Available layouts and customization
- [Headers & Slots](docs/slots.md) - Working with slots and custom headers
- [Examples](docs/examples.md) - Real-world usage examples
- [PHP Classes](docs/php-classes.md) - Using Page classes programmatically

## Testing

```bash
# Run tests
composer test

# Run tests with coverage
composer test:coverage

# Run code formatter
composer format

# Run mago linter
composer mago
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## Credits

- [Fady Mondy](https://github.com/3x1io)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
