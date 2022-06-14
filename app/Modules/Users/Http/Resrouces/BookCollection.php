<?php

namespace Users\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BookCollection extends ResourceCollection
{

    public function toArray($request)
    {
        $data = [];
        foreach ($this->collection as $record) {
            $data[] = new BookResource($record);
        }
        return $data;
    }
}
