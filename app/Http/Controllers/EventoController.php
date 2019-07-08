<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventoRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Amigo;
use App\Evento;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        /*$this -> middleware('auth', ['except' => ['checkScores']]);
        $this -> middleware('roles:dir_general,director,profesor', ['except' => ['checkScores']]);*/
    }

    public function index()
    {
        //
        $criterio = \Request::get('search'); //<-- we use global request to get the param of URI
                
        //$eventos = Evento::where('id_rescatista', '=', auth()->user()->id_rescatista)
        $eventos = Evento::where('nombre', 'ilike', '%'.$criterio.'%')
        ->sortable()
        ->orderBy('id_evento')
        ->orderBy('nombre')
        ->paginate(10);
        
        return view('Evento.index', compact('eventos'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //        
        return view('Evento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventoRequest $request)
    {
        //
        //dd($request);
        $evento = new Evento;
        $evento -> id_rescatista = 15;
        $evento -> nombre = $request -> nombre;
        $evento -> descripcion = $request -> descripcion;
        $evento -> lugar = $request -> lugar;
        $evento -> fecha = $request -> fecha;
        $evento -> hora = $request -> hora;
        $evento -> enlace_facebook = $request -> enlace_facebook;
        $evento -> email = $request -> email;
        $evento -> telefono = $request -> telefono;
        if($request -> hasFile('imagen')){
            $evento -> imagen = strtoupper($request -> nombre).'.'.$request -> file('imagen') -> extension();
            $request -> file('imagen') -> storeAs('public/eventos', strtoupper($request -> nombre).'.'.$request -> file('imagen') -> extension());
        }
        $evento -> donativos_alimento = $request -> donativos_alimento;
        $evento -> donativos_objetos = $request -> donativos_objetos;
        $evento -> donativos_juguetes = $request -> donativos_juguetes;
        $evento -> donativos_efectivo = $request -> donativos_efectivo;
        $evento -> donativos_paseos = $request -> donativos_paseos;
            
        $guardado = $evento -> save();

        if($guardado)
            return redirect()->route('Evento.index')->with('info','Evento creado con éxito.');
        else
            return redirect()->route('Evento.index')->with('error','Imposible guardar Evento.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::findOrFail($id);

        return view('Evento.show', compact('evento'));
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
        $evento = Evento::findOrFail($id);
        return view('Evento.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventoRequest $request, $id)
    {
        $evento = Evento::findOrFail($id);
        $evento -> id_rescatista = 15;
        $evento -> nombre = $request -> nombre;
        $evento -> descripcion = $request -> descripcion;
        $evento -> lugar = $request -> lugar;
        $evento -> fecha = $request -> fecha;
        $evento -> hora = $request -> hora;
        $evento -> enlace_facebook = $request -> enlace_facebook;
        $evento -> email = $request -> email;
        $evento -> telefono = $request -> telefono;
        if($request -> hasFile('imagen')){
            Storage::delete($evento -> imagen);
            $evento -> imagen = strtoupper($request -> nombre).'.'.$request -> file('imagen') -> extension();
            $request -> file('imagen') -> storeAs('public/eventos', strtoupper($request -> nombre).'.'.$request -> file('imagen') -> extension());
        }
        $evento -> donativos_alimento = $request -> donativos_alimento;
        $evento -> donativos_objetos = $request -> donativos_objetos;
        $evento -> donativos_juguetes = $request -> donativos_juguetes;
        $evento -> donativos_efectivo = $request -> donativos_efectivo;
        $evento -> donativos_paseos = $request -> donativos_paseos;
        
        $guardado = $evento -> save();

        if($guardado)
            return redirect()->route('Evento.index')->with('info','Evento actualizado con éxito.');
        else
            return redirect()->route('Evento.index')->with('error','Imposible guardar Evento.');
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

        $evento = Evento::findOrFail($id);
        Storage::delete($evento -> imagen);
        
        $destruido = Evento::destroy($id);

        if($destruido)
            return redirect()->route('Evento.index')->with('info','Evento eliminado con éxito.');
        else
            return redirect()->route('Evento.index')->with('error','Imposible borrar Evento.');
    }

    public function getSingle($id)
    {
        $evento = Evento::findOrFail($id);       
        return view('Evento.evento-single', compact('evento'));
    }
}
