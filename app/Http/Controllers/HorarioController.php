<?php

namespace App\Http\Controllers;

use App\Horario;
use App\Asesores;
use App\Mail\EnviarGuardia;
use App\Mail\EliminarGuardia;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DateTime;

class HorarioController extends Controller
{

    //protected $primaryKey = array('NidAsesor', 'NidSemana','NidAnyo');
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        //$horario=Horario::where('NidAsesor', auth()->user()->Nid_Asesor)->where('NidSemana',41)->where('NidAnyo',2019)->get();
        return Horario::where('NidAsesor', auth()->user()->Nid_Asesor)->where('NidSemana',41)->where('NidAnyo',2019)->get();

        // if($request->ajax()){
        //     return Horario::where('NidAsesor', auth()->user()->Nid_Asesor)->where('NidSemana',41)->where('NidAnyo',2019)->get();
        // }else{
        //     return view('home');
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
            $horario=new Horario();
            $horario->NidAsesor=auth()->user()->Nid_Asesor;
            $horario->NidSemana=$request->NidSemana;
            $horario->NidAnyo=$request->NidAnyo;
            $horario->TxtManyanaL =$request->TxtManyanaL ;
            $horario->TxtTardeL =$request->TxtTardeL ;
            $horario->TxtManyanaM =$request->TxtManyanaM ;
            $horario->TxtTardeM =$request->TxtTardeM ;
            $horario->TxtManyanaX =$request->TxtManyanaX ;
            $horario->TxtTardeX =$request->TxtTardeX ;
            $horario->TxtManyanaJ =$request->TxtManyanaJ ;
            $horario->TxtTardeJ=$request->TxtTardeJ;
            $horario->TxtManyanaV=$request->TxtManyanaV;
            $horario->TxtTardeV=$request->TxtTardeV;
            $horario->TxtManyanaS=$request->TxtManyanaS;
            $horario->TxtTardeS=$request->TxtTardeS;
            $horario->TxtManyanaD=$request->TxtManyanaD;
            $horario->TxtTardeD=$request->TxtTardeD;
            $horario->TxtObservaciones=$request->TxtObservaciones;
            $horario->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if($request->ajax()){
            $aux=Horario::where('NidAsesor', auth()->user()->Nid_Asesor)->get();
            foreach ($aux as $value) {
                if ($value['NidSemana']==$id) {
                    return $value;
                }
            }
        }else{
            return view('home');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {        //
        //
        $horario=Horario::where('NidAsesor', auth()->user()->Nid_Asesor)->where('NidSemana',$request->NidSemana)->where('NidAnyo',$request->NidAnyo)->first();
        if ($horario) {
        }else{
            $horario=new Horario();
            $horario->NidAsesor=auth()->user()->Nid_Asesor;
            $horario->NidSemana=$request->NidSemana;
            $horario->NidAnyo=$request->NidAnyo;
        }
        $horario->TxtManyanaL=$request->TxtManyanaL;
        $horario->TxtTardeL=$request->TxtTardeL;
        $horario->TxtManyanaM =$request->TxtManyanaM;
        $horario->TxtTardeM =$request->TxtTardeM;
        $horario->TxtManyanaX =$request->TxtManyanaX;
        $horario->TxtTardeX =$request->TxtTardeX;
        $horario->TxtManyanaJ =$request->TxtManyanaJ;
        $horario->TxtTardeJ=$request->TxtTardeJ;
        $horario->TxtManyanaV=$request->TxtManyanaV;
        $horario->TxtTardeV=$request->TxtTardeV;
        $horario->TxtManyanaS=$request->TxtManyanaS;
        $horario->TxtTardeS=$request->TxtTardeS;
        $horario->TxtManyanaD=$request->TxtManyanaD;
        $horario->TxtTardeD=$request->TxtTardeD;
        $horario->TxtObservaciones=$request->TxtObservaciones;
        $horario->save();
        return back()->with('mensaje', 'Nota editada!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function convertir ($a){
        if (is_null($a)) {
            return "";
       } else {
            return $a;
       }
    }

    public function getStartAndEndDate($week, $year, $camp) {
        $dto = new DateTime();
        $week_start = $dto->setISODate($year, $week)->format('Ymd');
        switch (substr($camp,-1)) {
            case 'L':
                $week_end = $week_start;
                break;
            case 'M':
                $week_end = $dto->modify('+1 days')->format('Ymd');
                break;
            case 'X':
                $week_end = $dto->modify('+2 days')->format('Ymd');
                break;
            case 'J':
                $week_end = $dto->modify('+3 days')->format('Ymd');
                break;
            case 'V':
                $week_end = $dto->modify('+4 days')->format('Ymd');
                break;
            case 'S':
                $week_end = $dto->modify('+5 days')->format('Ymd');
                break;
            case 'D':
                $week_end = $dto->modify('+6 days')->format('Ymd');
                break;
            default:
                # code...
                break;
        }


        return $week_end;
      }


    public function afg_guardia(Request $request){
        $horario=Horario::where('NidAsesor', $request->Assessor)->where('NidSemana',$request->setmana)->where('NidAnyo', $request->anyo)->first();
        //Comprovem que no hi ha altra guardia en eixe dia i li enviem un correu per a que ho sàpiga

        $mati_vesprada=substr($request->camp,3,-1);
        $fecha_GUARDIA =$this->getStartAndEndDate($request->setmana,$request->anyo,$request->camp);

        if ($mati_vesprada=="Manyana") {
            $hora_start="090000";
            $hora_end="140000";
            $txt_rato="pel Matí";
        } else {
            $hora_start=160000;
            $hora_end=200000;
            $txt_rato="per la Vesprada";
        }




        $horario2=Horario::where('NidSemana',$request->setmana)->where('NidAnyo', $request->anyo)->where($request->camp, 'LIKE', "%GUARDIA%")->first();


            if($horario2) {
                $val2 = $horario2->{$request->camp};
                $val2 = str_replace("GUARDIA","",$val2);
                //echo $val;
                $horario2->{$request->camp}=$val2;
                $horario2->save();
                $usuario2=User::where('Nid_Asesor', $horario2->NidAsesor)->first();
                $link2="https://calendar.google.com/calendar/render?action=TEMPLATE&text=GUARDIA+CEFIRE+ELIMINADA&dates=".$fecha_GUARDIA."T".$hora_start."/".$fecha_GUARDIA."T".$hora_end."&details=Guardia+del+Cefire+de+Valencia+eliminada&location=Valencia&trp=false#eventpage_6";

                $datos2 = [
                    'nombre' => $usuario2->name,
                    'fecha' => date("d/m/Y", strtotime($fecha_GUARDIA)),
                    'rato' => $txt_rato,
                    'link' => $link2
                ];




                Mail::to($usuario2->email)->send(new EliminarGuardia($datos2));
            }


        // if ($horario2 === null) {
        //     $horario2=new Horario();
        //     $horario2->NidAsesor=auth()->user()->Nid_Asesor;
        //     $horario2->NidSemana=$request->setmana;
        //     $horario2->NidAnyo=$request->anyo;
        //     // $horario2->TxtManyanaL ="";
        //     // $horario2->TxtTardeL ="";
        //     // $horario2->TxtManyanaM ="";
        //     // $horario2->TxtTardeM ="";
        //     // $horario2->TxtManyanaX ="";
        //     // $horario2->TxtTardeX ="";
        //     // $horario2->TxtManyanaJ ="";
        //     // $horario2->TxtTardeJ="";
        //     // $horario2->TxtManyanaV="";
        //     // $horario2->TxtTardeV="";
        //     // $horario2->TxtManyanaS="";
        //     // $horario2->TxtTardeS="";
        //     // $horario2->TxtManyanaD="";
        //     // $horario2->TxtTardeD="";
        //     // $horario2->TxtObservaciones="";
        //     $horario2->save();
        //     $usuario2=User::where('Nid_Asesor', $horario2->NidAsesor)->first();
        // } else



        //var_dump($horario2->toArray());
        // Si no està creat el camp el creem
        if ($horario) {
        }else{
            $horario=new Horario();
            $horario->NidAsesor=$request->Assessor;
            $horario->NidSemana=$request->setmana;
            $horario->NidAnyo=$request->anyo;
            $horario->TxtManyanaL ="";
            $horario->TxtTardeL ="";
            $horario->TxtManyanaM ="";
            $horario->TxtTardeM ="";
            $horario->TxtManyanaX ="";
            $horario->TxtTardeX ="";
            $horario->TxtManyanaJ ="";
            $horario->TxtTardeJ="";
            $horario->TxtManyanaV="";
            $horario->TxtTardeV="";
            $horario->TxtManyanaS="";
            $horario->TxtTardeS="";
            $horario->TxtManyanaD="";
            $horario->TxtTardeD="";
            $horario->TxtObservaciones="";
        }







        $val = $horario->{$request->camp};
        //echo $val;
        $horario->{$request->camp}="GUARDIA ".$val;

        $horario->save();
        // return back()->with('mensaje', 'Guardia guardada!');



        $usuario=User::where('Nid_Asesor', $request->Assessor)->first();
        //var_dump($usuario->email);





        $link="https://calendar.google.com/calendar/render?action=TEMPLATE&text=GUARDIA+CEFIRE&dates=".$fecha_GUARDIA."T".$hora_start."/".$fecha_GUARDIA."T".$hora_end."&details=Guardia+del+Cefire+de+Valencia&location=Valencia&trp=false#eventpage_6";

        $datos = [
            'nombre' => $usuario->name,
            'fecha' => date("d/m/Y", strtotime($fecha_GUARDIA)),
            'rato' => $txt_rato,
            'link' => $link
        ];

        Mail::to($usuario->email)->send(new EnviarGuardia($datos));






        //return view('notas.detalle', compact('nota'));
    }








    public function get_hora_anyo(Request $request,$semana2,$anyo2){
        $horario=Horario::where('NidAsesor', auth()->user()->Nid_Asesor)->where('NidSemana',$semana2)->where('NidAnyo',$anyo2)->get();

        // $nota = App\Nota::find($id);
        //Aquí valida si existe sino redirije al 404
        //$nota = App\Nota::findOrFail($id);
        //$horario=Horario::where('NidAsesor', $nidasesor2)->where('NidSemana',$semana2)->where('NidAnyo',$anyo2)->get();
        //return $horario;
        //$aux[]=$horario->toArray();

        //var_dump($aux);

        // foreach ($aux[0][0] as $key => $value) {
        //     if (is_null($value)) {
        //          $aux[0][0][$key] = "";
        //     }
        // }

        //var_dump($horario[0]->NidSemana);
        if (!$horario->isEmpty()){
            return response()->json([
                [
                'TxtManyanaL' => $this->convertir($horario[0]->TxtManyanaL),
                'TxtTardeL' => $this->convertir($horario[0]->TxtTardeL),
                'TxtManyanaM' => $this->convertir($horario[0]->TxtManyanaM),
                'TxtTardeM' => $this->convertir($horario[0]->TxtTardeM),
                'TxtManyanaX' => $this->convertir($horario[0]->TxtManyanaX),
                'TxtTardeX' => $this->convertir($horario[0]->TxtTardeX),
                'TxtManyanaJ' => $this->convertir($horario[0]->TxtManyanaJ),
                'TxtTardeJ' => $this->convertir($horario[0]->TxtTardeJ),
                'TxtManyanaV' => $this->convertir($horario[0]->TxtManyanaV),
                'TxtTardeV' => $this->convertir($horario[0]->TxtTardeV),
                'TxtManyanaS' => $this->convertir($horario[0]->TxtManyanaS),
                'TxtTardeS' => $this->convertir($horario[0]->TxtTardeS),
                'TxtManyanaD' => $this->convertir($horario[0]->TxtManyanaD),
                'TxtTardeD' => $this->convertir($horario[0]->TxtTardeD),
                'NidAnyo' => $this->convertir($horario[0]->NidAnyo),
                'NidSemana' => $this->convertir($horario[0]->NidSemana),
                'TxtObservaciones' => $this->convertir($horario[0]->TxtObservaciones)]
            ]);
        } else {
            return response()->json([
                [
                'TxtManyanaL' => '',
                'TxtTardeL' => '',
                'TxtManyanaM' => '',
                'TxtTardeM' => '',
                'TxtManyanaX' => '',
                'TxtTardeX' => '',
                'TxtManyanaJ' => '',
                'TxtTardeJ' => '',
                'TxtManyanaV' => '',
                'TxtTardeV' => '',
                'TxtManyanaS' => '',
                'TxtTardeS' => '',
                'TxtManyanaD' => '',
                'TxtTardeD' => '',
                'NidAnyo' => 0,
                'NidSemana' => 0,
                'TxtObservaciones' => '']
            ]);
        }
        //return view('notas.detalle', compact('nota'));
    }





    public function get_todas_guardias(Request $request,$semana2,$anyo2){
        //$horario = Horario::where('NidSemana',$semana2)->where('NidAnyo',$anyo2)->get();

                // ->where('loans.maturity_date', '<', date("Y-m-d"))
        $seleccio=array('TxtManyanaL',
        'TxtTardeL',
        'TxtManyanaM',
        'TxtTardeM',
        'TxtManyanaX',
        'TxtTardeX',
        'TxtManyanaJ',
        'TxtTardeJ',
        'TxtManyanaV',
        'TxtTardeV',
        'TxtManyanaS',
        'TxtTardeS',
        'TxtManyanaD',
        'TxtTardeD',
        'name',
        'users.Nid_Asesor');

        $horario = Horario::where('NidSemana',$semana2)->where('NidAnyo',$anyo2)->join('users', 'users.Nid_Asesor', '=', 'horarios.NidAsesor')->select($seleccio)->get();


        $horario_arr=$horario->toArray();
        for ($i=0; $i < sizeof($horario_arr); $i++) {
            foreach ($horario_arr[$i] as $key => $value) {
                if ($value === null){
                    $horario_arr[$i][$key]="";
                }
            }
        }


        // if (!$horario->isEmpty()){
        //     return response()->json([
        //         [
        //         'TxtManyanaL' => $this->convertir($horario[0]->TxtManyanaL),
        //         'TxtTardeL' => $this->convertir($horario[0]->TxtTardeL),
        //         'TxtManyanaM' => $this->convertir($horario[0]->TxtManyanaM),
        //         'TxtTardeM' => $this->convertir($horario[0]->TxtTardeM),
        //         'TxtManyanaX' => $this->convertir($horario[0]->TxtManyanaX),
        //         'TxtTardeX' => $this->convertir($horario[0]->TxtTardeX),
        //         'TxtManyanaJ' => $this->convertir($horario[0]->TxtManyanaJ),
        //         'TxtTardeJ' => $this->convertir($horario[0]->TxtTardeJ),
        //         'TxtManyanaV' => $this->convertir($horario[0]->TxtManyanaV),
        //         'TxtTardeV' => $this->convertir($horario[0]->TxtTardeV),
        //         'TxtManyanaS' => $this->convertir($horario[0]->TxtManyanaS),
        //         'TxtTardeS' => $this->convertir($horario[0]->TxtTardeS),
        //         'TxtManyanaD' => $this->convertir($horario[0]->TxtManyanaD),
        //         'TxtTardeD' => $this->convertir($horario[0]->TxtTardeD),
        //         'NidAnyo' => $this->convertir($horario[0]->NidAnyo),
        //         'NidSemana' => $this->convertir($horario[0]->NidSemana),
        //         'TxtObservaciones' => $this->convertir($horario[0]->TxtObservaciones)]
        //     ]);
        // } else {
        //     return response()->json([
        //         [
        //         'TxtManyanaL' => '',
        //         'TxtTardeL' => '',
        //         'TxtManyanaM' => '',
        //         'TxtTardeM' => '',
        //         'TxtManyanaX' => '',
        //         'TxtTardeX' => '',
        //         'TxtManyanaJ' => '',
        //         'TxtTardeJ' => '',
        //         'TxtManyanaV' => '',
        //         'TxtTardeV' => '',
        //         'TxtManyanaS' => '',
        //         'TxtTardeS' => '',
        //         'TxtManyanaD' => '',
        //         'TxtTardeD' => '',
        //         'NidAnyo' => 0,
        //         'NidSemana' => 0,
        //         'TxtObservaciones' => '']
        //     ]);
        // }









        return $horario_arr;

        // if($request->ajax()){
        //     return $horario;
        // }
        //return view('notas.detalle', compact('nota'));
    }
    public function afegirguardies(Request $request)
    {
        //
        return view('afegirguardies');
    }

    public function guardar_arxiu(Request $request)
    {
        //

        $file = $request->file('arxiu');
        //var_dump($file);
        $destinationPath = 'uploads';
        $nom_arxiu=str_replace(' ', '', auth()->user()->name.'_'.$request->dia.'_'.$request->setmana.'_'.$request->any.'.'.$file->extension());
        $file->move($destinationPath,$nom_arxiu);
        return $nom_arxiu;
    }


}
