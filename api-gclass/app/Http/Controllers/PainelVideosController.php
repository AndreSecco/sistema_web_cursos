<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use App\Models\Modulos;
use App\Models\Videos;
use App\Models\VideosAnexos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class PainelVideosController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function submitUpdated(Request $request){
        try {
            $updateVideo = Videos::find($request->nr_sequencial)->update([
                'titulo_video' => $request->titulo_video,
                'link_video' => $request->link_video,
                'ds_video' => $request->desc_video

            ]);

            return response()->json($updateVideo, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        }
    }

        
    public function submidCreated(Request $request){
        try {
            $modulo = Videos::create([
                'titulo_video' => $request->titulo_video,
                'link_video' => $request->link_video,
                'ds_video' => $request->desc_video,
                'nr_seq_modulo' => $request->nr_seq_modulo
            ]);

            return response()->json($modulo, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        }
    }

    public function deletedVideo(Request $request) {
        
        try {
            $moduloVideo = Videos::find($request->nr_sequencial)->delete();

            return response()->json($moduloVideo, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        }
    }

    
    public function uploadArquivos(Request $request, $nr_seq_curso)
    {
        try {
            $files = $request->file('files');
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName() . strtotime("now") . '.' . $file->extension();
                // $fileName = $file->getClientOriginalName();
                $file->move('files', $fileName);

                $insertFile = VideosAnexos::create([
                    'nr_seq_video' => $nr_seq_curso,
                    'ds_arquivo' => $fileName,
                ]);
            }

            return response()->json($insertFile, 200);
        } catch (Exception $error) {
            return response()->json(['error' => $error->getMessage(), 500]);
        }
    }
}
