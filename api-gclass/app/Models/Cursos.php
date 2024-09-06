<?php
namespace App;

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    protected $table = 'cursos';
    protected $primaryKey =  'nr_sequencial';

    protected $fillable = [
        'titulo_curso',
        'cor_titulo_curso',
        'subtitulo_curso',
        'ds_curso',
    ];
}