<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datos(Request $request)
    {
        //

        //$horario=Horario::where('NidAsesor', auth()->user()->Nid_Asesor)->where('NidSemana',41)->where('NidAnyo',2019)->get();
            return User::where('Nid_Asesor', auth()->user()->Nid_Asesor)->get();

        // if($request->ajax()){
        //     return Horario::where('NidAsesor', auth()->user()->Nid_Asesor)->where('NidSemana',41)->where('NidAnyo',2019)->get();
        // }else{
        //     return view('home');
        // }
    }
    public function update(Request $request)
    {
        //

        $request->user()->fill(array(
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'email' => $request->email
        ))->save();

        return "Dades actualitzades";
        // if($request->ajax()){
        //     return Horario::where('NidAsesor', auth()->user()->Nid_Asesor)->where('NidSemana',41)->where('NidAnyo',2019)->get();
        // }else{
        //     return view('home');
        // }
    }

    public function assesors_tots()
    {
        //

        return User::all();
        // if($request->ajax()){
        //     return Horario::where('NidAsesor', auth()->user()->Nid_Asesor)->where('NidSemana',41)->where('NidAnyo',2019)->get();
        // }else{
        //     return view('home');
        // }
    }

}
