<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class SpecialItemCollection for resource collection.
 *
 * @package App\Http\Resources
 */
class SpecialItemCollection extends ResourceCollection
{
    /**
     * Wrapper key for json wrapping.
     *
     * @var string wrap key
     */
    public static $wrap = 'items';

    /**
     * Transform the resource collection into an array.
     *
     * @param $request
     * @return array|Arrayable
     */
    public function toArray($request)
    {
        return [
            'items' => SpecialItemResource::collection($this->collection)
        ];
    }
}
