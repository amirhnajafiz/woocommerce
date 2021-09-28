<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JsonSerializable;

/**
 * Class CategoryCollection handles the categories collection.
 *
 * @package App\Http\Resources
 */
class CategoryCollection extends ResourceCollection
{
    /**
     * The wrap string wraps the data.
     *
     * @var string the wrapping value
     */
    public static $wrap = 'categories';

    /**
     * Transform the resource collection into an array.
     *
     * @param $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'categories' => CategoryResource::collection($this->collection)
        ];
    }
}
