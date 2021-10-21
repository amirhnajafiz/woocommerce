<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class SpecialItem.
 *
 * @package App\Models
 * @method static paginate(int $int)
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

    /**
     * For every special item we have a item.
     *
     * @return BelongsTo
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
