<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MobilResource extends JsonResource
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
            'no_plat' => $this->no_plat,
            'harga' => $this->harga,
            'foto' => '/storage/' . $this->foto,
            'rumah_sakit_id' => $this->rumah_sakit_id,
            // 'rumah_sakit_nama' => $this->rumah_sakit_nama,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
