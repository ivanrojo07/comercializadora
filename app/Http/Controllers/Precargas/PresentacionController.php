<?php

namespace App\Http\Controllers\Precargas;

use App\Presentacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PresentacionController extends Controller
{
    public function __construct(){
        $this->titulo = 'presentación';
        $this->agregar = 'presentacions.create';
        $this->guardar = 'presentacions.store';
        $this->editar ='presentacions.edit';
        $this->actualizar = 'presentacions.update';
        $this->borrar ='presentacions.destroy';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $presentaciones = Presentacion::sortable()->paginate(10);
        return view('precargas.index',['precargas'=>$presentaciones, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo]);
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
        Presentacion::create($request->all());
        return redirect()->route('presentacions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function show(Presentacion $presentacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Presentacion $presentacion)
    {
        //
        return view('precargas.edit',['precarga'=>$presentacion, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presentacion $presentacion)
    {
        //
        $presentacion->update($request->all());
        return redirect()->route('presentacions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presentacion  $presentacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presentacion $presentacion)
    {
        //
        $presentacion->delete();
        return redirect()->route('presentacions.index');
    }
}
