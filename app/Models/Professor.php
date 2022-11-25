<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professores';
    protected $guarded = [];
    
    public function cursos(){
        return $this -> hasMany(Curso::class); //Relacionamento One to One
    }

    use HasFactory;
}
