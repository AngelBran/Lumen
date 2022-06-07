<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    public function getAll(){
        $autores =  Autor::get();

        return $autores;
    }
}
