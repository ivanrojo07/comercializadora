<?php

namespace App\Http\Controllers\Provedor;

use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Contacto;
use App\Http\Controllers\Controller;
use App\Provedor;
use Illuminate\Http\Request;

class PersonalContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Provedor $provedor)
    {
        //
        $contactos = $provedor->contactosProvedor;
        // dd($contactos);
        return view('contacto.index', ['provedor'=>$provedor, 'contactos'=>$contactos]);

    }

    public function busqueda(){
        $contactos = $provedor->contactosProvedor;
        // dd($contactos);
        return view('contacto.busqueda', ['provedor'=>$provedor, 'contactos'=>$contactos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Provedor $provedor)
    {
        //
        return view('contacto.create',['provedor'=>$provedor]);
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
        $contacto = ContactoProvedor::create($request->all());
        Alert::success('Contacto creado con éxito');

        return redirect()->route('provedores.contacto.index', ['provedor'=>$provedor]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Provedor $provedor,$contacto)
    {
        //
        $contacto = ContactoProvedor::findOrFail($contacto);
        return view('contactoprovedores.view',['provedor'=>$provedor, 'contacto'=>$contacto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Provedor $provedor, $contacto)
    {
        //
        $contacto = ContactoProvedor::findOrFail($contacto);
        return view('contactoprovedores.edit',['provedor'=>$provedor, 'contacto'=>$contacto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $provedor, $contacto)
    {
        //
        $contacto = ContactoProvedor::findOrFail($contacto);
        $contacto->update($request->all());
        Alert::success('Contacto actualizado con éxito');
        return redirect()->route('provedores.contacto.index',['provedor'=>$provedor]);
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
}
