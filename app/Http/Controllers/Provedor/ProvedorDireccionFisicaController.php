<?php

namespace App\Http\Controllers\Provedor;

use App\DireccionFisica;
use App\Http\Controllers\Controller;
use App\Provedor;
use Illuminate\Http\Request;

class ProvedorDireccionFisicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Provedor $provedor)
    {
        //
        $direccion = $provedor->direccionFisicaProvedor;
        if ($direccion ==null) {
            # code...
            return redirect()->route('provedores.direccionfisicaProvedor.create',['provedor'=>$provedor]);
        }
        else{
            return view('direccionprovedores.view',['direccion'=>$direccion,'provedor'=>$provedor]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Provedor $provedor)
    {
        //
        return view('direccionprovedores.create',['personal'=>$provedor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Provedor $provedor)
    {
        //
        // dd($request->all());
        $direccion = DireccionFisica::create($request->all());
        return redirect()->route('provedores.contacto.index',['personal'=>$provedor]);
        // return view('d}ireccion.view',['direccion'=>$direccion,'personal'=>$cliente]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Provedor $provedor)
    {
        //
        $direccion = $provedor->direccionFisicaProvedor;
        return view('direccionprovedores.view',['direccion'=>$direccion,'provedor'=>$provedor]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Provedor $provedor)
    {
        //
        $direccion = $provedor->direccionFisicaProvedor;
        return view('direccionprovedores.edit',['provedor'=>$provedor, 'direccion'=>$direccion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $provedor, DireccionFisicaProvedor $direccionFisicaProvedor )
    {
        //
        // dd($DireccionFiscal);
        $provedor->direccionFisicaProvedor->update($request->all());
        return redirect()->route('provedores.direccionfisica.index',['provedor'=>$provedor]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provedor $provedor)
    {
        //
    }
    public function prueba(){
        return view('direccionprovedores.view');
    }
}
