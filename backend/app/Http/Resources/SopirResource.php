<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SopirResource extends JsonResource
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
            'id'=> $this->id,
            'username'=> $this->user->username,
            'email'=> $this->user->email,
            'password'=> $this->user->password,
            'nama'=> $this->nama,
            'alamat'=> $this->alamat,
            'nohp'=> $this->nohp,
            'foto'=> $this->foto,
            'user_id'=> $this->user_id,
            'created_at'=> $this->created_at,
            'updated_at'=> $this->updated_at,
        ];
    }
}
