<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SpecialItem.
 *
 * @package App\Models
 */
class SpecialItem extends Model
{
    // Traits
    use HasFactory;

    /**
     * Special item fillable.
     *
     * @var string[]
     */
    protected $fillable = [
        'item_id',
        'expire_date',
        'discount'
    ];
}
