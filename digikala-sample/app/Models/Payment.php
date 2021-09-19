<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment for user payments.
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
}
