<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
    public $page;
    public $rout;

    public function __construct($page,$rout)
    {
        $this->page=$page;
        $this->rout=$rout;
    }
    public function render()
    {
        return view('components.pagination');
    }
}
