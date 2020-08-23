<?php

namespace App\Http\Controllers;

use App\Horario;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class EstadisticasController extends Controller
{
    //

    public function busca_paraula($paraula,$any,$setmana) {
        $asesor=auth()->user()->Nid_Asesor;
        if ($setmana>35) {
            $any++;
        }
        $result=Horario::where(function($query) use ($any,$asesor) {
            $query->where('NidAnyo','=', $any);
            $query->where('NidSemana','<=',35);
            $query->where('NidAsesor','=',$asesor);
        })->orWhere(function($query) use ($any,$asesor) {
            $query->where('NidAnyo','=', $any-1);
            $query->where('NidSemana','>',35);
            $query->where('NidAsesor','=',$asesor);
        })
            ->where('TxtManyanaL', 'LIKE', "%".$paraula."%")->
            where('TxtManyanaM', 'LIKE', "%".$paraula."%")->
            where('TxtManyanaX', 'LIKE', "%".$paraula."%")->
            where('TxtManyanaJ', 'LIKE', "%".$paraula."%")->
            where('TxtManyanaV', 'LIKE', "%".$paraula."%")->
            where('TxtManyanaS', 'LIKE', "%".$paraula."%")->
            where('TxtManyanaD', 'LIKE', "%".$paraula."%")->
            where('TxtTardeL', 'LIKE', "%".$paraula."%")->
            where('TxtTardeM', 'LIKE', "%".$paraula."%")->
            where('TxtTardeX', 'LIKE', "%".$paraula."%")->
            where('TxtTardeJ', 'LIKE', "%".$paraula."%")->
            where('TxtTardeV', 'LIKE', "%".$paraula."%")->
            where('TxtTardeS', 'LIKE', "%".$paraula."%")->
            where('TxtTardeD', 'LIKE', "%".$paraula."%")->get();

        $result_arr=$result->toArray();
        $conta=0;

        foreach ($result_arr as $key => $value2) {
            foreach ($value2 as $key2 => $value) {
                # code...
                if (is_string($value) && strpos($value,"".$paraula."") !== false) {
                    $conta=$conta+1;
                }
            }
        }
        return $conta;

    }



    public function estadisticas(Request $request) {
        $any=$request->any;
        $setmana=$request->setmana;
        $conta_guardia= $this->busca_paraula('GUARDIA',$any,$setmana);
        $conta_curs=$this->busca_paraula('CURS',$any,$setmana);
        $conta_visita=$this->busca_paraula('VISITA',$any,$setmana);
        $conta_compensa=$this->busca_paraula('COMPENSA',$any,$setmana);
        $conta_cefire=$this->busca_paraula('CEFIRE',$any,$setmana);
        $conta_permis=$this->busca_paraula('PERMÍS',$any,$setmana);

        $torna=array(
            'guardia' => $conta_guardia,
            'curs' => $conta_curs,
            'visita' => $conta_visita,
            'compensa' => $conta_compensa,
            'cefire' => $conta_cefire,
            'permis' => $conta_permis
        );
        return($torna);
    }
}
