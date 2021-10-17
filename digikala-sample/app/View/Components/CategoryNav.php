<?php

namespace App\View\Components;

use App\Menu\MenuMaker;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Class CategoryNav for categories navigation menu.
 *
 * @package App\View\Components
 */
class CategoryNav extends Component
{
    // Instance of menu
    public $menu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menu = MenuMaker::generate();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.category-nav')
            ->with('menu', $this->menu);
    }
}
