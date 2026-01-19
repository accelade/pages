# Page Examples

Real-world page examples for common use cases.

## Dashboard

```blade
<x-pages::page
    layout="app"
    title="Dashboard"
    heading="Dashboard"
    subheading="Overview of your business metrics"
>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm">
            <p class="text-sm text-gray-500">Total Users</p>
            <p class="text-2xl font-bold">12,345</p>
        </div>
    </div>
</x-pages::page>
```

## Login Page

```blade
<x-pages::page layout="simple" title="Login" :hasHeader="false" :hasFooter="false">
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
            <h1 class="text-xl font-semibold text-center mb-8">Sign in</h1>
            <form method="POST" action="/login" class="space-y-6">
                @csrf
                <input name="email" type="email" required class="w-full rounded-lg" placeholder="Email" />
                <input name="password" type="password" required class="w-full rounded-lg" placeholder="Password" />
                <button type="submit" class="w-full py-2.5 bg-primary-600 text-white rounded-lg">
                    Sign in
                </button>
            </form>
        </div>
    </div>
</x-pages::page>
```

## Error Page (404)

```blade
<x-pages::page layout="empty" title="Page Not Found">
    <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900">
        <div class="text-center">
            <h1 class="text-9xl font-bold text-gray-200">404</h1>
            <h2 class="text-2xl font-semibold mt-4">Page not found</h2>
            <a href="/" class="mt-6 inline-block px-4 py-2 bg-primary-600 text-white rounded-lg">
                Go home
            </a>
        </div>
    </div>
</x-pages::page>
```

## Settings Page

```blade
<x-pages::page layout="app" title="Settings" heading="Settings">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm">
        <div class="border-b border-gray-200 dark:border-gray-700">
            <nav class="flex gap-4 px-6">
                <a href="#general" class="py-4 border-b-2 border-primary-600 text-primary-600">General</a>
                <a href="#security" class="py-4 border-b-2 border-transparent text-gray-500">Security</a>
            </nav>
        </div>
        <div class="p-6">
            <form class="space-y-6 max-w-2xl">
                <input type="text" class="w-full rounded-lg" value="John Doe" />
                <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-lg">Save</button>
            </form>
        </div>
    </div>
</x-pages::page>
```
