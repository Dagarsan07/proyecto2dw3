<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $table = 'preguntas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'pregunta_txt',
        'respuesta_1',
        'respuesta_2',
        'respuesta_3',
        'respuesta_4',
        'res_correcta',
    ];

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }
}
