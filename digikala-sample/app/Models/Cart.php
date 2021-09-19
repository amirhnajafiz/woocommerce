<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Cart is the user shopping cart.
 *
 * @package App\Models
 */
class Cart extends Model
{
    // Traits
    use HasFactory;

    /**
     * User cart fillable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'status'
    ];

    /**
     * Each cart is for a user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Each cart has its items.
     *
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
