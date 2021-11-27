<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * Class Navigation
 * @package App\View\Components
 */
class Navigation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return <<<'blade'
<div class="blueColor">
    It is quality rather than quantity that matters. - Lucius Annaeus Seneca
</div>
blade;
    }
}
