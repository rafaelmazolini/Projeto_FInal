<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunoCurso extends Model
{
    protected $guarded = [];
    protected $table = 'aluno_curso';
    
    use HasFactory;
}
