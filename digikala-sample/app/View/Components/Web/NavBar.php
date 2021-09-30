<?php

namespace App\View\Components\Web;

use App\Http\Internal\APIRequest;
use Closure;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use PHPUnit\Util\Json;

/**
 * Class NavBar for our website navigation bar.
 *
 * @package App\View\Components\Web
 */
class NavBar extends Component
{
    public $categories;

    /**
     * Create a new component instance.
     *
     * @return void
     * @throws Exception
     */
    public function __construct()
    {
        $this->categories = APIRequest::handle(route('api.all.category'));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.web.nav-bar');
    }
}
