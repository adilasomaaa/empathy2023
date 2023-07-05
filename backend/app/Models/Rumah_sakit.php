<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah_sakit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'rumah_sakit';

    public function mobil()
    {
        return $this->hasMany(Mobil::class,'rumah_sakit_id');
    }

    public function distanceTo($lat, $lng)
    {
        $earthRadius = 6371; // Radius bumi dalam kilometer
        $latFrom = deg2rad($this->lat);
        $lonFrom = deg2rad($this->lng);
        $latTo = deg2rad($lat);
        $lonTo = deg2rad($lng);
        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;
        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }
    
}
