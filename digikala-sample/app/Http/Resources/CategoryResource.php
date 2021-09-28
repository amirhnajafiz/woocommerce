<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * Class CategoryResource handles the category data pack.
 *
 * @package App\Http\Resources
 */
class CategoryResource extends JsonResource
{
    /**
     * The wrapper string handles the data wrapping key.
     *
     * @var string wrapping key
     */
    public static $wrap = 'category';

    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'category' => [
                'id' => $this->id,
                'name' => $this->name
            ],
            'image' => new ImageResource($this->image),
            $this->mergeWhen($this->parent !== null, [
                'parent' => new CategoryResource($this->parent)
            ]),
            $this->mergeWhen($this->children->count() > 0, [
                'children' => new CategoryCollection($this->children)
            ])
        ];
    }
}
