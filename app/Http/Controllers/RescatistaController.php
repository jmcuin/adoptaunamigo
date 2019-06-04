<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RescatistaRequest;
use Illuminate\Support\Facades\Storage;
use App\Rescatista;
use App\Municipio;
use App\Estado;
use App\Solicitud;
use App\Rol;
use App\User;
use DB;

class RescatistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        //$this -> middleware(['auth', 'roles:dir_general,director']);
    }
    
    public function index()
    {
        //
        $criterio = \Request::get('search'); //<-- we use global request to get the param of URI
        
        $rescatistas = Rescatista::where('nombre', 'ilike', '%'.$criterio.'%')
        ->orwhere('a_paterno','ilike','%'.$criterio.'%')
        ->orwhere('a_materno','ilike','%'.$criterio.'%')
        ->orwhere('alias','ilike','%'.$criterio.'%')
        ->sortable()
        ->orderBy('id_rescatista')
        ->orderBy('nombre')
        ->paginate(10);

        return view('Rescatista.index', compact('rescatistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::orderBy('id_estado') -> paginate(50);
        $municipios = Municipio::orderBy('id_estado_municipio') -> paginate(50);
        $roles = Rol::orderBy('id_rol') -> paginate(50);
        
        return view('Rescatista.create', compact('municipios', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RescatistaRequest $request)
    {
        $rescatista = new Rescatista;
        $rescatista -> nombre = $request -> nombre;
        $rescatista -> a_paterno = $request -> a_paterno;
        $rescatista -> a_materno = $request -> a_materno;
        $rescatista -> alias = $request -> alias;
        $rescatista -> id_estado_municipio = $request -> id_estado_municipio;
        $rescatista -> extranjero = $request -> extranjero;
        $rescatista -> calle = $request -> calle;
        $rescatista -> numero_interior = $request -> numero_interior;
        $rescatista -> numero_exterior = $request -> numero_exterior;
        $rescatista -> colonia = $request -> colonia;
        $rescatista -> cp = $request -> cp;
        $rescatista -> telefono = $request -> telefono;
        $rescatista -> email = $request -> email;
        $rescatista -> es_asociacion = $request -> es_asociacion;
        $rescatista -> redes_sociales = $request -> redes_sociales;
        $rescatista -> historia = $request -> historia;

        if($request -> hasFile('foto')){
            $rescatista -> foto = $request -> file('foto') -> storeAs('public/rescatistas', strtoupper($request -> alias).'.'.$request -> file('foto') -> extension());
        }
        $guardado = $rescatista -> save();

        $this -> addUser($request);
        
        if($guardado)
            return redirect()->route('Rescatista.index')->with('info','Rescatista creado con éxito.');
        else
            return redirect()->route('Rescatista.index')->with('error','Imposible guardar Rescatista.');
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
        $rescatista = Rescatista::findOrFail($id);
        
        return view('Rescatista.show', compact('rescatista'));
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
        $municipios = Municipio::orderBy('id_estado_municipio')->paginate(50);
        $roles = Rol::orderBy('id_rol')->paginate(50);

        $rescatista = Rescatista::findOrFail($id);
        
        return view('Rescatista.edit', compact('rescatista', 'estados', 'municipios', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RescatistaRequest $request, $id)
    {
        //
        $rescatista = Rescatista::findOrFail($id);
        $rescatista -> nombre = $request -> nombre;
        $rescatista -> a_paterno = $request -> a_paterno;
        $rescatista -> a_materno = $request -> a_materno;
        $rescatista -> alias = $request -> alias;
        $rescatista -> id_estado_municipio = $request -> id_estado_municipio;
        $rescatista -> extranjero = $request -> extranjero;
        $rescatista -> calle = $request -> calle;
        $rescatista -> numero_interior = $request -> numero_interior;
        $rescatista -> numero_exterior = $request -> numero_exterior;
        $rescatista -> colonia = $request -> colonia;
        $rescatista -> cp = $request -> cp;
        $rescatista -> telefono = $request -> telefono;
        $rescatista -> email = $request -> email;
        $rescatista -> es_asociacion = $request -> es_asociacion;
        $rescatista -> redes_sociales = $request -> redes_sociales;
        $rescatista -> historia = $request -> historia;
        
        if($request -> hasFile('foto')){
            Storage::delete($rescatista -> foto);
            $rescatista -> foto = $request -> file('foto') -> storeAs('public/rescatistas', strtoupper($request -> alias).'.'.$request -> file('foto') -> extension());
        }
        $guardado = $rescatista -> save();

        if($guardado)
            return redirect()->route('Rescatista.index')->with('info','Rescatista actualizado con éxito.');
        else
            return redirect()->route('Rescatista.index')->with('error','Imposible guardar Rescatista.');
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
        $rescatista = Rescatista::findOrFail($id);
        Storage::delete($rescatista -> foto);

        $destruido = Rescatista::destroy($id);
        if($destruido)
            return redirect()->route('Rescatista.index')->with('info','Rescatista eliminado con éxito.');
        else
            return redirect()->route('Rescatista.index')->with('error','Imposible borrar Rescatista.');
    }

    public function addUser(Request $request){
        $user = new User;
        $rescatista = Rescatista::find(DB::table('rescatistas')->max('id_rescatista'));
        $user -> id_rescatista = $rescatista -> id_rescatista;
        $user -> name = $rescatista -> nombre.' '.$rescatista -> a_paterno.' '.$rescatista -> a_materno;
        $user -> email = $rescatista -> email;
        //$user -> password = bcrypt(substr($rescatista -> curp, 0, 6));
        $user -> password = bcrypt('123123');
        $user -> photo = $rescatista -> foto;
        $user -> save();
        $user -> roles() -> attach(2);
        //$user -> roles() -> attach($request -> id_rol);
    }

    public function comment($id)
    {
        //
        return view('Rescatista.comment', compact('id'));
    }

    public function storeComment(Request $request)
    {
        
        $solicitud = Solicitud::findOrFail($request -> id_solicitud);
        $comentarios = $request -> comentario.'&'.$solicitud -> comentarios_rescatista;
        $solicitud -> comentarios_rescatista = $comentarios;
          
        if($solicitud -> save())
            return redirect()->route('Solicitud.index')->with('info','Comentario registrado con éxito.');
        else
            return redirect()->route('Solicitud.index')->with('error','Imposible guardar Comentario.');       
    }
}