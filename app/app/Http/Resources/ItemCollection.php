<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class ItemCollection handles the items collection.
 *
 * @package App\Http\Resources
 */
class ItemCollection extends ResourceCollection
{
    /**
     * The wrap string wraps the data.
     *
     * @var string the wrapping value
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
            'items' => ItemResource::collection($this->collection)
        ];
    }
}
