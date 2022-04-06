<?php

namespace App\View\Components;

use Illuminate\View\Component;

class carusel extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $nowplaying;
    public function __construct($nowplaying)
    {
         $this->nowplaying=$nowplaying;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.carusel');
    }
}
