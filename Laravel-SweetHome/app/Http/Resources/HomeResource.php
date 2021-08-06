<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
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
            'price' => $this->price,
            'category' => $this->category->name,
            'photo' => $this->photo,
            'status' => $this->status->name,
            'bathroom' => $this->bathroomNumber,
            'bedroom' => $this->bedroomNumber,
            'address' => $this->address,
            'created_at' => $this->created_at->format('jS F Y h:i:s'),
            'user' => $this->user->name,
        ];
    }
}
