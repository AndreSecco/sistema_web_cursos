<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Exception;

class VideosController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getAllVideosFromModule($nr_seq_modulo){
        try {
            $videos = Videos::select()->where('nr_seq_modulo', $nr_seq_modulo)->orderBy('titulo_video', 'ASC')->get();

            return response()->json($videos, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        }
    }

    public function getSingleVideo($nr_seq_video){
        try {
            $videos = Videos::select()->where('nr_sequencial', $nr_seq_video)
            ->with([
                'anexos' => function($query) {
                    $query->select();
                }
            ])
            ->get();

            return response()->json($videos, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        }
    }

    public function getNovidades(){
        try {
            $videos = Videos::select()
            ->orderBy('nr_sequencial', 'DESC')
            ->skip(0)
            ->take(6)
            ->get();

            return response()->json($videos, 200);
        } catch (Exception $error){
            return response()->json($error->getMessage(), 500);
        }
    }
}
