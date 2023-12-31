<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OperatorResource extends JsonResource
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
            'nama' => $this->nama,
            'user' => $this->user,
            'alamat' => $this->alamat,
            'jk' => $this->jk,
            'nohp' => $this->nohp,
            'user_id' => $this->user_id,
            'rumah_sakit_id' => $this->rumah_sakit,
            'created_at' => $this->created_at->format('d F Y'),
            'updated_at' => $this->updated_at,
        ];
    }
}
