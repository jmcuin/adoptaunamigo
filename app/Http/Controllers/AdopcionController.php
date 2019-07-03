<?php

namespace App\Http\Controllers;

use App\Adopcion;
use Illuminate\Http\Request;
use App\Http\Requests\AdopcionRequest;
use DB;

class AdopcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $criterio = \Request::get('search'); //<-- we use global request to get the param of URI
                
        $adopciones = DB::table('adopciones')
                    ->join('amigos', function ($join) {
                        $join->on('amigos.id_amigo', '=', 'adopciones.id_amigo')
                             ->where('amigos.id_rescatista', '=', auth()->user()->id_rescatista);
                    })
                    ->where('adopciones.nombre_adoptante', 'ilike', '%'.$criterio.'%')
                    ->orwhere('adopciones.email', 'ilike', '%'.$criterio.'%')
                    ->orwhere('adopciones.telefono', 'ilike', '%'.$criterio.'%')
                    ->orwhere('adopciones.id_amigo', '=', $criterio)
                    ->orwhere('adopciones.id_solicitud', '=', $criterio)
                    ->orderBy('adopciones.vigente', 'DESC')
                    ->orderBy('adopciones.nombre_adoptante')
                    ->select('adopciones.*', 'amigos.*')
                    ->groupBy('adopciones.id_adopcion')
                    ->groupBy('amigos.id_amigo')
                    ->paginate(10);
        
        return view('Adopcion.index', compact('adopciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Adopcion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdopcionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Adopcion  $adopcion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $adopcion = Adopcion::findOrFail($id);
        
        return view('Adopcion.show', compact('adopcion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adopcion  $adopcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Adopcion $adopcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adopcion  $adopcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adopcion $adopcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adopcion  $adopcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adopcion $adopcion)
    {
        //
    }
}
