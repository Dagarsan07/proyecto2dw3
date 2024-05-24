<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function getAllCategorias() {
        $categorias = DB::table('categorias')
            ->get();

        return response()->json($categorias);
    }
}
