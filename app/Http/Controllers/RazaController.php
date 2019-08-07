<?php

namespace App\Http\Controllers;

use App\Raza;
use Illuminate\Http\Request;
use App\Http\Requests\RazaRequest;

class RazaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        //$this -> middleware(['auth', 'roles:administrador']);
        $this -> middleware('auth');
        $this -> middleware('roles:administrador, rescatista');
    }

    public function index()
    {
        $criterio = \Request::get('search'); //<-- we use global request to get the param of URI

        $razas = Raza::where('raza', 'ilike', '%'.$criterio.'%')
        ->sortable()
        ->orderBy('id_raza')
        ->paginate(10);
        
        return view('Raza.index', compact('razas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Raza.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RazaRequest $request)
    {
        //
        $raza = new Raza;
        $raza -> raza = $request -> raza;
        $guardado = $raza -> save();
        if($guardado)
            return redirect()->route('Raza.index')->with('info','Raza creada con éxito.');
        else
            return redirect()->route('Raza.index')->with('error','Imposible guardar Raza.');
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
        $raza = Raza::findOrFail($id);
        return view('Raza.show', compact('raza'));
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
        $raza = Raza::findOrFail($id);
        return view('Raza.edit', compact('raza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RazaRequest $request, $id)
    {
        //
        $raza = Raza::findOrFail($id);
        $raza -> raza = $request -> raza;
        $guardado = $raza -> save();
        if($guardado)
            return redirect()->route('Raza.index')->with('info','Raza actualizada con éxito.');
        else
            return redirect()->route('Raza.index')->with('error','Imposible actualizar Raza.');
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
        $destruido = Raza::destroy($id);

        if($destruido)
            return redirect()->route('Raza.index')->with('info','Raza eliminada con éxito.');
        else
            return redirect()->route('Raza.index')->with('error','Imposible borrar Raza.');
    }
}