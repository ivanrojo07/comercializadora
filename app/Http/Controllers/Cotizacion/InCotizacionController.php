<?php

namespace App\Http\Controllers\Cotizacion;

use App\Cotizacion;
use App\Http\Controllers\Controller;
use App\InCotizacion;
use Illuminate\Http\Request;

class InCotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cotizacion $cotizacion)
    {
        //
        $productosincot = $cotizacion->productos;

        return view('cotizacion.productosencotizacion',['productoscotizados'=>$productosincot]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $productoencotizacion = new InCotizacion();
        $productoencotizacion->cotizacion_id = $request->cotizacion_id;
        $productoencotizacion->producto_id = $request->producto_id;
        $productoencotizacion->save();
        return redirect(
    "incotizacion/$productoencotizacion->cotizacion_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InCotizacion  $inCotizacion
     * @return \Illuminate\Http\Response
     */
    public function show(InCotizacion $inCotizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InCotizacion  $inCotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(InCotizacion $inCotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InCotizacion  $inCotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InCotizacion $inCotizacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InCotizacion  $inCotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(InCotizacion $inCotizacion)
    {
        //
    }
}
