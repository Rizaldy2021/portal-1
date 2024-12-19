<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $topLevelFolders;

    public function __construct($topLevelFolders)
    {
        $this->topLevelFolders = $topLevelFolders;
    }

    public function render()
    {
        return view('components.sidebar');
    }
}
