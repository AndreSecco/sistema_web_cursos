<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Modulos extends Model
{
    protected $table = 'modulos';
    protected $primaryKey = 'nr_sequencial';

    protected $fillable = [
        'titulo_modulo',
        'ds_modulo',
        'nr_seq_curso'
    ];

    public function curso()
    {
        return $this->belongsTo('App\Models\Cursos', 'nr_seq_curso');
    }
}
