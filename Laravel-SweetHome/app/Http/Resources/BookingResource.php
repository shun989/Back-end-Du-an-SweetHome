<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'booking_id' => $this->id,
            'total_price' => $this->total_price,
            'id' => $this->apartment->id,
            'name' => $this->apartment->name,
            'price' => $this->apartment->price,
            'created_at' => $this->apartment->created_at->format('jS F Y h:i:s'),
            'user' => $this->apartment->user->name,
            'phone' => $this->apartment->user->phone,
            'category' => $this->apartment->category->name,
            'photo' => $this->apartment->photo,
            'email' => $this->apartment->user->email,
            'status' => $this->apartment->status->name,
            'bathroom' => $this->apartment->bathroomNumber,
            'bedroom' => $this->apartment->bedroomNumber,
            'description' => $this->apartment->description,
            'address' => $this->apartment->address,
            'user_id' => $this->apartment->user->id,
            'ward' => $this->apartment->ward->name,
            'district' => $this->apartment->ward->district->name,
            'province' => $this->apartment->ward->district->province->name,
        ];
    }
}
