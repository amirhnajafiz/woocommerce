<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Str;

/**
 * Class Brand.
 *
 * @package App\Models
 * @method static paginate(int $int)
 */
class Brand extends Model
{
    // Traits
    use HasFactory;

    /**
     * Fallible of the brand model.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    /**
     * Mutator for setting the brand name.
     *
     * @param $value string name value
     */
    public function setNameAttribute(string $value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Each brand has a logo.
     *
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Every brand has some items.
     *
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
