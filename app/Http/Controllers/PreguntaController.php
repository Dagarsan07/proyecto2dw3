<?php

namespace App\Http\Controllers;
use App\Models\Pregunta;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PreguntaController extends Controller
{
    public function getRandPreguntas($categoria) {
        $preguntas = Pregunta::where('categoria_id', $categoria)
            ->inRandomOrder()
            ->take(10)
            ->get();

        return response()->json($preguntas);
    }
}
