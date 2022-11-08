<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moderador extends Model
{
    protected $table = 'moderadores';
    protected $guarded = [];
    
    use HasFactory;
}
