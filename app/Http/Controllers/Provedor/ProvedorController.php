<?php

namespace App\Http\Controllers\Provedor;

use App\Provedor;
use UxWeb\SweetAlert\SweetAlert as Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProvedorController extends Controller{
 // use Alert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $provedor = Provedor::sortable()->paginate(10);
        // Alert::message('Robots are working!');
        return view('provedores.index', ['provedor'=>$provedor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('provedores.create');
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
        $personal = Provedor::where('rfc',$request->rfc)->get();
        // dd(count($personal));
        if (count($personal) != 0) {
            # code...
            // alert()->error('Error Message', 'Optional Title');
            // return redirect()->route('clientes.create');
            return redirect()->back()->with('errors', 'El RFC ya existe');
        } else {
            # code...
            $provedor = Provedor::create($request->all());
            Alert::success("Proveedor creado con exito, sigue agregando información")->persistent("Cerrar");
            return redirect()->route('provedores.direccionfisica.create',['provedor'=>$provedor]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function show(Provedor $provedor)
    {
        
        return view('provedores.view',['provedor'=>$provedor]);
=======
    public function show(Provedor $provedore)
    {
        
        return view('provedores.view',['personal'=>$provedore]);
>>>>>>> cdd3f4ad578541315573d33a7bd1093409eb2026
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
        return view('provedores.edit',['provedor'=>$provedor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $provedor)
    {
        //
        $provedor->update($request->all());
        Alert::success('Proveedor actualizado')->persistent("Cerrar");
        return redirect()->route('provedores.index');
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
    public function buscar(Request $request){
    // dd($request);
    $query = $request->input('busqueda');
    $wordsquery = explode(' ',$query);
    $provedor = Provedor::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
            $q->orWhere('nombre','LIKE',"%$word%")
                ->orWhere('apellidopaterno','LIKE',"%$word%")
                ->orWhere('apellidomaterno','LIKE',"%$word%")
                ->orWhere('razonsocial','LIKE',"%$word%");
                // ->orWhere('rfc','LIKE',"%$word%");
                // ->orWhere('alias','LIKE',"%$word%");
                // ->orWhere('tipopersona','LIKE',"%$word%")
            }
        })->get();
    return view('provedores.busqueda', ['provedor'=>$provedor]);
        

    }


}