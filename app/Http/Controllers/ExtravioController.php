<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExtravioRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Events\NuevoExtravio;
use App\Extravio;
use App\User;
Use Exception;
use DB;

class ExtravioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        //$this -> middleware('auth', ['except' => ['getSingle', 'storeSolicitud']]);
        //$this -> middleware('roles:administrador, rescatista', ['except' => ['checkScores']]);
    }

    //function __construct(){
        /*$this -> middleware('auth', ['except' => ['checkScores']]);
        $this -> middleware('roles:dir_general,director,profesor', ['except' => ['checkScores']]);*/
    //}

    public function index()
    {
        //
        $criterio = \Request::get('search'); //<-- we use global request to get the param of URI
                
        if(Auth::user() -> roles[0] -> rol_key == 'administrador'){
            $extravios = Extravio::where('nombre', 'ilike', '%'.$criterio.'%')
                ->sortable()
                ->orderBy('id_extravio')
                ->orderBy('nombre')
                ->paginate(10);
        }elseif(Auth::user() -> roles[0] -> rol_key == 'rescatista'){
            $extravios = Extravio::where('id_rescatista', auth()->user()->id_rescatista)
                ->where('nombre', 'ilike', '%'.$criterio.'%')
                ->sortable()
                ->orderBy('id_extravio')
                ->orderBy('nombre')
                ->paginate(10);
        }else{
            $extravios = Extravio::where('nombre', 'ilike', '%'.$criterio.'%')
                ->sortable()
                ->orderBy('id_extravio')
                ->orderBy('nombre')
                ->paginate(10);
        }
        
        return redirect()->route('inicio');
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Extravio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExtravioRequest $request)
    {
        //
        //dd($request);
        $nextId = DB::table('extravios')->max('id_extravio') + 1;
        $fotos_extravio = '';
        $archivos;
        $extravio = new Extravio;
        $extravio -> nombre = $request -> nombre;
        $extravio -> ultimo_avistamiento_fecha = $request -> ultimo_avistamiento_fecha;
        $extravio -> ultimo_avistamiento_lugar = $request -> ultimo_avistamiento_lugar;
        $extravio -> descripcion_amigo = $request -> descripcion_amigo;
        $extravio -> descripcion_evento = $request -> descripcion_evento;
        $extravio -> senias_particulares = $request -> senias_particulares;
        $extravio -> contacto_persona = $request -> contacto_persona;
        $extravio -> telefono = $request -> telefono;
        $extravio -> email = $request -> email;
        $extravio -> recompenza = $request -> recompenza;
        $extravio -> recompenza_monto = $request -> recompenza_monto;
        $extravio -> codigo_desactivacion = mt_rand(1000,9000);
        $extravio -> activo = true;
        array_filter($request -> fotos);
        $fotos = $request -> fotos;
        for($i = 0; $i < count($fotos); $i++ ) {
            $fotos_extravio = $fotos_extravio.'&'.'public/extravios/'.$nextId.'_'.strtoupper($request -> nombre).'_'.$i.'.'.$fotos[$i] -> extension();
            $request -> fotos[$i] -> storeAs('public/extravios',$nextId.'_'.strtoupper($request -> nombre).'_'.$i.'.'.$fotos[$i] -> extension(), 's3');
        }
        $extravio -> fotos = $fotos_extravio;
        
        try{
            $guardado = $extravio -> save();
        }catch(Exception $e)
        {
           dd($e->getMessage());
        }
        
        event(new NuevoExtravio($extravio, route('inicio')));

        if($guardado)
            return redirect()->route('inicio')->with('info','Extravio creado con éxito.');
        else
            return redirect()->route('inicio')->with('error','Imposible guardar Extravio.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $extravio = Extravio::findOrFail($id);

        return view('Extravio.show', compact('amigo'));
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
        $extravio = Extravio::findOrFail($id);

        return view('Extravio.edit', compact('extravio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExtravioRequest $request, $id)
    {
        $extravio = Extravio::findOrFail($id);
        $extravio -> nombre = $request -> nombre;
        $extravio -> ultimo_avistamiento_fecha = $request -> ultimo_avistamiento_fecha;
        $extravio -> ultimo_avistamiento_lugar = $request -> ultimo_avistamiento_lugar;
        $extravio -> descripcion = $request -> descripcion;
        $extravio -> senias_particulares = $request -> senias_particulares;
        $extravio -> contacto = $request -> contacto;
        $extravio -> recompenza = $request -> recompenza;
        if($request -> hasFile('foto')){
            //Storage::delete($extravio -> fotos);
            $extravio -> foto = strtoupper($request -> nombre).'.'.$request -> file('foto') -> extension();
            $request -> file('foto') -> storeAs('public/extravios', strtoupper($request -> nombre).'.'.$request -> file('foto') -> extension(), 's3');
        }
        $guardado = $extravio -> save();

        if($guardado)
            return redirect()->route('Extravio.index')->with('info','Extravio actualizado con éxito.');
        else
            return redirect()->route('Extravio.index')->with('error','Imposible guardar Extravio.');
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

        $extravio = Extravio::findOrFail($id);
        //Storage::delete($extravio -> foto);
        
        $destruido = Extravio::destroy($id);

        if($destruido)
            return redirect()->route('Extravio.index')->with('info','Extravio eliminado con éxito.');
        else
            return redirect()->route('Extravio.index')->with('error','Imposible borrar Extravio.');
    }

    public function getSingle($id)
    {
        $extravio = Extravio::findOrFail($id);   

        return view('Extravio.extravio-single', compact('extravio'));
    }

    public function deactivateSearch(Request $request)
    {
        //
        $desactivado = null;

        $extravio = Extravio::where('codigo_desactivacion', $request -> codigo) -> first();
        if($extravio){
            $extravio -> activo = false;
            $extravio -> conclusion = $request -> conclusion;
            $fotos = explode('&', $extravio -> fotos);
            /*array_filter($fotos);
            for($i = 0; $i < count($fotos); $i++ ) {
                Storage::delete($fotos[$i]);
            }*/
            $desactivado = $extravio -> save();
            return redirect() -> back() -> with('info','Gracias por desactivar la búsqueda. Esperamos que todo haya salido bien.');
        }else
            return redirect() -> back() -> with('error','Imposible desactivar la búsqueda. Verifique que el código de desactivación sea correcto.');
    }
}
