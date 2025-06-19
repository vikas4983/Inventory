<?php

namespace App\View\Components\modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditModal extends Component
{
    /**
     * Create a new component instance.
     */
    public $objectData;
    public $url;
    public $title;
    public $modalSize;
    public function __construct($objectData, $url,$title,$modalSize)
    {
        $this->objectData = $objectData;
        $this->url = $url;
        $this->title = $title;
        $this->modalSize = $modalSize;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.edit-modal');
    }
}
