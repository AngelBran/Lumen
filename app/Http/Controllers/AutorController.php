<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use App\Http\Requests\NuevoAutorRequest;

class AutorController extends Controller
{
    public function getAll() {
        $autores =  Autor::where("estado", 1)->get(["id", "nombre"]);

        return $autores;
    }

    public function getById(int $id) {
        $autor =  Autor::where("id", $id)->get(["id", "nombre"]);

        return $autor;
    }

    public function create(NuevoAutorRequest $request) {
        $request->validated();

        $autor = new Autor([
            "nombre" => $request->nombre,
            "estado" => 1
        ]);

        $autor->save();

        return response()->json($autor);
    }

    public function update(Request $request, int $id) {
        $autor = Autor::where('id', $id)->first();

        $autor->nombre = $request->nombre;
        $autor->estado = $request->estado;

        $autor->save();

        return response()->json($autor);
    }

    public function delete(int $id) {
        $autor = Autor::where('id', $id)->first();

        $autor->estado = 0;
        $autor->save();

        return response()->json($autor);
    }
}
