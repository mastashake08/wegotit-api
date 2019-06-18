<?php

namespace WeGotIt\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      //$attr = Arr::add(parent::toArray($request),['orders' =>[]]);
        return [
          'id' => $this->id,
          'name' => $this->name,
          'email' => $this->name,
          'notifications' => $this->notifications,
          'status' => $this->status
        ];
    }
}
