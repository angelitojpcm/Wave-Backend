<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'full_name' => $this->full_name,
            'email' => $this->email,
            'rol' => [
                'id' => $this->rol->id,
                'name' => $this->rol->name,
                'description' => $this->rol->description,
            ],
            'photo' => $this->photo,
            'last_device' => $this->last_device,
            'state' => $this->state,
        ];
    }
}
