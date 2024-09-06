<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CursosController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getAllCursos(){
        try {
            $cursos = Cursos::select()->orderBy('titulo_curso', 'ASC')->get();

            return response()->json($cursos, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        }
    }

}
