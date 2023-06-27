<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;
    protected $table = 'operator';
    protected $guarded = ['id'];

    public function rumah_sakit()
    {
        return $this->belongsTo(Rumah_sakit::class, 'rumah_sakit_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
