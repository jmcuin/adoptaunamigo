<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EstadoRequest;
use App\Estado;
use App\Http\Requests;
use Yajra\Datatables\Datatables;

class EstadoController extends Controller
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
        $criterio = \Request::get('search'); //<-- we use global request to get the param of URI

        $estados = Estado::where('estado', 'ilike', '%'.$criterio.'%')
        ->sortable()
        ->orderBy('id_estado')
        ->paginate(10);
        
        return view('Estado.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Estado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoRequest $request)
    {
        //
        $estado = new Estado;
        $estado -> estado = $request -> estado;
        $guardado = $estado -> save();
        if($guardado)
            return redirect()->route('Estado.index')->with('info','Estado creado con éxito.');
        else
            return redirect()->route('Estado.index')->with('error','Imposible guardar Estado.');
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
        $estado = Estado::findOrFail($id);
        return view('Estado.show', compact('estado'));
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
        $estado = Estado::findOrFail($id);
        return view('Estado.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstadoRequest $request, $id)
    {
        //
        $estado = Estado::findOrFail($id);
        $estado -> estado = $request -> estado;
        $guardado = $estado -> save();
        if($guardado)
            return redirect()->route('Estado.index')->with('info','Estado actualizado con éxito.');
        else
            return redirect()->route('Estado.index')->with('error','Imposible actualizar Estado.');
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
        $estado = Estado::findOrFail($id);
        $estado -> municipios() -> delete(); 
        $destruido = Estado::destroy($id);

        if($destruido)
            return redirect()->route('Estado.index')->with('info','Estado eliminado con éxito.');
        else
            return redirect()->route('Estado.index')->with('error','Imposible borrar Estado.');
    }
}
