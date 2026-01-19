# Headers, Footers & Slots

Customize page headers and footers using slots.

## Headings

```blade
<x-pages::page
    title="User Management"
    heading="Users"
    subheading="Manage your team members"
>
    {{-- Page content --}}
</x-pages::page>
```

## Custom Header Slot

Override the default header:

```blade
<x-pages::page title="Products">
    <x-slot:header>
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold">Products</h1>
                <p class="text-sm text-gray-500">Manage catalog</p>
            </div>
            <button class="px-4 py-2 bg-primary-600 text-white rounded-lg">
                Add Product
            </button>
        </div>
    </x-slot:header>

    {{-- Products list --}}
</x-pages::page>
```

## Footer Slot

```blade
<x-pages::page title="Settings" heading="Settings">
    <form id="settings-form">
        {{-- Form fields --}}
    </form>

    <x-slot:footer>
        <div class="flex justify-end gap-4">
            <button type="button" class="px-4 py-2 text-gray-700">Cancel</button>
            <button type="submit" form="settings-form" class="px-4 py-2 bg-primary-600 text-white rounded-lg">
                Save Changes
            </button>
        </div>
    </x-slot:footer>
</x-pages::page>
```

## Hiding Header/Footer

```blade
{{-- No header --}}
<x-pages::page title="Clean Page" :hasHeader="false">
    <p>Content without header</p>
</x-pages::page>

{{-- No footer --}}
<x-pages::page title="No Footer" :hasFooter="false">
    <p>Content without footer</p>
</x-pages::page>

{{-- Neither --}}
<x-pages::page title="Minimal" :hasHeader="false" :hasFooter="false">
    <p>Just the content</p>
</x-pages::page>
```
