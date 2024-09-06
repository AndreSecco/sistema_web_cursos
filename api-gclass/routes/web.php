<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


$router->get('/', function () use ($router) {
    return "Public route ok";
});

$router->group([
        'prefix' => 'cursos'
    ], function () use ($router) {
        $router->get('/getAllCursos', 'CursosController@getAllCursos');
});

$router->group([
        'prefix' => 'modulos'
], function () use ($router) {
        $router->get('/getModulos/{nr_seq_curso}', 'ModulosController@getModulos');
        $router->get('/getCursosFromModule/{nr_seq_curso}', 'ModulosController@getCursosFromModule');
        $router->get('/getModulo/{nr_seq_modulo}', 'ModulosController@getModulo');
});

$router->group([
        'prefix' => 'videos'
], function () use ($router) {
        $router->get('/getAllVideosFromModule/{nr_seq_modulo}', 'VideosController@getAllVideosFromModule');
        $router->get('/getSingleVideo/{nr_seq_video}', 'VideosController@getSingleVideo');
        $router->get('/getNovidades', 'VideosController@getNovidades');
});

// PAINEL

$router->group([
        'prefix' => 'painel/curso',
        // 'namespace' => 'Painel'
], function () use ($router) {
        $router->post('/submitUpdated', 'PainelCursosController@submitUpdated');
        $router->post('/submidCreated', 'PainelCursosController@submidCreated');
        $router->post('/deletedCurso', 'PainelCursosController@deletedCurso');
});

$router->group([
        'prefix' => 'painel/modulo',
        // 'namespace' => 'Painel'
], function () use ($router) {
        $router->post('/submitUpdated', 'PainelModulosController@submitUpdated');
        $router->post('/submidCreated', 'PainelModulosController@submidCreated');
        $router->post('/deletedModulo', 'PainelModulosController@deletedModulo');
});

$router->group([
        'prefix' => 'painel/video',
        // 'namespace' => 'Painel'
], function () use ($router) {
        $router->post('/submitUpdated', 'PainelVideosController@submitUpdated');
        $router->post('/submidCreated', 'PainelVideosController@submidCreated');
        $router->post('/deletedVideo', 'PainelVideosController@deletedVideo');
        $router->post('/uploadArquivos/{nr_seq_curso}', 'PainelVideosController@uploadArquivos');
        
});