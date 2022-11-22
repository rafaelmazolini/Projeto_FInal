<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $guarded = [];
    
    public function alunos(){
        return $this -> belongsToMany(Aluno::class, 'aluno_curso');
    }
    
    use HasFactory;
}