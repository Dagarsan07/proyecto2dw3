<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pregunta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    public function getRandPreguntas($categoria) {
        $preguntas = Pregunta::query()
            ->where('categoria_id', '=', $categoria)
            ->take(10)
            ->get();
        return response()->json($preguntas);
    }
}
