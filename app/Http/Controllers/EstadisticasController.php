<?php

namespace App\Http\Controllers;

use App\Horario;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    //
    public function estadisticas(Request $request) {
        $any=$request->any;
        $mes=$request->setmana;

        $result=Horario::where('NidAnyo','>=',$any)->where('NidSemana','<=',33)->where('NidAsesor',auth()->user()->Nid_Asesor)->where(function($query){
            $query->where('TxtManyanaL', 'LIKE', "%GUARDIA%");
            $query->orWhere('TxtManyanaM', 'LIKE', "%GUARDIA%");
            $query->orWhere('TxtManyanaX', 'LIKE', "%GUARDIA%");
            $query->orWhere('TxtManyanaJ', 'LIKE', "%GUARDIA%");
            $query->orWhere('TxtManyanaV', 'LIKE', "%GUARDIA%");
            $query->orWhere('TxtManyanaS', 'LIKE', "%GUARDIA%");
            $query->orWhere('TxtManyanaD', 'LIKE', "%GUARDIA%");
            $query->orWhere('TxtTardeL', 'LIKE', "%GUARDIA%");
            $query->orWhere('TxtTardeM', 'LIKE', "%GUARDIA%");
            $query->orWhere('TxtTardeX', 'LIKE', "%GUARDIA%");
            $query->orWhere('TxtTardeJ', 'LIKE', "%GUARDIA%");
            $query->orWhere('TxtTardeV', 'LIKE', "%GUARDIA%");
            $query->orWhere('TxtTardeS', 'LIKE', "%GUARDIA%");
            $query->orWhere('TxtTardeD', 'LIKE', "%GUARDIA%");
        })->count();
        // $result2=Horario::where('NidAnyo','>=',$any)->where('NidSemana','<=',33)->where('NidAsesor',auth()->user()->Nid_Asesor)->count();

        // return($result);

        return($result);


    }
}
