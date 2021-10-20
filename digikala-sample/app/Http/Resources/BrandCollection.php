<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class BrandCollection handles the brands collection.
 *
 * @package App\Http\Resources
 */
class BrandCollection extends ResourceCollection
{
    /**
     * The wrap string wraps the data.
     *
     * @var string the wrapping value
     */
    public static $wrap = 'brands';

    /**
     * Transform the resource collection into an array.
     *
     * @param $request
     * @return array|Arrayable
     */
    public function toArray($request)
    {
        return [
            'brands' => BrandResource::collection($this->collection)
        ];
    }
}
