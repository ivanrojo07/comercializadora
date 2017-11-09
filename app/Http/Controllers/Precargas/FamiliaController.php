<?php

namespace App\Http\Controllers\Precargas;

use App\Familia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FamiliaController extends Controller
{
    public function __construct(){
        $this->titulo = 'familia';
        $this->agregar = 'familias.create';
        $this->guardar = 'familias.store';
        $this->editar ='familias.edit';
        $this->actualizar = 'familias.update';
        $this->borrar ='familias.destroy';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $familias = Familia::sortable()->paginate(10);
        return view('precargas.index',['precargas'=>$familias, 'agregar'=>$this->agregar, 'editar'=>$this->editar,'borrar'=>$this->borrar,'titulo'=>$this->titulo]);
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
        Familia::create($request->all());
        return redirect()->route('familias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function show(Familia $familia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function edit(Familia $familia)
    {
        //
        // $familia=$precarga;
        return view('precargas.edit',['precarga'=>$familia, 'titulo'=>$this->titulo,'actualizar'=>$this->actualizar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Familia $familia)
    {
        //
        $familia->update($request->all());
        return redirect()->route('familias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Familia $familia)
    {
        //
        $familia->delete();
        return redirect()->route('familias.index');
    }
}
