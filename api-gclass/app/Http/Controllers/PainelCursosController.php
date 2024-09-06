<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class PainelCursosController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function submitUpdated(Request $request){
        try {
            $updateCurso = Cursos::find($request->nr_sequencial)->update([
                'titulo_curso' => $request->titulo_curso,
                'cor_titulo_curso' => $request->cor_titulo_curso,
                'subtitulo_curso' => $request->subtitulo_curso,
                'ds_curso' => $request->desc_curso,
            ]);

            return response()->json($updateCurso, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        }
    }

        
    public function submidCreated(Request $request){
        try {
            $cursos = Cursos::create([
                'titulo_curso' => $request->titulo_curso,
                'cor_titulo_curso' => $request->cor_titulo_curso,
                'subtitulo_curso' => $request->subtitulo_curso,
                'ds_curso' => $request->desc_curso,
            ]);

            return response()->json($cursos, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        }
    }

    public function deletedCurso(Request $request) {
        
        try {
            $cursos = Cursos::find($request->nr_sequencial)->delete();

            return response()->json($cursos, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        }
    }
}
