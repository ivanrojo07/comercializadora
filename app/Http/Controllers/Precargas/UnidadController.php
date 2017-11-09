<?php

namespace App\Http\Controllers\Precargas;

use App\Unidad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnidadController extends Controller
{
    public function __construct(){
        $this->titulo = 'unidad';
        $this->agregar = 'unidad.create';
        $this->guardar = 'unidad.store';
        $this->editar ='unidad.edit';
        $this->actualizar = 'unidad.update';
        $this->borrar ='unidad.destroy';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $unidades = Unidad::sortable()->paginate(10);
        return view('precargas.index',['precargas'=>$unidades, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('precargas.create',['titulo'=>$this->titulo,'guardar'=>$this->guardar]);
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
        Unidad::create($request->all());
        return redirect()->route('unidad.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function show(Unidad $unidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidad $unidad)
    {
        //
        return view('precargas.edit',['precarga'=>$unidad, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidad $unidad)
    {
        //
        $unidad->update($request->all());
        return redirect()->route('unidad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidad $unidad)
    {
        //
        $unidad->delete();
        return redirect()->route('unidad.index');
    }
}
