<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    private $user;
    
    public function __construct(user $user)
    {
        $this->user = $user;
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();

         $user->update($data); // grava todos os conteudos automativo
                return redirect('/user/profile') // SE CHEGOU AQUI, DADOS ATUALIZADOS COM SUCESSO
                ->with("toast_success", "Perfil Editado Com Sucesso");

            }
}
