<?php

namespace Database\Seeders;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pregunta = new Pregunta([
            'pregunta_txt' => '¿En qué año comenzó la Primera Guerra Mundial?',
            'respuesta_1' => '1917',
            'respuesta_2' => '1912',
            'respuesta_3' => '1914',
            'respuesta_4' => '1909',
            'res_correcta' => '1914',
            'categoria_id' => 1
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Quién fue el primer emperador romano?',
            'respuesta_1' => 'Atila',
            'respuesta_2' => 'Rasputín',
            'respuesta_3' => 'César',
            'respuesta_4' => 'Augusto',
            'res_correcta' => 'Augusto',
            'categoria_id' => 1
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Qué evento histórico marcó el fin de la Edad Media?',
            'respuesta_1' => 'Conquista de Al-Ándalus',
            'respuesta_2' => 'La caída de Constantinopla',
            'respuesta_3' => 'Muerte del rey Arturo',
            'respuesta_4' => 'Ataque a Pearl Harbor',
            'res_correcta' => 'La caída de Constantinopla',
            'categoria_id' => 1
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Quién fue el primer presidente de los Estados Unidos?',
            'respuesta_1' => 'George Washington',
            'respuesta_2' => 'John F. Kennedy',
            'respuesta_3' => 'Donald Trump',
            'respuesta_4' => 'Logan Paul',
            'res_correcta' => 'George Washington',
            'categoria_id' => 1
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Qué líder militar y político francés gobernó durante el periodo del Directorio y fue luego proclamado Emperador de los franceses?',
            'respuesta_1' => 'Napoleón',
            'respuesta_2' => 'Kameto',
            'respuesta_3' => 'Cabochard',
            'respuesta_4' => 'Isma',
            'res_correcta' => 'Napoleón',
            'categoria_id' => 1
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Cuál es la escultura más famosa de Miguel Ángel?',
            'respuesta_1' => 'La última cena',
            'respuesta_2' => 'El grito',
            'respuesta_3' => 'La gioconda',
            'respuesta_4' => '"El David"',
            'res_correcta' => '"El David"',
            'categoria_id' => 2
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Cuál es el título del videojuego indie que presenta un mundo subterráneo, lleno de insectos antropomórficos y una estética de dibujos animados hechos a mano?',
            'respuesta_1' => 'Silksong',
            'respuesta_2' => 'Hollow Knight',
            'respuesta_3' => 'Pokemon',
            'respuesta_4' => 'Grounded',
            'res_correcta' => 'Hollow Knight',
            'categoria_id' => 2
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Qué videojuego lanzado en 2019 destaca por su hermoso diseño artístico, su atmósfera surrealista y su enfoque en la exploración del espacio y los misterios del universo?',
            'respuesta_1' => 'Outer Wilds',
            'respuesta_2' => 'Dead Space',
            'respuesta_3' => 'Prey',
            'respuesta_4' => 'Starfield',
            'res_correcta' => 'Outer Wilds',
            'categoria_id' => 2
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Qué famoso arquitecto diseñó la Torre Eiffel en París?',
            'respuesta_1' => 'Beethoven',
            'respuesta_2' => 'Gustave Eiffel',
            'respuesta_3' => 'Quevedo',
            'respuesta_4' => 'Da Vinci',
            'res_correcta' => 'Gustave Eiffel',
            'categoria_id' => 2
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Quién escribió la famosa novela "Cien años de soledad"?',
            'respuesta_1' => 'Geoff Keighley',
            'respuesta_2' => 'Josef Fares',
            'respuesta_3' => 'Gabriel García Márquez',
            'respuesta_4' => 'Komanche',
            'res_correcta' => 'Gabriel García Márquez',
            'categoria_id' => 2
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Qué selección ganó la última Copa Mundial de Fútbol?',
            'respuesta_1' => 'Francia',
            'respuesta_2' => 'Mozambique',
            'respuesta_3' => 'Inglaterra',
            'respuesta_4' => 'Guatemala',
            'res_correcta' => 'Inglaterra',
            'categoria_id' => 3
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Qué jugador de tenis ha ganado más títulos de Grand Slam en la historia?',
            'respuesta_1' => 'Novak Djokovic',
            'respuesta_2' => 'Serena Williams',
            'respuesta_3' => 'Rafa Nadal',
            'respuesta_4' => 'Vinicius',
            'res_correcta' => 'Novak Djokovic',
            'categoria_id' => 3
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Cuál es el deporte más popular en la India?',
            'respuesta_1' => 'Baloncesto',
            'respuesta_2' => 'Natación',
            'respuesta_3' => 'Billar',
            'respuesta_4' => 'Cricket',
            'res_correcta' => 'Cricket',
            'categoria_id' => 3
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Cuál es el deporte nacional de Japón?',
            'respuesta_1' => 'Karate',
            'respuesta_2' => 'Sumo',
            'respuesta_3' => 'Hockey',
            'respuesta_4' => 'Taekwondo',
            'res_correcta' => 'Sumo',
            'categoria_id' => 3
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Quién es el máximo ganador de medallas de oro en la historia de los Juegos Olímpicos de Verano?',
            'respuesta_1' => 'Michael Phelps',
            'respuesta_2' => 'Roger Federer',
            'respuesta_3' => 'Isco',
            'respuesta_4' => 'Usain Bolt',
            'res_correcta' => 'Michael Phelps',
            'categoria_id' => 3
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Cuál es el elemento químico más abundante en el universo?',
            'respuesta_1' => 'Oxígeno',
            'respuesta_2' => 'Zinc',
            'respuesta_3' => 'Hidrógeno',
            'respuesta_4' => 'Plomo',
            'res_correcta' => 'Hidrógeno',
            'categoria_id' => 4
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Qué enfermedad es causada por la deficiencia de vitamina C?',
            'respuesta_1' => 'Escorbuto',
            'respuesta_2' => 'Gripe A',
            'respuesta_3' => 'Peste',
            'respuesta_4' => 'Cáncer',
            'res_correcta' => 'Escorbuto',
            'categoria_id' => 4
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Cuál es la unidad básica de la materia?',
            'respuesta_1' => 'Célula',
            'respuesta_2' => 'Electrón',
            'respuesta_3' => 'Átomo',
            'respuesta_4' => 'Materia',
            'res_correcta' => 'Átomo',
            'categoria_id' => 4
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Cuál es la unidad básica de la herencia genética?',
            'respuesta_1' => 'Leucocito',
            'respuesta_2' => 'Cromosoma',
            'respuesta_3' => 'ADN',
            'respuesta_4' => 'Gen',
            'res_correcta' => 'Gen',
            'categoria_id' => 4
        ]);
        $pregunta->save();

        $pregunta = new Pregunta([
            'pregunta_txt' => '¿Cuál es el proceso mediante el cual las plantas fabrican su propio alimento?',
            'respuesta_1' => 'Fotosíntesis',
            'respuesta_2' => 'Evolución',
            'respuesta_3' => 'Autosuficiencia',
            'respuesta_4' => 'Erupción',
            'res_correcta' => 'Fotosíntesis',
            'categoria_id' => 4
        ]);
        $pregunta->save();
    }
}
