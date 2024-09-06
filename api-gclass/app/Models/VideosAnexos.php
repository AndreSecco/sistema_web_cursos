<?php
namespace App;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideosAnexos extends Model
{
    protected $table = 'videos_anexos';
    protected $primaryKey = 'nr_sequencial';

    protected $guarded = []; 
}
