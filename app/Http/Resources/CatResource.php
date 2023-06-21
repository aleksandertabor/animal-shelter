<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Cat */
class CatResource extends JsonResource
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
            'shelter_id' => $this->shelter_id,
            'name' => $this->name,
        ];
    }
}
