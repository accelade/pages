<?php

declare(strict_types=1);

namespace Accelade\Pages\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Page extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $layout = 'app',
        public ?string $heading = null,
        public ?string $subheading = null,
        public bool $hasHeader = true,
        public bool $hasFooter = true,
    ) {}

    public function render(): View
    {
        return view('pages::components.page');
    }
}
