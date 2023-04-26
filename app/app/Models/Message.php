<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Message for message storage to users.
 *
 * @package App\Models
 */
class Message extends Model
{
    // Traits
    use HasFactory;

    /**
     * Message model fields.
     *
     * @var string[]
     */
    protected $fillable = [
      'message',
      'type',
      'user_id'
    ];

    /**
     * Each message is for a user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
