<?php
namespace App;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table = 'videos';
    protected $primaryKey = 'nr_sequencial';

    protected $fillable = [
        'titulo_video',
        'link_video',
        'ds_video',
        'nr_seq_modulo'
    ];

    public function anexos(){
        return $this->hasMany('App\Models\VideosAnexos', 'nr_seq_video', 'nr_sequencial');
    }
}
