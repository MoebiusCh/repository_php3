<?php

namespace App\View\Components\forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $size,
        public string $message,
        public string $textColor,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input');
    }
    public function shouldRender(): bool
    {
        return Str::length($this->message) > 5;
    }
}
