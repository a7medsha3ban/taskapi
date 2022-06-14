<?php

namespace Users\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'            =>  intval($this->id),
            'name'          =>  $this->name,
            'user_id'       =>  $this->user_id
        ];
    }
}
