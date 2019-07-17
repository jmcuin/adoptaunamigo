<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RescatistaRequest;
use App\Http\Requests\AdopcionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Rescatista;
use App\Municipio;
use App\Estado;
use App\Solicitud;
use App\Adopcion;
use App\Amigo;
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
        $this -> middleware(['auth', 'roles:administrador,rescatista']);
    }
    
    public function index()
    {
        //
        $criterio = \Request::get('search'); //<-- we use global request to get the param of URI
        
        if(Auth::user() -> roles[0] -> rol_key == 'administrador'){
            $rescatistas = Rescatista::where('nombre', 'ilike', '%'.$criterio.'%')
                ->orwhere('a_paterno','ilike','%'.$criterio.'%')
                ->orwhere('a_materno','ilike','%'.$criterio.'%')
                ->orwhere('alias','ilike','%'.$criterio.'%')
                ->sortable()
                ->orderBy('id_rescatista')
                ->orderBy('nombre')
                ->paginate(10);
        }else{
            $rescatistas = Rescatista::where('id_rescatista', auth()->user()->id_rescatista)
                ->where('nombre', 'ilike', '%'.$criterio.'%')
                ->orwhere('a_paterno','ilike','%'.$criterio.'%')
                ->orwhere('a_materno','ilike','%'.$criterio.'%')
                ->orwhere('alias','ilike','%'.$criterio.'%')
                ->sortable()
                ->orderBy('id_rescatista')
                ->orderBy('nombre')
                ->paginate(10);
        }

        return view('Rescatista.index', compact('rescatistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::orderBy('id_estado') -> get();
        $municipios = Municipio::orderBy('id_estado_municipio') -> get();
        $roles = Rol::orderBy('id_rol') -> get();
        
        return view('Rescatista.create', compact('municipios', 'estados', 'roles'));
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

        try{
           $rescatista -> save();
           $guardado = true;
        }catch(Exception $e)
        {
           dd($e->getMessage());
        }
        

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
        $estados = Estado::orderBy('id_estado')->get();
        $municipios = Municipio::orderBy('id_estado_municipio')->get();
        $roles = Rol::orderBy('id_rol')->get();

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

        $this -> updateUserRole($id, $request -> id_rol);

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
        $rescatista = Rescatista::find(DB::table('rescatistas')->max('id_rescatista'));
        $user = new User;
        $user -> id_rescatista = $rescatista -> id_rescatista;
        $user -> name = $rescatista -> nombre.' '.$rescatista -> a_paterno.' '.$rescatista -> a_materno;
        $user -> email = $rescatista -> email;
        //$user -> password = bcrypt(substr($rescatista -> curp, 0, 6));
        $user -> password = bcrypt('123123');
        if($rescatista -> foto != null)
            $user -> photo = $rescatista -> foto;
        $user -> save();
        $user -> roles() -> attach($request -> id_rol);
    }

    public function updateUserRole($id, $id_rol)
    {
        $user = User::where('id_rescatista', '=', $id) -> first();
        $user -> roles() -> sync($id_rol);
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

    public function adopt($id)
    {
        //
        $ids = explode('-', $id);
        $amigo = Amigo::findOrFail($ids[0]);
        if($ids[1] != 0){
            $solicitud = Solicitud::findOrFail($ids[1]);
            return view('Rescatista.adopt', compact('amigo', 'solicitud'));
        }else{
            return view('Rescatista.adopt_blank', compact('amigo'));
        }
        
        
    }

    public function storeAdoption(AdopcionRequest $request)
    {
        //
        $adopciones = Adopcion::where('id_amigo', $request -> id_amigo) -> get();
        foreach ($adopciones as $adopcion) {
            $adopcion -> vigente = false;
            $adopcion -> save();
        }

        $amigo = Amigo::findOrFail($request -> id_amigo);
        $amigo -> solicita_adopcion = false;
        $amigo -> save();

        $fotos_evidencia = '';
        $archivos;
        $adopcion = new Adopcion;
        $adopcion -> id_amigo = $request -> id_amigo;
        if($request -> id_solicitud != 0)
            $adopcion -> id_solicitud = $request -> id_solicitud;
        $adopcion -> nombre_adoptante = $request -> nombre_adoptante;
        $adopcion -> direccion_adoptante = $request -> direccion_adoptante;
        $adopcion -> email = $request -> email;
        $adopcion -> telefono = $request -> telefono;
        $adopcion -> detalles_adopcion = $request -> detalles_adopcion;
        if(count($request -> evidencias) > 0){
            array_filter($request -> evidencias);
            $archivos = $request -> evidencias;
            for($i = 0; $i < count($request -> evidencias); $i++ ) {
                $fotos_evidencia = $fotos_evidencia.'&'.$request -> id_amigo.'_'.$i.'.'.$request -> evidencias[$i] -> extension();
                $request -> evidencias[$i] -> storeAs('public/evidencias', $request -> id_amigo.'_'.$i.'.'.$archivos[$i] -> extension());
            }
            $adopcion -> evidencias = $fotos_evidencia;
        }
                
        if($adopcion -> save())
            return redirect()->route('Solicitud.index')->with('info','Adopción registrada con éxito.');
        else
            return redirect()->route('Solicitud.index')->with('error','Imposible guardar Adopción.');
    }

    public function unadopt($id)
    {
        //
        $adopcion = Adopcion::findOrFail($id);
        return view('Rescatista.unadopt', compact('adopcion'));        
    }

    public function cancelAdoption(Request $request)
    {
        //
        $adopcion = Adopcion::findOrFail($request -> id_adopcion);
        $adopcion -> vigente = false;
        $adopcion -> detalles_anulacion = $request -> detalles_anulacion;
        $adopcion -> save();
    
        $amigo = Amigo::findOrFail($adopcion -> amigo -> id_amigo);
        $amigo -> solicita_adopcion = true;
        $amigo -> save();

        if($adopcion -> save())
            return redirect()->route('Solicitud.index')->with('info','Adopción anulada con éxito.');
        else
            return redirect()->route('Solicitud.index')->with('error','Imposible anular Adopción.');
    }
}