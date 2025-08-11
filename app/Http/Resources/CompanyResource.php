<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
        // dd($this->user, $this->user->name);
        return [
            'id' => (string) $this->id,
            'name' => (string) $this->name,
            'address' => (string) $this->address,
            'industry' => (string) $this->industry,
            'userId' => (string) $this->user_id,
            'user' => new UserResource($this->whenLoaded('user')),
            'createdAt' => (string) Carbon::parse($this->created_at)->timestamp,
            'updatedAt' => (string) Carbon::parse($this->updated_at)->timestamp
        ];
    }
}
