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
    
    public function professor(){
        return $this -> belongsTo(Professor::class);
    }
    
    public $notas = [];
    
    public function atribuiNotas0(){
        foreach($this -> alunos as $alunos){
            array_push($this -> notas, 0);
        }
    }
    
    use HasFactory;
}