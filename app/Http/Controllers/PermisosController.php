<?php

namespace App\Http\Controllers;
use App\Permisos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PermisosController extends Controller

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
    public function index()
    {
        //
        return Permisos::where('Nid_Asesor', auth()->user()->Nid_Asesor)->get();
    }

    public function torna_tots()
    {
        //
        return Permisos::get();
    }

    public function torna_concret(Request $request)
    {
        //
        return Permisos::where('Nid_Asesor', $request->id)->get();
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
        $permiso = new Permisos;
        $permiso->document = $request->document;
        $permiso->data = $request->data;
        $permiso->Nid_Asesor = auth()->user()->Nid_Asesor;


        $permiso->save();

        return back()->with('mensaje', 'Document afegit agregada');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $file = $request->file;
        $id = $request->id;
        $destinationPath = 'uploads/';
        File::delete($destinationPath.$file);
        $dat = Permisos::find($id);
        $dat->delete();
        return back()->with('mensaje', 'Borrado!');
    }
}
