@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="pages-layouts" :documentation="$documentation" :hasDemo="$hasDemo">
    <!-- Demo: Page Layouts -->
    <section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
        <div class="flex items-center gap-3 mb-2">
            <span class="w-2.5 h-2.5 bg-indigo-500 rounded-full"></span>
            <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Page Layouts</h3>
        </div>
        <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
            Three layout variants for different page types.
        </p>

        <div class="space-y-6">
            <!-- App Layout -->
            <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">App</span>
                    App Layout (Default)
                </h4>
                <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                    Full application layout with sidebar and top bar. Ideal for dashboards and admin pages.
                </p>

                <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                    <div class="flex h-48">
                        <!-- Sidebar -->
                        <div class="w-48 border-r border-[var(--docs-border)] p-3" style="background: var(--docs-bg-alt);">
                            <div class="text-xs font-semibold mb-2" style="color: var(--docs-text);">Sidebar</div>
                            <div class="space-y-2">
                                <div class="h-6 rounded px-2 py-1 text-xs flex items-center gap-2" style="background: var(--docs-bg); color: var(--docs-text-muted);">
                                    <span class="w-3 h-3 rounded" style="background: var(--docs-border);"></span>
                                    Dashboard
                                </div>
                                <div class="h-6 rounded px-2 py-1 text-xs flex items-center gap-2" style="color: var(--docs-text-muted);">
                                    <span class="w-3 h-3 rounded" style="background: var(--docs-border);"></span>
                                    Users
                                </div>
                                <div class="h-6 rounded px-2 py-1 text-xs flex items-center gap-2" style="color: var(--docs-text-muted);">
                                    <span class="w-3 h-3 rounded" style="background: var(--docs-border);"></span>
                                    Settings
                                </div>
                            </div>
                        </div>
                        <!-- Main -->
                        <div class="flex-1 flex flex-col">
                            <!-- Top bar -->
                            <div class="h-10 border-b border-[var(--docs-border)] px-4 flex items-center justify-between" style="background: var(--docs-bg-alt);">
                                <span class="text-xs" style="color: var(--docs-text-muted);">Top Bar</span>
                                <div class="w-6 h-6 rounded-full" style="background: var(--docs-border);"></div>
                            </div>
                            <!-- Content -->
                            <div class="flex-1 p-4">
                                <div class="h-4 w-32 rounded mb-2" style="background: var(--docs-bg-alt);"></div>
                                <div class="h-3 w-48 rounded mb-4" style="background: var(--docs-bg-alt);"></div>
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="h-16 rounded" style="background: var(--docs-bg-alt);"></div>
                                    <div class="h-16 rounded" style="background: var(--docs-bg-alt);"></div>
                                    <div class="h-16 rounded" style="background: var(--docs-bg-alt);"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Simple Layout -->
            <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Simple</span>
                    Simple Layout
                </h4>
                <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                    Card-centered layout without sidebar. Perfect for authentication pages.
                </p>

                <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden h-48 flex items-center justify-center" style="background: linear-gradient(135deg, var(--docs-bg-alt) 0%, var(--docs-bg) 100%);">
                    <div class="w-64 rounded-xl border border-[var(--docs-border)] p-4" style="background: var(--docs-bg);">
                        <div class="h-4 w-24 mx-auto rounded mb-4" style="background: var(--docs-bg-alt);"></div>
                        <div class="space-y-2">
                            <div class="h-8 rounded border border-[var(--docs-border)]"></div>
                            <div class="h-8 rounded border border-[var(--docs-border)]"></div>
                            <div class="h-8 rounded" style="background: var(--docs-bg-alt);"></div>
                        </div>
                        <div class="h-3 w-32 mx-auto mt-4 rounded" style="background: var(--docs-bg-alt);"></div>
                    </div>
                </div>
            </div>

            <!-- Empty Layout -->
            <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Empty</span>
                    Empty Layout
                </h4>
                <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                    Minimal layout without any chrome. For print pages, embeds, or page builder.
                </p>

                <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden h-48 p-4" style="background: var(--docs-bg);">
                    <div class="max-w-md mx-auto">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <div class="h-6 w-24 rounded" style="background: var(--docs-bg-alt);"></div>
                                <div class="h-3 w-32 mt-1 rounded" style="background: var(--docs-bg-alt);"></div>
                            </div>
                            <div class="text-right">
                                <div class="h-3 w-20 rounded" style="background: var(--docs-bg-alt);"></div>
                                <div class="h-3 w-16 mt-1 rounded" style="background: var(--docs-bg-alt);"></div>
                            </div>
                        </div>
                        <div class="border-t border-b border-[var(--docs-border)] py-2">
                            <div class="flex justify-between">
                                <div class="h-3 w-32 rounded" style="background: var(--docs-bg-alt);"></div>
                                <div class="h-3 w-16 rounded" style="background: var(--docs-bg-alt);"></div>
                            </div>
                        </div>
                        <div class="flex justify-end mt-2">
                            <div class="h-4 w-24 rounded" style="background: var(--docs-bg-alt);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Layout Comparison -->
    <div class="rounded-xl p-4 border border-[var(--docs-border)] mb-4" style="background: var(--docs-bg);">
        <h4 class="font-medium mb-4" style="color: var(--docs-text);">Layout Comparison</h4>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-[var(--docs-border)]">
                        <th class="text-left py-2 px-3" style="color: var(--docs-text-muted);">Feature</th>
                        <th class="text-center py-2 px-3" style="color: var(--docs-text-muted);">App</th>
                        <th class="text-center py-2 px-3" style="color: var(--docs-text-muted);">Simple</th>
                        <th class="text-center py-2 px-3" style="color: var(--docs-text-muted);">Empty</th>
                    </tr>
                </thead>
                <tbody style="color: var(--docs-text-muted);">
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3">Sidebar</td>
                        <td class="py-2 px-3 text-center text-emerald-500">Yes</td>
                        <td class="py-2 px-3 text-center text-red-500">No</td>
                        <td class="py-2 px-3 text-center text-red-500">No</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3">Top bar</td>
                        <td class="py-2 px-3 text-center text-emerald-500">Yes</td>
                        <td class="py-2 px-3 text-center text-red-500">No</td>
                        <td class="py-2 px-3 text-center text-red-500">No</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3">Card wrapper</td>
                        <td class="py-2 px-3 text-center text-red-500">No</td>
                        <td class="py-2 px-3 text-center text-emerald-500">Yes</td>
                        <td class="py-2 px-3 text-center text-red-500">No</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3">Header/Footer slots</td>
                        <td class="py-2 px-3 text-center text-emerald-500">Yes</td>
                        <td class="py-2 px-3 text-center text-emerald-500">Yes</td>
                        <td class="py-2 px-3 text-center text-emerald-500">Yes</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3">Best for</td>
                        <td class="py-2 px-3 text-center">Dashboards</td>
                        <td class="py-2 px-3 text-center">Auth pages</td>
                        <td class="py-2 px-3 text-center">Print/Embeds</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="blade" filename="layouts-example.blade.php">
{{-- App layout (default) --}}
&lt;x-pages::page layout="app" title="Dashboard" heading="Dashboard"&gt;
    &lt;div class="grid grid-cols-3 gap-6"&gt;
        {{-- Dashboard content --}}
    &lt;/div&gt;
&lt;/x-pages::page&gt;

{{-- Simple layout for auth --}}
&lt;x-pages::page layout="simple" title="Login" :hasHeader="false"&gt;
    &lt;div class="max-w-md mx-auto"&gt;
        &lt;form action="/login" method="POST"&gt;
            {{-- Login form --}}
        &lt;/form&gt;
    &lt;/div&gt;
&lt;/x-pages::page&gt;

{{-- Empty layout for print --}}
&lt;x-pages::page layout="empty" title="Invoice"&gt;
    &lt;div class="max-w-4xl mx-auto p-8"&gt;
        {{-- Invoice content --}}
        &lt;button onclick="window.print()" class="print:hidden"&gt;Print&lt;/button&gt;
    &lt;/div&gt;
&lt;/x-pages::page&gt;
    </x-accelade::code-block>
</x-accelade::layouts.docs>
