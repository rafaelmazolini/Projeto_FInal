<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $guarded = [];
    
    public function materias(){
        return $this -> belongsToMany(Materia::class, 'aluno_curso');
    }
    
    use HasFactory;
}
