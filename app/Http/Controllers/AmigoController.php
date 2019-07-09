<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AmigoRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Events\NuevaSolicitud;
use App\Amigo;
use App\Especie;
use App\Raza;
use App\Rescatista;
use App\Solicitud;
use App\User;
use DB;

class AmigoController extends Controller
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
                
        $amigos = Amigo::where('id_rescatista', auth()->user()->id_rescatista)
        ->where('nombre', 'ilike', '%'.$criterio.'%')
        ->sortable()
        ->orderBy('id_amigo')
        ->orderBy('nombre')
        ->paginate(10);
        
        return view('Amigo.index', compact('amigos'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $especies = Especie::orderBy('especie') -> get();
        $razas = Raza::orderBy('raza') -> get();
        
        return view('Amigo.create', compact('especies', 'razas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmigoRequest $request)
    {
        //
        //dd($request);
        $fotos_amigo = '';
        $archivos;
        $amigo = new Amigo;
        $amigo -> id_rescatista = auth()->user()->id_rescatista;
        $amigo -> nombre = $request -> nombre;
        $amigo -> edad = $request -> edad;
        $amigo -> id_raza = $request -> id_raza;
        $amigo -> tamanio = $request -> tamanio;
        $amigo -> caracter = $request -> caracter;
        $amigo -> convivencia = $request -> convivencia;
        $amigo -> recomendaciones = $request -> recomendaciones;
        $amigo -> requisitos = $request -> requisitos;
        $amigo -> lugar_adopcion = $request -> lugar_adopcion;
        $amigo -> historia = $request -> historia;
        $amigo -> enlace_video = $request -> enlace_video;
        $amigo -> id_especie = $request -> id_especie;
        $amigo -> solicita_adopcion = $request -> solicita_adopcion;
        $amigo -> solicita_esterilizacion = $request -> solicita_esterilizacion;
        $amigo -> solicita_hogar_temporal = $request -> solicita_hogar_temporal;
        $amigo -> solicita_ayuda_medica = $request -> solicita_ayuda_medica;
        $amigo -> solicita_ayuda_alimenticia = $request -> solicita_ayuda_alimenticia;
        array_filter($request -> fotos);
        $archivos = $request -> fotos;
        for($i = 0; $i < count($request -> fotos); $i++ ) {
            $fotos_amigo = $fotos_amigo.'&'.auth()->user()->id_rescatista.'_'.strtoupper($request -> nombre).'_'.$i.'.'.$request -> fotos[$i] -> extension();
            $request -> fotos[$i] -> storeAs('public/amigos', auth()->user()->id_rescatista.'_'.strtoupper($request -> nombre).'_'.$i.'.'.$archivos[$i] -> extension());
        }
        $amigo -> fotos = $fotos_amigo;
        $guardado = $amigo -> save();

        if($guardado)
            return redirect()->route('Amigo.index')->with('info','Amigo creado con éxito.');
        else
            return redirect()->route('Amigo.index')->with('error','Imposible guardar Amigo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $amigo = Amigo::findOrFail($id);

        return view('Amigo.show', compact('amigo'));
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
        $especies = Especie::orderBy('especie') -> get();
        $razas = Raza::orderBy('raza') -> get();
        $amigo = Amigo::findOrFail($id);

        return view('Amigo.edit', compact('amigo', 'razas', 'especies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AmigoRequest $request, $id)
    {
        $amigo = Amigo::findOrFail($id);
        $amigo -> nombre = $request -> nombre;
        $amigo -> edad = $request -> edad;
        $amigo -> id_raza = $request -> id_raza;
        $amigo -> tamanio = $request -> tamanio;
        $amigo -> caracter = $request -> caracter;
        $amigo -> convivencia = $request -> convivencia;
        $amigo -> recomendaciones = $request -> recomendaciones;
        $amigo -> requisitos = $request -> requisitos;
        $amigo -> lugar_adopcion = $request -> lugar_adopcion;
        $amigo -> historia = $request -> historia;
        $amigo -> enlace_video = $request -> enlace_video;
        $amigo -> id_especie = $request -> id_especie;
        $amigo -> solicita_adopcion = $request -> solicita_adopcion;
        $amigo -> solicita_esterilizacion = $request -> solicita_esterilizacion;
        $amigo -> solicita_hogar_temporal = $request -> solicita_hogar_temporal;
        $amigo -> solicita_ayuda_medica = $request -> solicita_ayuda_medica;
        $amigo -> solicita_ayuda_alimenticia = $request -> solicita_ayuda_alimenticia;
        if($request -> hasFile('fotos')){
            Storage::delete($amigo -> fotos);
            $amigo -> fotos = strtoupper($request -> nombre).'.'.$request -> file('fotos') -> extension();
            $request -> file('fotos') -> storeAs('public/amigos', strtoupper($request -> nombre).'.'.$request -> file('fotos') -> extension());
        }
        $guardado = $amigo -> save();

        if($guardado)
            return redirect()->route('Amigo.index')->with('info','Amigo actualizado con éxito.');
        else
            return redirect()->route('Amigo.index')->with('error','Imposible guardar Amigo.');
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

        $amigo = Amigo::findOrFail($id);
        Storage::delete($amigo -> foto);
        
        $destruido = Amigo::destroy($id);

        if($destruido)
            return redirect()->route('Amigo.index')->with('info','Amigo eliminado con éxito.');
        else
            return redirect()->route('Amigo.index')->with('error','Imposible borrar Amigo.');
    }

    public function getSingle($id)
    {
        $amigo = Amigo::findOrFail($id);       
        return view('Amigo.amigo-single', compact('amigo'));
    }

    public function storeSolicitud(Request $request)
    {
        $amigo = Amigo::findOrFail($request -> id_amigo);  

        $solicitud = new Solicitud;
        $solicitud -> id_amigo = $request -> id_amigo;
        $solicitud -> nombre_solicitante = $request -> nombre;
        $solicitud -> email = $request -> email;
        $solicitud -> telefono = $request -> telefono;
        $solicitud -> edad = $request -> edad;
        $solicitud -> mensaje = $request -> mensaje;
        $solicitud -> save();

        event(new NuevaSolicitud($amigo, $solicitud));

        /*Mail::send('emails.notificacion', ['solicitud' => $solicitud, 'amigo' => $amigo], function($s) use ($solicitud, $amigo){
            $s -> to($solicitud -> email, $solicitud -> nombre_solicitante) -> subject('Gracias por adoptar a '.$amigo -> nombre);
        });

        Mail::send('emails.solicitud', ['solicitud' => $solicitud, 'amigo' => $amigo], function($s) use ($solicitud, $amigo){
            $s -> to($amigo -> rescatista -> email, $amigo -> rescatista -> nombre) -> subject('Alguien quiere adoptar a '.$amigo -> nombre);
        }); */

        return redirect() -> route('amigo-single', $request -> id_amigo) -> with('info','¡¡Gracias por adoptar!! El rescatista de '.$amigo -> nombre.' se pondrá en contacto contigo a la brevedad posible.');
    }
}
