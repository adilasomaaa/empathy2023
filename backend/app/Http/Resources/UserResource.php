<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'is_default_password' => $this->is_default_password,
            'created_at' => $this->created_at,
            'foto' => $this->foto,
            'updated_at' => $this->updated_at, 
            'published' => $this->created_at->format('d F, Y'),
            'published_dfh' => $this->created_at->diffForHumans(),
            'link_update' => route('user.update', $this->id),
            'link_delete' => route('user.delete', $this->id)
        ];
    }
}
