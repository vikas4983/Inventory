<?php

namespace App\View\Components\buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteButton extends Component
{
    /**
     * Create a new component instance.
     */
    public $objectData;
    public $url;
    public $title;
    public $method = null;
    public function __construct($objectData, $url, $title, $method)
    {
        $this->objectData = $objectData;
        $this->url = $url;
        $this->title = $title;
        $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.delete-button');
    }
}
