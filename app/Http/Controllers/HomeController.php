<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function confirmRegister($confirm_token){
        $clientes=User::all();
        foreach ($clientes as $cliente) {
            if (strcmp(md5($cliente->id), $confirm_token) == 0) {
                User::where('id', $cliente->id)
                ->update(['activo' => 1]);
                break;              
            }   
        }
        return redirect('/login')->with('confirmation', '¡Su cuenta ha sido verificada!, ahora puede iniciar sesión.');
    }
}
