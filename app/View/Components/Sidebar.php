<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Class Sidebar
 * @package App\View\Components
 */
class Sidebar extends Component
{
    /**
     * @var
     */
    public $title;

    /**
     * @var
     */
    public $info;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $info
     */
    public function __construct($title,$info)
    {
        $this->title = $title;
        $this->info = $info;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidebar');
    }
}
