<?php

namespace App\View\Components\buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SwitchButton extends Component
{
    /**
     * Create a new component instance.
     */
    public $url;
    public $method;
    public $objectData;
    public function __construct($url, $method, $objectData)
    {
        $this->url = $url;
        $this->method = $method;
        $this->objectData = $objectData;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.switch-button');
    }
}
