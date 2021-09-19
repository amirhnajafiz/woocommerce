<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
