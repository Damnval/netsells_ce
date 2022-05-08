<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IntegerTopTenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($request);
        // return [
        //     'number' => $this->items->number,
        //     'roman_equivalent' => $this->roman_equivalent,
        //     'converted_count' => $this->converted_count,
        // ];
        // return [
        //     'data' => $this->collection->map(function ($data) {
        //         return [
        //             'number' => $data->number,
        //             'created_at' => Carbon::parse($data->created_at)->toDateTimeString()
        //         ];
        //     })
        // ];

        return [
            'data' => [
                'categories' => $this->collection->map(function ($data) {
                    return [
                        'number' => $data->number,
                        'created_at' => Carbon::parse($data->created_at)->toDateTimeString()
                    ];
                })
            ]
        ];
    }
}
