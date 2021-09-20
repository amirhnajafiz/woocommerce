<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Item;
use Illuminate\Database\Seeder;

/**
 * Class BrandSeeder.
 *
 * @package Database\Seeders
 */
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::factory(10)
            ->has(Image::factory(1))
            ->has(Item::factory(5)->has(Image::factory(1))->afterCreating(function ($item) {
                $category = Category::query()->pluck('id')->random();
                $item->category_id = $category;
                $item->save();
            }))
            ->create();
    }
}
