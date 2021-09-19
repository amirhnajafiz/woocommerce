<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order for user orders.
 *
 * @package App\Models
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
}
