<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Image for image storage.
 *
 * @package App\Models
 */
class Image extends Model
{
    // Traits
    use HasFactory;

    /**
     * Image fillable parts.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'alt',
        'path'
    ];

    /**
     * For polymorphic image usage.
     *
     * @return MorphTo
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'imageable_type', 'imageable_id');
    }
}
