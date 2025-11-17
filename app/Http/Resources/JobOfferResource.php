<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobOfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'city' => $this->city,
            'salary' => $this->salary,
            'open_until' => $this->open_until->format('d/m/Y'),
            'dates' => JobDateResource::collection($this->whenLoaded('dates')),
            'company' => $this->whenLoaded('company')
        ];
    }
}
