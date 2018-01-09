<?php

namespace App\Http\Controllers\Cotizacion;

use App\Cotizacion;
use App\Empleado;
use App\Http\Controllers\Controller;
use App\Personal;
use App\Producto;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cotizaciones = Cotizacion::sortable()->paginate(10);
        return view('cotizacion.index',['cotizaciones'=>$cotizaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Crea el objeto por primera vez y se le asigna un id a cotización
        $cotizacion = new Cotizacion;
        $cotizacion->save();
        $cotizacion->cotiza = $cotizacion->generarCustomID();
        $cotizacion->update();
        // dd($cotizacion);
        $vendedores = Empleado::get();
        $clientes = Personal::get();
        $productos = Producto::get();
        $edit = false;
        return view('cotizacion.create',['cotizacion'=>$cotizacion,'vendedores'=>$vendedores,'clientes'=>$clientes,'productos'=>$productos,'edit'=>$edit]);

    }

    public function autosave(Cotizacion $cotizacion, Request $request){
        // dd($request->cotiza);
        $cotizacion = Cotizacion::updateOrCreate(['cotiza'=>$request->cotiza],[
            'personal_id'=>$request->personal_id,
            'empleado_id'=>$request->empleado_id,
            'cotiza'=>$request->cotiza,
            'fecha'=>$request->fecha,
            'validez_cot'=>$request->validez_cot
            ]);
        $vendedores = Empleado::get();
        $clientes = Personal::get();
        $productos = Producto::get();
        $edit = false;
        return view('cotizacion.create',['cotizacion'=>$cotizacion,'vendedores'=>$vendedores,'clientes'=>$clientes,'productos'=>$productos,'edit'=>$edit]);
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
        // $cotizacion 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizacion $cotizacion)
    {
        //
    }
}
