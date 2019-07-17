<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SolicitudRequest;
use App\Solicitud;
use App\Amigo;
use \PDF;
use DB;

class SolicitudController extends Controller
{
    //
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
        $criterio = \Request::get('search'); //<-- we use global request to get the param of URI  

        if(Auth::user() -> roles[0] -> rol_key == 'administrador'){
            $solicitudes = DB::table('solicitudes')
                    ->join('amigos', 'solicitudes.id_amigo', '=', 'amigos.id_amigo')
                    ->join('rescatistas', function ($join) {
                        $join->on('rescatistas.id_rescatista', '=', 'amigos.id_rescatista');
                    })
                    ->orwhere('amigos.nombre','ilike', '%'.$criterio.'%')
                    ->orwhere('solicitudes.nombre_solicitante','ilike', '%'.$criterio.'%')
                    ->orwhere('solicitudes.email','ilike', '%'.$criterio.'%')
                    ->select('solicitudes.*', 'amigos.*')
                    ->groupBy('solicitudes.id_solicitud')
                    ->groupBy('amigos.id_amigo')
                    ->paginate(10);
        }else{
            $solicitudes = DB::table('solicitudes')
                    ->join('amigos', 'solicitudes.id_amigo', '=', 'amigos.id_amigo')
                    ->join('rescatistas', function ($join) {
                        $join->on('rescatistas.id_rescatista', '=', 'amigos.id_rescatista')
                         ->where('rescatistas.id_rescatista', '=',auth()->user()->id_rescatista);
                    })
                    ->orwhere('amigos.nombre','ilike', '%'.$criterio.'%')
                    ->orwhere('solicitudes.nombre_solicitante','ilike', '%'.$criterio.'%')
                    ->orwhere('solicitudes.email','ilike', '%'.$criterio.'%')
                    ->select('solicitudes.*', 'amigos.*')
                    ->groupBy('solicitudes.id_solicitud')
                    ->groupBy('amigos.id_amigo')
                    ->paginate(10);
        }
        
        return view('Solicitud.index',compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Inscripcion.create');
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
        $solicitud = Solicitud::findOrFail($id);
        
        return view('Solicitud.show', compact('solicitud'));
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
        $inscripcion = Inscripcion::findOrFail($id);
        return view('Inscripcion.edit', compact('Inscripcion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InscripcionRequest $request, $id)
    {
        //
        $inscripcion = Inscripcion::findOrFail($id);
        $inscripcion -> Inscripcion = $request -> Inscripcion;
        $inscripcion -> capacidad = $request -> capacidad;
        $guardado = $inscripcion -> save();
        if($guardado)
            return redirect()->route('Inscripcion.index')->with('info','Inscripcion actualizado con éxito.');
        else
            return redirect()->route('Inscripcion.index')->with('error','Imposible actualizar Inscripcion.');
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
        $destruido = Inscripcion::destroy($id);
        if($destruido)
            return redirect()->route('Inscripcion.index')->with('info','Inscripcion eliminado con éxito.');
        else
            return redirect()->route('Inscripcion.index')->with('error','Imposible borrar Inscripcion.');
    }

    public function attend($id)
    {
        //
        $atendida = "atendida";
        $solicitud = Solicitud::findOrFail($id);
        if($solicitud -> atendida == false){
            $solicitud -> atendida = true;
        }else{
            $solicitud -> atendida = false;
            $atendida = "reactivada";
        }

        if($solicitud -> save())
            return redirect()->route('Solicitud.index')->with('info','Solicitud '.$atendida.' con éxito.');
        else
            return redirect()->route('Solicitud.index')->with('error','Imposible modificar Solicitud.');
    }
}
