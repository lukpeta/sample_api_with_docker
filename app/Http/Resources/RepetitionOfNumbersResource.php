<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class RepetitionOfNumbersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $dates = [];

        foreach ($this->resource as $result) {
            $dates[] = Carbon::parse($result->publication->date)->toDateString();
        }

        return [
            'number_of_repeats' => $this->count(),
            'dates' => $dates
        ];
    }
}
