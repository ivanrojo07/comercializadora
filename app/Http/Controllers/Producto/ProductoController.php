<?php

namespace App\Http\Controllers\Producto;

use App\Acabado;
use App\Calidad;
use App\Familia;
use App\Http\Controllers\Controller;
use App\Marca;
use App\Presentacion;
use App\Producto;
use App\Subtipo;
use App\Tipo;
use App\Unidad;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Producto::sortable()->paginate(10);

        return view('productos.index',['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $marcas = Marca::get();
        $familias = Familia::get();
        $tipos = Tipo::get();
        $subtipos = Subtipo::get();
        $unidades = Unidad::get();
        $presentaciones = Presentacion::get();
        $calidades = Calidad::get();
        $acabados = Acabado::get();
        return view('productos.create',['marcas'=>$marcas,'familias'=>$familias,'tipos'=>$tipos,'subtipos'=>$subtipos,'unidades'=>$unidades,'presentaciones'=>$presentaciones,'calidades'=>$calidades,'acabados'=>$acabados]);
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
        // $producto = Producto::where('identificador',$request->identificador);
        // if (count($producto) != 0) {
        //     # code...
        //     return redirect()->back()->with('errors','El ID del Producto ya existe');
        // } else {
        //     # code...
        

            $producto = new Producto();
            $producto->identificador = $request->marca+strtoupper($request->clave);
            dd($product);
            Producto::create($request->all());
            return redirect()->route('productos.index');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
        return view('productos.view',['producto'=>$producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
        return view('productos.edit',['producto'=>$producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->all());
        return redirect()->route('productos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
