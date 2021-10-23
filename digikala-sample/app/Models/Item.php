<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * Class Item for each shop item.
 *
 * @package App\Models
 * @method static paginate(int $int)
 */
class Item extends Model
{
    // Traits
    use HasFactory;

    /**
     * Item fillable parts.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'price',
        'number',
        'brand_id'
    ];

    /**
     * Mutator for setting the item name.
     *
     * @param $value string item name
     */
    public function setNameAttribute(string $value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Each item has a main image.
     *
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Each item has a category.
     *
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Each item has a brand.
     *
     * @return BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Check if one item is special.
     *
     * @return bool true or false
     */
    public function isSpecial(): bool
    {
        return SpecialItem::all()->keyBy('item_id')->has($this->attributes['id']);
    }
}
