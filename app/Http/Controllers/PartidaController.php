<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partida;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PartidaController extends Controller
{
    public function getClasificacionGlobal() {
        $partidas = DB::table('partidas')
            ->join('users', 'partidas.user_id', '=', 'users.id')
            ->join('categorias', 'partidas.categoria_id', '=', 'categorias.id')
            ->select('partidas.*', 'users.username', 'categorias.nombre')
            ->orderByDesc('aciertos')
            ->orderByDesc('puntuacion')
            ->paginate(10);

        return response()->json($partidas);
    }

    public function getClasificacionUser($username) {

    }

    public function getClasificacionByCategoria($categoria) {
        $partidas = DB::table('partidas')
            ->join('users', 'partidas.user_id', '=', 'users.id')
            ->join('categorias', 'partidas.categoria_id', '=', 'categorias.id')
            ->select('partidas.*', 'users.username', 'categorias.nombre')
            ->where('categorias.nombre', '=', $categoria)
            ->orderByDesc('aciertos')
            ->orderByDesc('puntuacion')
            ->paginate(10);

        return response()->json($partidas);
    }
}