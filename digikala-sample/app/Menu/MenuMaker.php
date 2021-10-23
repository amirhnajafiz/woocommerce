<?php

namespace App\Menu;

use App\Models\Category;
use Illuminate\Support\Facades\Queue;
use Spatie\Menu\Menu;

/**
 * Class MenuMaker for creating our nested menus.
 *
 * @package App\Menu
 */
class MenuMaker
{
    /**
     * This function generates the submenus.
     *
     * @param Menu $menu
     * @param Category $category
     */
    private static function subBuild(Menu $menu, Category $category)
    {
        if ($category->children->count() > 0) {
            $menu->link(route('category.show', $category->id), $category->name . ': ');
            $sub = Menu::new()->addClass('inline-nav');
            foreach ($category->children as $subChild) {
                self::subBuild($sub, $subChild);
            }
            $menu->submenu('', $sub);
        } else {
            $menu->link(route('category.show', $category->id), $category->name);
        }
    }

    /**
     * This function generates the menu.
     *
     */
    public static function generate(): Menu
    {
        $categories = Category::query()->where('parent_id', '=', null)->get()->sortBy('name');
        $menu = Menu::new();

        foreach ($categories as $category) {
            self::subBuild($menu, $category);
        }

        return $menu->addClass('nav');
    }
}
