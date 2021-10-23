<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Order for user cart.
 *
 * @package App\Models
 * @method static paginate(int $int)
 */
class Order extends Model
{
    // Traits
    use HasFactory;

    /**
     * Order fillable.
     *
     * @var string[]
     */
    protected $fillable = [
        'cart_id',
        'item_id',
        'number'
    ];

    /**
     * Each cart belongs to a cart.
     *
     * @return BelongsTo
     */
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Each cart has an item.
     *
     * @return BelongsTo
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
