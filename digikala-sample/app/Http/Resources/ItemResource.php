<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * Class ItemResource handles the Item Json wrapping.
 *
 * @package App\Http\Resources
 */
class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'item' => [
                'id' => $this->id,
                'name' => $this->name,
                'view' => $this->view,
                'sell' => $this->sell,
                'favorite' => $this->favorite,
                'price' => $this->price,
                'number' => $this->number,
                'score' => $this->score
            ],
            'brand' => [
                'id' => $this->brand_id,
                'name' => $this->brand->name
            ],
            'category' => [
                'id' => $this->category_id,
                'name' => $this->category->name
            ],
            'properties' => json_encode($this->properties)
        ];
    }
}
