<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mandado;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*
    *
    * @brief
    * @author Gustavo Ramirez Yahuaca
    * @param string
    * @return
    *
    */
    public function home(){
        // if(auth()->user()->perfil==1){
        //     $hoyDesde = date('Y-m-d') . ' 00:00:00';
        //     $hoyHasta = date('Y-m-d') . ' 23:59:59';
        //     $admins = User::where('perfil',1)->count();
        //     $conductores = User::where('perfil',2)->count();
        //     $clientes = User::where('perfil',3)->count();
        //     $mandados = Mandado::whereBetween('fecha_solicitud',[$hoyDesde,$hoyHasta])->count();
        //     $comisiones = Mandado::whereBetween('fecha_solicitud',[$hoyDesde,$hoyHasta])->sum('comision');
        //     $arrVars = ['admins','conductores','clientes','mandados','comisiones'];
        //     return view('home.admin',compact($arrVars));
        // }
        // if(auth()->user()->perfil==2){
        //     return view('home.conductores');
        // }
        // if(auth()->user()->perfil==3){
        //     return view('home.clientes');
        // }

        return view('home');


    }
}
