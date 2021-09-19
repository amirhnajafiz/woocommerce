<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Brand.
 *
 * @package App\Models
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
}
