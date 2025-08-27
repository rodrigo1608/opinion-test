<?php

namespace App\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $type;

    public function __construct(string $type = 'submit')
    {
        $this->type = $type;
    }

    public function render(): View
    {
        return view('components.forms.button');
    }
}
