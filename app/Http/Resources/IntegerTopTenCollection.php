<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class IntegerTopTenCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($data) {
            return [
                'number' => $data->number,
                'roman_equivalent' => $data->roman_equivalent,
                'converted_count' => $data->converted_count,
            ];
        });
    }
}
