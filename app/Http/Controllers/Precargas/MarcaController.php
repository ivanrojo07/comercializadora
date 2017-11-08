<?php

namespace App\Http\Controllers\Precargas;

use App\Marca;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarcaController extends Controller
{
    public function __construct(){
        $this->titulo = 'marca';
        $this->agregar = 'marcas.create';
        $this->guardar = 'marcas.store';
        $this->editar ='marcas.edit';
        $this->actualizar = 'marcas.update';
        $this->borrar ='marcas.destroy';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $marcas = Marca::sortable()->paginate(10);
        return view('precargas.index',['precargas'=>$marcas, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo]);
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
        Marca::create($request->all());
        return redirect()->route('marcas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marca  $Marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        //
        return view('precargas.edit',['precarga'=>$marca, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        //
        $marca->update($request->all());
        return redirect()->route('marcas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $Marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        //
        $marca->delete();
        return redirect()->route('marcas.index');
    }
}
