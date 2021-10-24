<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SaleUser for managing the users that use a sale.
 *
 * @package App\Models
 */
class SaleUser extends Model
{
    // Traits
    use HasFactory;

    // Table name
    protected $table = 'sale_user';

    /**
     * Sale fillable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'sale_id'
    ];
}
