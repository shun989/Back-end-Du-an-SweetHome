<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApartmentResource extends JsonResource
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
            'created_at' => $this->created_at->format('jS F Y h:i:s'),
            'user' => $this->user->name,
            'phone' => $this->user->phone,
            'category' => $this->category->name,
            'image' => $this->photo,
            'email' => $this->user->email,
            'status' => $this->status->name,
            'bathroom' => $this->bathroomNumber,
            'bedroom' => $this->bedroomNumber,
            'description' => $this->description,
            'address' => $this->address,
            'user_id' => $this->user->id,
            'ward' => $this->ward->name,
            'district' => $this->ward->district->name,
            'province' => $this->ward->district->province->name,
        ];
    }
}
