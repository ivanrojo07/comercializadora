<?php

namespace App\Http\Controllers\Precargas;

use App\Acabado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcabadoController extends Controller
{
    public function __construct(){
        $this->titulo = 'acabado';
        $this->agregar = 'acabados.create';
        $this->guardar = 'acabados.store';
        $this->editar ='acabados.edit';
        $this->actualizar = 'acabados.update';
        $this->borrar ='acabados.destroy';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $acabados = Acabado::sortable()->paginate(10);
        return view('precargas.index',['precargas'=>$acabados, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo]);
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
        Acabado::create($request->all());
        return redirect()->route('acabados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Acabado  $acabado
     * @return \Illuminate\Http\Response
     */
    public function show(Acabado $acabado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acabado  $acabado
     * @return \Illuminate\Http\Response
     */
    public function edit(Acabado $acabado)
    {
        //
        return view('precargas.edit',['precarga'=>$acabado, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acabado  $acabado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acabado $acabado)
    {
        //
        $acabado->update($request->all());
        return redirect()->route('acabados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acabado  $acabado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acabado $acabado)
    {
        //
        $acabado->delete();
        return redirect()->route('acabados.index');
    }
}
