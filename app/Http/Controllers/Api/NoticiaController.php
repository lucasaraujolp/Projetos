<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;
use App\Services\UploadService;


class NoticiaController extends Controller
{
    public function index()
    {
        return Noticia::all();
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $dados['imagem'] = UploadService::upload($dados['imagem']);
        
        return Noticia::create($request->all());
    }

    public function update(Request $request, Noticia $noticia) 
    {
        $dados = $request->all();

        if ($request->imagem) {
            $dados['imagem'] = UploadService::upload($dados['imagem']);
        }
        $noticia->update($dados);
        
        return $noticia;
    }

    public function destroy(Noticia $noticia)
    {
        return $noticia->delete();
    }

    public function show(Noticia $noticia)
    {
        return $noticia;
    }
}

