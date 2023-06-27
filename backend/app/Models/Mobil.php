<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $table = 'mobil';
    protected $guarded = ['id'];

    public function rumah_sakit()
    {
        return $this->belongsTo(Rumah_sakit::class, 'rumah_sakit_id');
    }
}
