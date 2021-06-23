<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Weegy\Todos\App\Models\Todo;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        /** @var Todo $this */
        return [
            'id' => $this->id,
            'title' => $this->title,
            'user' => $this->user->name
        ];
    }
}
