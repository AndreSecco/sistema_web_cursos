<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use App\Models\Modulos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class PainelModulosController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function submitUpdated(Request $request){
        try {
            $updateModulo = Modulos::find($request->nr_sequencial)->update([
                'titulo_modulo' => $request->titulo_modulo,
                'ds_modulo' => $request->desc_modulo,
            ]);

            return response()->json($updateModulo, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        }
    }

        
    public function submidCreated(Request $request){
        try {
            $modulo = Modulos::create([
                'titulo_modulo' => $request->titulo_modulo,
                'ds_modulo' => $request->desc_modulo,
                'nr_seq_curso' => $request->nr_seq_curso
            ]);

            return response()->json($modulo, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        }
    }

    public function deletedModulo(Request $request) {
        
        try {
            $moduloDeleted = Modulos::find($request->nr_sequencial)->delete();

            return response()->json($moduloDeleted, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        }
    }
}
