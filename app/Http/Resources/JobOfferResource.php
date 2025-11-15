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
            'id'           => $this->id,
            'company_id'   => $this->company_id,
            'title'        => $this->title,
            'description'  => $this->description,
            'city'         => $this->city,
            'sector'       => $this->sector,
            'salary'       => $this->salary,
            'is_temporary' => $this->is_temporary,
            'created_at' => $this->created_at? $this->created_at->format('d/m/Y'): null,
            'open_until' => $this->open_until? $this->open_until->format('d/m/Y'): null,
            'dates' => JobDateResource::collection($this->whenLoaded('dates')),
            'company' => new CompanyResource($this->whenLoaded('company'))
        ];
    }
}
