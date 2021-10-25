<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment for managing the user comments on items.
 *
 * @package App\Models
 */
class Comment extends Model
{
    // Traits
    use HasFactory;

    /**
     * Model fields.
     *
     * @var string[]
     */
    protected $fillable = [
      'content',
      'item_id',
      'user_id'
    ];
}
