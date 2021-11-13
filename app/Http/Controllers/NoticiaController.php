<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use Carbon\Carbon;
use App\Http\Requests\NoticiaRequest;
use App\Services\UploadService;

class NoticiaController extends Controller
{
    public function index(){
        $noticias = Noticia::all();
        return view('noticias.index', [
            'noticias' => Noticia::where('status', Noticia::STATUS_ATIVO)->paginate(2)
        ]);
     }

    public function create(){
        return view('noticias.create');
    }

    public function store(NoticiaRequest $request)
    {
        $dados = $request->all();
        $dados['imagem'] = UploadService::upload($dados['imagem']);

        Noticia::create($dados);

        return redirect()->back()->with('mensagem', 'Notícia criada com sucesso!');
    }


    public function edit(Noticia $noticia)
    {
        return view('noticias.edit', [
            'noticia' => $noticia
        ]);
    }

    public function update(Noticia $noticia, NoticiaRequest $request) 
    {
        $dados = $request->all();
        if ($request->imagem) {
            $dados['imagem'] = UploadService::upload($dados['imagem']);
        }
        
        $noticia->update($dados);

        return redirect()->back()->with('mensagem', 'Notícia atualizada com sucesso!');
    }



    public function destroy(Noticia $noticia)
    {
        $noticia->delete();

        return redirect()->back()->with('mensagem', 'Notícia excluida com sucesso!');
    }

 }
