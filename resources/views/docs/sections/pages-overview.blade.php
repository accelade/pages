@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="pages-overview" :documentation="$documentation" :hasDemo="$hasDemo">
    <!-- Demo: Pages Overview -->
    <section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
        <div class="flex items-center gap-3 mb-2">
            <span class="w-2.5 h-2.5 bg-indigo-500 rounded-full"></span>
            <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Page Component</h3>
        </div>
        <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
            The <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-pages::page&gt;</code> component provides consistent page layouts with three variants: <strong>app</strong>, <strong>simple</strong>, and <strong>empty</strong>.
        </p>

        <div class="space-y-6">
            <!-- Layout Preview -->
            <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Layouts</span>
                    Three Layout Variants
                </h4>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- App Layout Preview -->
                    <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                        <div class="p-2 border-b border-[var(--docs-border)] text-xs font-medium" style="color: var(--docs-text-muted);">
                            layout="app"
                        </div>
                        <div class="flex h-32">
                            <div class="w-12 border-r border-[var(--docs-border)]" style="background: var(--docs-bg-alt);"></div>
                            <div class="flex-1 flex flex-col">
                                <div class="h-6 border-b border-[var(--docs-border)]" style="background: var(--docs-bg-alt);"></div>
                                <div class="flex-1 p-2">
                                    <div class="h-3 w-3/4 rounded" style="background: var(--docs-bg-alt);"></div>
                                    <div class="h-2 w-1/2 mt-1 rounded" style="background: var(--docs-bg-alt);"></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 text-xs text-center" style="color: var(--docs-text-muted);">
                            Sidebar + Top bar
                        </div>
                    </div>

                    <!-- Simple Layout Preview -->
                    <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                        <div class="p-2 border-b border-[var(--docs-border)] text-xs font-medium" style="color: var(--docs-text-muted);">
                            layout="simple"
                        </div>
                        <div class="h-32 flex items-center justify-center p-4">
                            <div class="w-24 h-20 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
                                <div class="h-2 w-2/3 mx-auto mt-3 rounded" style="background: var(--docs-border);"></div>
                                <div class="h-2 w-3/4 mx-auto mt-2 rounded" style="background: var(--docs-border);"></div>
                                <div class="h-4 w-1/2 mx-auto mt-3 rounded" style="background: var(--docs-border);"></div>
                            </div>
                        </div>
                        <div class="p-2 text-xs text-center" style="color: var(--docs-text-muted);">
                            Centered card
                        </div>
                    </div>

                    <!-- Empty Layout Preview -->
                    <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                        <div class="p-2 border-b border-[var(--docs-border)] text-xs font-medium" style="color: var(--docs-text-muted);">
                            layout="empty"
                        </div>
                        <div class="h-32 p-4">
                            <div class="h-2 w-1/2 rounded" style="background: var(--docs-bg-alt);"></div>
                            <div class="h-2 w-3/4 mt-2 rounded" style="background: var(--docs-bg-alt);"></div>
                            <div class="h-2 w-2/3 mt-2 rounded" style="background: var(--docs-bg-alt);"></div>
                        </div>
                        <div class="p-2 text-xs text-center" style="color: var(--docs-text-muted);">
                            No chrome
                        </div>
                    </div>
                </div>
            </div>

            <!-- Props -->
            <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Props</span>
                    Component Properties
                </h4>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-[var(--docs-border)]">
                                <th class="text-left py-2 px-3" style="color: var(--docs-text-muted);">Prop</th>
                                <th class="text-left py-2 px-3" style="color: var(--docs-text-muted);">Type</th>
                                <th class="text-left py-2 px-3" style="color: var(--docs-text-muted);">Default</th>
                                <th class="text-left py-2 px-3" style="color: var(--docs-text-muted);">Description</th>
                            </tr>
                        </thead>
                        <tbody style="color: var(--docs-text-muted);">
                            <tr class="border-b border-[var(--docs-border)]">
                                <td class="py-2 px-3"><code class="text-emerald-500">title</code></td>
                                <td class="py-2 px-3">string</td>
                                <td class="py-2 px-3">null</td>
                                <td class="py-2 px-3">Page title for browser tab</td>
                            </tr>
                            <tr class="border-b border-[var(--docs-border)]">
                                <td class="py-2 px-3"><code class="text-emerald-500">layout</code></td>
                                <td class="py-2 px-3">string</td>
                                <td class="py-2 px-3">'app'</td>
                                <td class="py-2 px-3">Layout variant: app, simple, empty</td>
                            </tr>
                            <tr class="border-b border-[var(--docs-border)]">
                                <td class="py-2 px-3"><code class="text-emerald-500">heading</code></td>
                                <td class="py-2 px-3">string</td>
                                <td class="py-2 px-3">null</td>
                                <td class="py-2 px-3">Page heading text</td>
                            </tr>
                            <tr class="border-b border-[var(--docs-border)]">
                                <td class="py-2 px-3"><code class="text-emerald-500">subheading</code></td>
                                <td class="py-2 px-3">string</td>
                                <td class="py-2 px-3">null</td>
                                <td class="py-2 px-3">Subheading text</td>
                            </tr>
                            <tr class="border-b border-[var(--docs-border)]">
                                <td class="py-2 px-3"><code class="text-emerald-500">hasHeader</code></td>
                                <td class="py-2 px-3">bool</td>
                                <td class="py-2 px-3">true</td>
                                <td class="py-2 px-3">Show header section</td>
                            </tr>
                            <tr>
                                <td class="py-2 px-3"><code class="text-emerald-500">hasFooter</code></td>
                                <td class="py-2 px-3">bool</td>
                                <td class="py-2 px-3">true</td>
                                <td class="py-2 px-3">Show footer section</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Use Cases -->
            <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Usage</span>
                    Best Use Cases
                </h4>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm" style="color: var(--docs-text-muted);">
                    <div class="p-3 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                        <strong style="color: var(--docs-text);">App Layout</strong>
                        <ul class="mt-2 space-y-1">
                            <li>Dashboards</li>
                            <li>Admin panels</li>
                            <li>Settings pages</li>
                        </ul>
                    </div>
                    <div class="p-3 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                        <strong style="color: var(--docs-text);">Simple Layout</strong>
                        <ul class="mt-2 space-y-1">
                            <li>Login/Register</li>
                            <li>Password reset</li>
                            <li>Onboarding</li>
                        </ul>
                    </div>
                    <div class="p-3 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                        <strong style="color: var(--docs-text);">Empty Layout</strong>
                        <ul class="mt-2 space-y-1">
                            <li>Print pages</li>
                            <li>Embeds</li>
                            <li>Page builder</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-accelade::code-block language="blade" filename="page-example.blade.php">
{{-- Dashboard with app layout --}}
&lt;x-pages::page
    layout="app"
    title="Dashboard"
    heading="Dashboard"
    subheading="Welcome back!"
&gt;
    &lt;div class="grid grid-cols-3 gap-6"&gt;
        {{-- Stats cards --}}
    &lt;/div&gt;
&lt;/x-pages::page&gt;

{{-- Login with simple layout --}}
&lt;x-pages::page layout="simple" title="Login" :hasHeader="false"&gt;
    &lt;form action="/login" method="POST"&gt;
        {{-- Login form --}}
    &lt;/form&gt;
&lt;/x-pages::page&gt;

{{-- Print page with empty layout --}}
&lt;x-pages::page layout="empty" title="Invoice"&gt;
    &lt;div class="print:block"&gt;
        {{-- Invoice content --}}
    &lt;/div&gt;
&lt;/x-pages::page&gt;
    </x-accelade::code-block>
</x-accelade::layouts.docs>
