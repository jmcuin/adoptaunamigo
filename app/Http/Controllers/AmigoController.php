<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AmigoRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Amigo;
use App\Municipio;
use App\Estado;
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

        $estados = Estado::orderBy('id_estado') -> paginate(50);
        $municipios = Municipio::orderBy('id_estado_municipio')->paginate(10);
                
        $amigos = Amigo::where('nombre', 'like', '%'.$criterio.'%')
        ->orwhere('id_alumno',$criterio)
        ->orwhere('a_paterno','like','%'.$criterio.'%')
        ->orwhere('a_materno','like','%'.$criterio.'%')
        ->orwhere('curp','like','%'.$criterio.'%')
        ->sortable()
        ->orderBy('id_alumno')
        ->orderBy('nombre')
        ->paginate(10);
        
        return view('Amigo.index', compact('alumnos', 'estados', 'municipios', 'religiones', 'areasdetrabajo'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $estados = Estado::orderBy('id_estado') -> paginate(50);
        $municipios = Municipio::orderBy('id_estado_municipio') -> paginate(50);
        
        return view('Amigo.create', compact('municipios', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request)
    {
        //
        $amigo = new Alumno;
        $amigo -> nombre = $request -> nombre;
        $amigo -> a_paterno = $request -> a_paterno;
        $amigo -> a_materno = $request -> a_materno;
        $amigo -> curp = strtoupper($request -> curp);
        $amigo -> id_estado_municipio = $request -> id_estado_municipio;
        $amigo -> extranjero = $request -> extranjero;
        $amigo -> calle = $request -> calle;
        $amigo -> numero_interior = $request -> numero_interior;
        $amigo -> numero_exterior = $request -> numero_exterior;
        $amigo -> colonia = $request -> colonia;
        $amigo -> cp = $request -> cp;
        $amigo -> telefono = $request -> telefono;
        $amigo -> email = $request -> email;
        $amigo -> id_religion = $request -> id_religion;
        $amigo -> tipo_sangre = $request -> tipo_sangre;
        if($request -> hasFile('foto')){
            $amigo -> foto = $request -> file('foto') -> storeAs('public/alumnos', strtoupper($request -> curp).'.'.$request -> file('foto') -> extension());
        }
        $guardado = $amigo -> save();

        $this -> addUser($request);

        if($guardado)
            return redirect()->route('Amigo.index')->with('info','Alumno creado con éxito.');
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

        return view('Amigo.show', compact('alumno', 'padres', 'padres_trabajadores', 'padecimiento', 'expediente'));
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
        $trabajadores = Trabajador::orderBy('nombre') -> paginate(50);
        $estados = Estado::orderBy('id_estado') -> paginate(50);
        $municipios = Municipio::orderBy('id_estado_municipio') -> paginate(50);
        $amigo = Amigo::findOrFail($id);

        return view('Amigo.edit', compact('alumno', 'trabajadores', 'estados', 'municipios', 'religiones', 'papa_externo', 'mama_externa', 'papa_trabajador', 'mama_trabajadora', 'padecimiento', 'expediente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnoRequest $request, $id)
    {
        $amigo = Amigo::findOrFail($id);
        $amigo -> nombre = $request -> nombre;
        $amigo -> a_paterno = $request -> a_paterno;
        $amigo -> a_materno = $request -> a_materno;
        $amigo -> curp = $request -> curp;
        $amigo -> id_estado_municipio = $request -> id_estado_municipio;
        $amigo -> extranjero = $request -> extranjero;
        $amigo -> calle = $request -> calle;
        $amigo -> numero_interior = $request -> numero_interior;
        $amigo -> numero_exterior = $request -> numero_exterior;
        $amigo -> colonia = $request -> colonia;
        $amigo -> cp = $request -> cp;
        $amigo -> telefono = $request -> telefono;
        $amigo -> email = $request -> email;
        $amigo -> id_religion = $request -> id_religion;
        $amigo -> tipo_sangre = $request -> tipo_sangre;
        if($request -> hasFile('foto')){
            Storage::delete($amigo -> foto);
            $amigo -> foto = $request -> file('foto') -> storeAs('public/alumnos', strtoupper($request -> curp).'.'.$request -> file('foto') -> extension());
        }
        $guardado = $amigo -> save();

        $this -> UpdateUser($request, $id);

        if($guardado)
            return redirect()->route('Amigo.index')->with('info','Alumno actualizado con éxito.');
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
        $amigo -> inscripciones() -> delete();
        Storage::delete($amigo -> foto);
        
        $destruido = Amigo::destroy($id);

        if($destruido)
            return redirect()->route('Amigo.index')->with('info','Alumno eliminado con éxito.');
        else
            return redirect()->route('Amigo.index')->with('error','Imposible borrar Amigo.');
    }

    public function addUser(Request $request){
        $user = new User;
        $amigo = Amigo::find(DB::table('alumnos')->max('id_alumno'));
        $user -> id_alumno = $amigo -> id_alumno;
        $user -> name = $request -> nombre.' '.$request -> a_paterno.' '.$request -> a_materno;
        $user -> email = $request -> email;
        $user -> password = bcrypt(substr($request -> curp, 0, 6));
        $user -> photo = $amigo -> foto;
        $user -> save();
        $user -> roles() -> attach('7');
        //$user -> roles() -> attach($request -> id_rol);
    }

    public function updateUser(Request $request, $id){
        $user = User::where('id_alumno', $id) -> first();
        $amigo = Amigo::findOrFail($id);
        $user -> name = $request -> nombre.' '.$request -> a_paterno.' '.$request -> a_materno;
        $user -> email = $request -> email;
        $user -> photo = $amigo -> foto;
        $user -> save();
        //$user -> roles() -> attach($request -> id_rol);
    }

}
