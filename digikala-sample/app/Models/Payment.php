<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Payment for user payment.
 *
 * @package App\Models
 */
class Payment extends Model
{
    // Traits
    use HasFactory;

    /**
     * Payment fillable parts.
     *
     * @var string[]
     */
    protected $fillable = [
        'cart_id',
        'amount',
        'bank'
    ];

    /**
     * Each payment is for a cart.
     *
     * @return BelongsTo
     */
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }
}
