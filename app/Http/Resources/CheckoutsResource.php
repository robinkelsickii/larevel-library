<?php

namespace App\Http\Resources;

use Attribute;
use Illuminate\Http\Resources\Json\JsonResource;

class CheckoutsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'attributes' => [
                'user_id' => (string) $this->user_id,
                'book_id' => (string) $this->book_id,
                'checked_out' => $this->checked_out,
                'checked_in' => $this->checked_in,
            ]
        ];
    }
}
