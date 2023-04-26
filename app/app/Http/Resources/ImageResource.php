<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ImageResource handles the image boxing.
 *
 * @package App\Http\Resources
 */
class ImageResource extends JsonResource
{
    /**
     * The wrap string wraps the data.
     *
     * @var string the wrapping value
     */
    public static $wrap = 'image';

    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array|Arrayable
     */
    public function toArray($request)
    {
        return [
            $this->mergeWhen((bool)$this, [
                'title' => $this->title,
                'alt' => $this->alt,
                'path' => $this->path
            ])
        ];
    }
}
