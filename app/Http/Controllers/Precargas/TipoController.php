<?php

namespace App\Http\Controllers\Precargas;

use App\Tipo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TipoController extends Controller
{
    public function __construct(){
        $this->titulo = 'tipo';
        $this->agregar = 'tipos.create';
        $this->guardar = 'tipos.store';
        $this->editar ='tipos.edit';
        $this->actualizar = 'tipos.update';
        $this->borrar ='tipos.destroy';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos = Tipo::sortable()->paginate(10);
        return view('precargas.index',['precargas'=>$tipos,'agregar'=>$this->agregar,'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo]);
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
        Tipo::create($request->all());
        return redirect()->route('tipos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo $tipo)
    {
        //
        return view('precargas.edit',['precarga'=>$tipo, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipo $tipo)
    {
        //
        $tipo->update($request->all());
        return redirect()->route('tipos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
        //
        $tipo->delete();
        return redirect()->route('tipos.index');
    }
}