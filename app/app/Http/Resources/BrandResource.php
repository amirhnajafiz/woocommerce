<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * Class BrandResource for JSON formatting Brand response.
 *
 * @package App\Http\Resources
 */
class BrandResource extends JsonResource
{
    /**
     * The wrapper string handles the data wrapping key.
     *
     * @var string wrapping key
     */
    public static $wrap = 'brand';

    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array|Arrayable
     */
    public function toArray($request)
    {
        return [
            'brand' => [
                'id' => $this->id,
                'name' => $this->name,
                'description' => $this->description
            ],
            'image' => new ImageResource($this->image)
        ];
    }
}
