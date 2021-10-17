<?php

namespace App\Menu;

use App\Models\Category;
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
     * @return Menu
     */
    private static function subBuild(Menu $menu, Category $category): Menu
    {
        if ($category->children()->count() > 0) {
            $sub = Menu::new()->addClass('inline-nav');
            foreach ($category->children() as $subChild) {
                $sub = self::subBuild($sub, $subChild);
            }
            $menu->link(route('category.show', $category->id), $category->name)->submenu('', $sub);
        } else {
            $menu->link(route('category.show', $category->id), $category->name);
        }
        return $menu;
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
            $menu = self::subBuild($menu, $category);
        }
        return $menu->addClass('inline-nav');
    }
}
