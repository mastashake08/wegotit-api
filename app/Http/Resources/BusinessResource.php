<?php

namespace WeGotIt\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use WeGotIt\Http\Resources\ItemResource;
class BusinessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'name' => $this->name,
          'city' => $this->city,
          'state' => $this->state,
          'country' => $this->country,
          'items' => ItemResource::collection($this->items)
        ];
    }
}
