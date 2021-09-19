<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment for users comments on items.
 *
 * @package App\Models
 */
class Comment extends Model
{
    // Traits
    use HasFactory;

    /**
     * Comment model fillable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'item_id',
        'rate',
        'like',
        'dislike'
    ];
}
