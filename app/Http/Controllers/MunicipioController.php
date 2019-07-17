<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MunicipioRequest;
use App\Municipio;
use App\Estado;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        $this -> middleware(['auth', 'roles:administrador']);
    }
    
    public function index()
    {
        //
        $criterio = \Request::get('search'); //<-- we use global request to get the param of URI
        $estados = Estado::orderBy('id_estado')->paginate(10);
        $municipios = Municipio::where('municipio', 'ilike', '%'.$criterio.'%')
        ->sortable()
        ->orderBy('id_estado')
        ->orderBy('id_municipio')
        ->paginate(10);
        return view('Municipio.index',compact('municipios','estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $estados = Estado::orderBy('id_estado')->paginate(50);
        return view('Municipio.create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MunicipioRequest $request)
    {
        //
        $total = Municipio::where('id_estado', $request -> id_estado)->count();
        $municipio = new Municipio;
        $municipio -> id_estado = $request -> id_estado;
        $municipio -> id_municipio = $total + 1;
        $municipio -> municipio = $request -> municipio;
        $guardado = $municipio -> save();
        if($guardado)
            return redirect()->route('Municipio.index')->with('info','Municipio creado con éxito.');
        else
            return redirect()->route('Municipio.index')->with('error','Imposible guardar Municipio.');
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
        $municipio = Municipio::findOrFail($id);
        return view('Municipio.show', compact('municipio'));
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
        $estados = Estado::orderBy('id_estado')->paginate(50);
        $municipio = Municipio::findOrFail($id);
        return view('Municipio.edit', compact('municipio','estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MunicipioRequest $request, $id)
    {
        //
        $total = Municipio::where('id_estado', $request -> id_estado)->count();
        $municipio = Municipio::findOrFail($id);
        $municipio -> id_estado = $request -> id_estado;
        $municipio -> id_municipio = $total + 1;
        $municipio -> municipio = $request -> municipio;
        $guardado = $municipio -> save();
        if($guardado)
            return redirect()->route('Municipio.index')->with('info','Municipio actualizado con éxito.');
        else
            return redirect()->route('Municipio.index')->with('error','Imposible actualizar Municipio.');
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
        $municipio = Municipio::findOrFail($id);
        $municipio -> trabajadores() -> delete();
        $destruido = Municipio::destroy($id);
        if($destruido)
            return redirect()->route('Municipio.index')->with('info','Municipio eliminado con éxito.');
        else
            return redirect()->route('Municipio.index')->with('error','Imposible borrar Municipio.');
    }
}
