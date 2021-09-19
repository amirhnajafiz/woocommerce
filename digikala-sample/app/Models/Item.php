<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class Item for each shop item.
 *
 * @package App\Models
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
        'view',
        'sell',
        'favorite',
        'price',
        'number',
        'score',
        'brand_id',
        'category_id',
        'properties'
    ];

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
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
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
}
