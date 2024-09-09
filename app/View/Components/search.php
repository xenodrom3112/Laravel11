<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class search extends Component
{
    public $categoryAll;
    public $posts;
    /**
     * Create a new component instance.
     */
    public function __construct($posts, $categoryAll)
    {
        $this->categoryAll = $categoryAll;
        $this->posts = $posts;
    }
        //
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search');
    }
}
