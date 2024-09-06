<?php

namespace App\Http\Controllers;

use App\Models\Modulos;
use App\Models\Cursos;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ModulosController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getModulos($nr_seq_curso){
        try {
            $modulos = Modulos::select()->where('nr_seq_curso', $nr_seq_curso)->orderBy('titulo_modulo', 'ASC')->get();

            return response()->json($modulos, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        }
    }

    public function getCursosFromModule($nr_seq_curso) {
        try {
            $curso = Modulos::where('nr_seq_curso', $nr_seq_curso)
            ->with(['curso' => function ($query) {
                $query->select('nr_sequencial', 'titulo_curso');
            }])
            ->first();

            return response()->json($curso, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        } 
    }

    public function getModulo($nr_seq_modulo){
        try {
            $modulo = Modulos::select()->where('nr_sequencial', $nr_seq_modulo)->get();

            return response()->json($modulo, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        }    
    }
}
