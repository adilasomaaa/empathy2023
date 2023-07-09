<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PemesananResource extends JsonResource
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
            'lokasi' => $this->lokasi,
            'lat' => (float)$this->lat,
            'lng' => (float)$this->lng,
            'deskripsi' => $this->deskrpsi,
            'nohp' => $this->nohp,
            'foto' => '/pemesanan/' . $this->foto,
            'status' => $this->status,
            'rumah_sakit_id' => $this->rumah_sakit_id,
            'created_at' => $this->created_at->format('h:i:s, d F Y'),
            'updated_at' => $this->updated_at,
        ];
    }
}
