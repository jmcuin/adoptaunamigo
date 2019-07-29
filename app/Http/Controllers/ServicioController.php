<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServicioRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Servicio;
use App\Rescatista;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        //$this -> middleware(['auth', 'roles:administrador,rescatista']);
        $this -> middleware('auth', ['except' => ['getSingle']]);
    }
    //function __construct(){
        /*$this -> middleware('auth', ['except' => ['checkScores']]);
        $this -> middleware('roles:dir_general,director,profesor', ['except' => ['checkScores']]);*/
    //}

    public function index()
    {
        //
        $criterio = \Request::get('search'); //<-- we use global request to get the param of URI
                
        $servicios = Servicio::where('id_rescatista', '=', auth()->user()->id_rescatista)
        ->where('servicio', 'ilike', '%'.$criterio.'%')
        ->where('telefono', 'ilike', '%'.$criterio.'%')
        ->where('email', 'ilike', '%'.$criterio.'%')
        ->sortable()
        ->orderBy('id_servicio')
        ->orderBy('servicio')
        ->paginate(10);
        
        return view('Servicio.index', compact('servicios'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //        
        $rescatista = Rescatista::findOrFail(auth()->user()->id_rescatista);
        
        return view('Servicio.create', compact('rescatista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicioRequest $request)
    {
        //
        $servicio = new Servicio;
        $servicio -> id_rescatista = auth()->user()->id_rescatista;
        $servicio -> servicio = $request -> servicio;
        $servicio -> precio = $request -> precio;
        $servicio -> descripcion = $request -> descripcion;
        $servicio -> terminos_y_condiciones = $request -> terminos_y_condiciones;
        $servicio -> enlace_facebook = $request -> enlace_facebook;
        $servicio -> email = $request -> email;
        $servicio -> telefono = $request -> telefono;
        if($request -> hasFile('foto')){
            $servicio -> foto = 'public/servicios/'.auth()->user()->id_rescatista.'_'.strtoupper($request -> servicio).'.'.$request -> file('foto') -> extension();
            $request -> file('foto') -> storeAs('public/servicios', auth()->user()->id_rescatista.'_'.strtoupper($request -> servicio).'.'.$request -> file('foto') -> extension());
        }
            
        $guardado = $servicio -> save();

        if($guardado)
            return redirect()->route('Servicio.index')->with('info','Servicio creado con éxito.');
        else
            return redirect()->route('Servicio.index')->with('error','Imposible guardar Servicio.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicio = Servicio::findOrFail($id);

        return view('Servicio.show', compact('servicio'));
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
        $servicio = Servicio::findOrFail($id);

        return view('Servicio.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServicioRequest $request, $id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio -> id_rescatista = auth()->user()->id_rescatista;
        $servicio -> servicio = $request -> servicio;
        $servicio -> precio = $request -> precio;
        $servicio -> descripcion = $request -> descripcion;
        $servicio -> terminos_y_condiciones = $request -> terminos_y_condiciones;
        $servicio -> enlace_facebook = $request -> enlace_facebook;
        $servicio -> email = $request -> email;
        $servicio -> telefono = $request -> telefono;
        if($request -> hasFile('foto')){
            Storage::delete($servicio -> foto);
            $servicio -> foto = 'public/servicios/'.auth()->user()->id_rescatista.'_'.strtoupper($request -> servicio).'.'.$request -> file('foto') -> extension();
            $request -> file('foto') -> storeAs('public/servicios', auth()->user()->id_rescatista.'_'.strtoupper($request -> servicio).'.'.$request -> file('foto') -> extension());
        }
        
        $guardado = $servicio -> save();

        if($guardado)
            return redirect()->route('Servicio.index')->with('info','Servicio actualizado con éxito.');
        else
            return redirect()->route('Servicio.index')->with('error','Imposible guardar Servicio.');
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

        $servicio = Servicio::findOrFail($id);
        Storage::delete($servicio -> foto);
        
        $destruido = Servicio::destroy($id);

        if($destruido)
            return redirect()->route('Servicio.index')->with('info','Servicio eliminado con éxito.');
        else
            return redirect()->route('Servicio.index')->with('error','Imposible borrar Servicio.');
    }

    public function getSingle($id)
    {
        $servicio = Servicio::findOrFail($id);       
        return view('Servicio.servicio-single', compact('servicio'));
    }
}
