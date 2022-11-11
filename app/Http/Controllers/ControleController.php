<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControleController extends Controller
{
    public function inicio()
    {
        return redirect() -> route('pagina-login');
    }
}
