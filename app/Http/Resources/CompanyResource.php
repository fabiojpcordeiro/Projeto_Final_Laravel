<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'public_email'  => $this->public_email,
            'state'         => $this->state,
            'city'          => $this->city,
            'street'        => $this->street,
            'number'        => $this->number,
            'sector'        => $this->sector,
            'about'         => $this->about,
            'logo'          => $this->logo ? url('api/logo/'.$this->logo) : null,
            'rating'        => $this->rating ?? null,
            'created_at'    => $this->created_at?->format('d/m/Y'),
        ];
    }
}
