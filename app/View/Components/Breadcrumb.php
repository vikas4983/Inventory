<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    /**
     * Create a new component instance.
     */
    public $homeRoute;
    public $parentRoute = null; 
    public $currentRoute = null;

    public function __construct( array $homeRoute,  array $currentRoute, ?array $parentRoute)
    {
        $this->homeRoute = $homeRoute;
        $this->currentRoute = $currentRoute;
        $this->parentRoute = $parentRoute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumb');
    }
}
