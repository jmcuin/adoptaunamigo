<?php

namespace App\Http\Controllers;

use App\Especie;
use Illuminate\Http\Request;
use App\Http\Requests\EspecieRequest;

class EspecieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    function __construct(){
        /*$this -> middleware(['auth', 'roles:administrador']);
        $this -> middleware('roles:administrador, rescatista');*/
    }

    /*function __construct(){
        $this -> middleware('auth', ['except' => ['checkScores']]);
        $this -> middleware('roles:dir_general,director,profesor', ['except' => ['checkScores']]);
    }*/

    public function index()
    {
        //
        $criterio = \Request::get('search'); //<-- we use global request to get the param of URI
                
        $especies = Especie::where('especie', 'ilike', '%'.$criterio.'%')
        ->sortable()
        ->orderBy('id_especie')
        ->orderBy('especie')
        ->paginate(10);
        
        return view('Especie.index', compact('especies'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //        
        return view('Especie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecieRequest $request)
    {
        //
        //dd($request);
        $especie = new Especie;
        $especie -> especie = $request -> especie;
            
        $guardado = $especie -> save();

        if($guardado)
            return redirect()->route('Especie.index')->with('info','Especie creada con éxito.');
        else
            return redirect()->route('Especie.index')->with('error','Imposible guardar Especie.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especie = Especie::findOrFail($id);

        return view('Especie.show', compact('especie'));
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
        $especie = Especie::findOrFail($id);

        return view('Especie.edit', compact('especie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EspecieRequest $request, $id)
    {
        $especie = Especie::findOrFail($id);
        $especie -> especie = $request -> especie;

        $guardado = $especie -> save();

        if($guardado)
            return redirect()->route('Especie.index')->with('info','Especie actualizada con éxito.');
        else
            return redirect()->route('Especie.index')->with('error','Imposible guardar Especie.');
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
        $destruido = null;
              
        $destruido = Especie::destroy($id);

        if($destruido)
            return redirect()->route('Evento.index')->with('info','Especie eliminada con éxito.');
        else
            return redirect()->route('Evento.index')->with('error','Imposible borrar Especie.');
    }
}
