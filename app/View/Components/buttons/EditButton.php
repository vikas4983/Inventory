<?php

namespace App\View\Components\buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditButton extends Component
{
    /**
     * Create a new component instance.
     */
    public $objectData;
    public $url;
    public $title;
    public $method = null;
    public $modalSize = null;
    
    public function __construct($objectData,$url,$title, $method,$modalSize)
    {
        $this->objectData = $objectData;
        $this->url = $url;
        $this->title = $title;
        $this->method = $method;
        $this->modalSize = $modalSize;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.buttons.edit-button');
    }
}
