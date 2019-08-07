<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SolicitudRequest;
use Illuminate\Support\Facades\Auth;
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
        //$this -> middleware(['auth', 'roles:administrador,rescatista']);
       // $this -> middleware('auth', ['except' => ['getSingle']]);
        $this -> middleware('auth');
        $this -> middleware('roles:administrador, rescatista');
    }
    
    public function index()
    {
        $criterio = \Request::get('search'); //<-- we use global request to get the param of URI  

        if(Auth::user() -> roles[0] -> rol_key == 'administrador'){
            $solicitudes = DB::table('solicitudes')
                    ->join('amigos', 'solicitudes.id_amigo', '=', 'amigos.id_amigo')
                    ->join('rescatistas', 'rescatistas.id_rescatista', '=', 'amigos.id_rescatista')
                    ->where('amigos.nombre','ilike', '%'.$criterio.'%')
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

        //dd($solicitudes);
        
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
    public function destroy($id)
    {
        //
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
