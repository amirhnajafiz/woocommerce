<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sale for sale making.
 *
 * @package App\Models
 * @method static paginate(int $int)
 */
class Sale extends Model
{
    // Traits
    use HasFactory;

    /**
     * Sale fillable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code',
        'discount'
    ];
}
