<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria = new Categoria([
            'nombre' => 'Historia',
            'descripcion' => 'Cuestiones sobre eventos importantes, figuras históricas, y descubrimientos significativos que han marcado la historia de la humanidad.'
        ]);
        $categoria->save();

        $categoria = new Categoria([
            'nombre' => 'Arte',
            'descripcion' => 'Preguntas relacionadas con artistas reconocidos, obras de arte famosas, y música de diferentes géneros y épocas.'
        ]);
        $categoria->save();

        $categoria = new Categoria([
            'nombre' => 'Deportes',
            'descripcion' => 'Interrogantes acerca de deportes populares, así como datos sobre deportistas famosos.'
        ]);
        $categoria->save();

        $categoria = new Categoria([
            'nombre' => 'Ciencia',
            'descripcion' => 'Preguntas sobre avances científicos, inventos destacados, conceptos básicos de física, química, biología, y los últimos desarrollos en tecnología.'
        ]);
        $categoria->save();
    }
}
