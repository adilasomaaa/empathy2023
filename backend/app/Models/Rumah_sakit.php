<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah_sakit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'rumah_sakit';
    
}
