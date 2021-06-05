<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StashResource extends JsonResource
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
            'log_datetime' => $this->log_datetime,
            'coins' => $this->metable->coins,
            'count' => $this->metable->count,
            'operation' => $this->metable->operation,
            'item_name' => $this->metable->item ? $this->metable->item->name : null,
        ];
    }
}
