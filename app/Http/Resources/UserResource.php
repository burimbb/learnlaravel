<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->name.' => '. $this->email,
            'comments' => $this->comments,
            'achievments' => $this->achievments,
        ];
    }

    /**
     * Create new public function
     */
    public function with($request)
    {
        return [
            'another' => 'example',
            'success' => 200,
            'completed' => true
        ];
    }
}
