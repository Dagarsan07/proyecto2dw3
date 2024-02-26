<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;

    protected $table = 'partidas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'aciertos',
        'cant_preguntas',
        'tiempo',
        'puntuacion'
    ];

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
