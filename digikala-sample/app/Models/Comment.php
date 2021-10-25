<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * Each comment has only one user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
