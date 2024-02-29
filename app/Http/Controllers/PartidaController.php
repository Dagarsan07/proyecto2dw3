<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partida;
use Illuminate\Support\Collection;

class PartidaController extends Controller
{
    public function getClasificacionGlobal() {
        $partidas = Partida::all();
        return response()->json($partidas);
    }
}
