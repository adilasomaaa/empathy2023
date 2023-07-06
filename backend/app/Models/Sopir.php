<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sopir extends Model
{
    use HasFactory;
    protected $table = 'sopir';
    protected $guardrd = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
