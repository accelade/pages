# Page Component

The Accelade Pages package provides the `<x-pages::page>` Blade component for building consistent page layouts. Works standalone or with the panel package.

## Installation

```bash
composer require accelade/pages
```

## Basic Usage

```blade
<x-pages::page title="Dashboard" heading="Dashboard">
    <p>Welcome to your dashboard!</p>
</x-pages::page>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | string | null | Page title for browser |
| `layout` | string | 'app' | Layout: app, simple, empty |
| `heading` | string | null | Page heading |
| `subheading` | string | null | Subheading text |
| `hasHeader` | bool | true | Show header section |
| `hasFooter` | bool | true | Show footer section |

## Layout Variants

| Layout | Sidebar | Top bar | Best for |
|--------|---------|---------|----------|
| `app` | Yes | Yes | Dashboards, admin |
| `simple` | No | No | Auth, forms |
| `empty` | No | No | Print, embeds |

## Next Steps

- [Layouts](./layouts.md) - Layout variants in detail
- [Headers & Slots](./slots.md) - Custom headers and footers
- [Examples](./examples.md) - Real-world examples
- [PHP Classes](./php-classes.md) - Page class API
