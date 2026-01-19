# Page Layouts

Three layout variants for different use cases.

## App Layout (Default)

Full layout with sidebar and top bar. Ideal for dashboards:

```blade
<x-pages::page layout="app" title="Dashboard" heading="Dashboard">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow">
            <h3 class="text-lg font-semibold">Total Users</h3>
            <p class="text-3xl font-bold text-primary-600">1,234</p>
        </div>
    </div>
</x-pages::page>
```

## Simple Layout

Card-centered without sidebar. Perfect for auth pages:

```blade
<x-pages::page layout="simple" title="Sign In" :hasHeader="false">
    <div class="max-w-md mx-auto">
        <h1 class="text-2xl font-bold text-center mb-8">Welcome Back</h1>
        <form action="/login" method="POST" class="space-y-4">
            @csrf
            <input type="email" name="email" placeholder="Email" class="w-full rounded-lg" />
            <input type="password" name="password" placeholder="Password" class="w-full rounded-lg" />
            <button type="submit" class="w-full py-2 bg-primary-600 text-white rounded-lg">
                Sign In
            </button>
        </form>
    </div>
</x-pages::page>
```

## Empty Layout

Minimal layout without chrome. For print pages, embeds, or page-builder:

```blade
<x-pages::page layout="empty" title="Invoice #1234">
    <div class="max-w-4xl mx-auto p-8 bg-white">
        <h1 class="text-3xl font-bold">INVOICE</h1>
        {{-- Invoice content --}}
        <button onclick="window.print()" class="print:hidden">Print</button>
    </div>
</x-pages::page>
```

## Layout Comparison

| Feature | App | Simple | Empty |
|---------|-----|--------|-------|
| Sidebar | Yes | No | No |
| Top bar | Yes | No | No |
| Card wrapper | No | Yes | No |
| Dark mode | Yes | Yes | Yes |
| Page-builder ready | No | No | Yes |
