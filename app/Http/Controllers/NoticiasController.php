<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Noticias;

class NoticiasController extends Controller
{
    public function index( Noticias $noticias)
    {  
        $noticias = $noticias->all();
        $criterio = "";
        $noticias = Noticias::orderByDesc('id')->paginate(10);
        return view("noticias", compact("noticias","criterio")); 
    }

    public function new()
    {  
        return view("novas_noticias"); 
    }


    public function store(Request $request, Noticias $noticia)
    {
        //dd($request->Foto);
        try {
            $data = $request->all();
            //dd($data);
                if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                $name = ($request->data).kebab_case($request->titulo); 
                $extension = $request->imagem->extension();
                $nameFile = "{$name}.{$extension}";
                
                $upload = $request->imagem->storeAs('noticia', $nameFile); // Faz o upload:

                
                $data['imagem'] = $nameFile; 
                    if (!$upload) {
                        return redirect()
                    ->action("NoticiasController@index")
                    ->with("toast_error", "Houve um erro ao gravar o Imagem");
                    }
                }
            
                 $noticia->create($data);
                 return redirect()
                ->action("NoticiasController@index")
                ->with("toast_success", "Registro Gravado Com Sucesso");
        }
        catch (\Illuminate\Database\QueryException $e) 
        {
            dd($e);
            return redirect()
            ->action("NoticiasController@index")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    }
    public function destroy($id, Noticias $noticia)
    {
        try
        {
            $dados = $noticia->find($id);
            $dados->delete();
            //ou
            //$estado->destroy($id);
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            return redirect()
                ->action("NoticiasController@index")
                ->with("erro", "Houve um erro ao excluir o registro");
        }
        
        return redirect()
                ->action("NoticiasController@index")
                ->with("sucesso", "Registro excluído com sucesso");
    }


    public function edit(Noticias $noticia, $id)
    {
        $noticia = Noticias::find($id);
        return view("edit_noticias", compact("noticia","id"));
    }

    public function update(Request $request, Noticias $noticia, $id)
    {
        try {
            $dados = $noticia->find($id);
            $data = $request->all();
            
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) { // existe imagem nova
                        
            $name = ($request->data).kebab_case($request->titulo);
            $extension = $request->imagem->extension(); 
            $nameFile = "{$name}.{$extension}"; 
            
            //local
            $upload = $request->imagem->storeAs('noticia', $nameFile); // Faz o upload:

            $data['imagem'] = $nameFile; 
            if (!$upload) { // SE NAO FIZER O UPLOAD PARA O STORANGE
              return redirect()
                ->action("NoticiasController@index")
                ->with("toast_error", "Houve um erro ao gravar o Imagem");
            }

        }else{// se cair aqui, continua a imagem q estava no banco já 
            $data['imagem'] = $request->LogoBanco;  
        }
        //dd($data); // Confere os dados que estaram passando para o update

         $noticia->find($id)->update($data); // grava todos os conteudos automativo

            return redirect() // SE CHEGOU AQUI, DADOS ATUALIZADOS COM SUCESSO
            ->action("NoticiasController@index")
            ->with("toast_success", "Registro Editado Com Sucesso");
                
            
        } catch (\Illuminate\Database\QueryException $e) {
            dd($e);
            return redirect()
            ->action("NoticiasController@index")
            ->with("toast_error", "Houve um erro ao gravar o registro");
        }
    } 

    public function show(Noticias $noticia, $id)
    {
        $noticia = Noticias::find($id);
        $data = $noticia->data;
        $data_at = date('Y-m-d');
        $value = strtotime($data_at) - strtotime($data);
        $dias = floor($value / (60 * 60 * 24));
        //dd($data_at);
        return view("view_noticia", compact("noticia","id","dias"));
    }

    public function busca2( Request $request){
        $criterio  = $request->criterio;
        $noticias = Noticias::where('titulo', 'LIKE', '%'. $request->criterio .'%')->paginate(10);
        return view("noticias", compact("noticias", "criterio"));
    }
    public function busca3( Request $request){
        $data_inicio  = $request->data_inicio;
        $data_fim  = $request->data_fim;
        $criterio = "Publicação de: ".date('d-m-Y', strtotime($request->data_inicio))." até ". date('d-m-Y', strtotime($request->data_fim));
        $noticias = noticias::whereBetween( 'data' , [$request->data_inicio , $request->data_fim] )->paginate(10);
        return view("noticias", compact("noticias","criterio")); 
    }
    
}
