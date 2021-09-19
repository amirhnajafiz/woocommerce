<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
