<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Address for our users addresses.
 *
 * @package App\Models
 */
class Address extends Model
{
    // Traits
    use HasFactory;

    /**
     * Address model fillable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'state',
        'city',
        'address',
        'zip_code',
        'phone'
    ];

    /**
     * Each address is for one user.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
