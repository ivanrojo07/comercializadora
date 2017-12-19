<?php

namespace App\Http\Controllers\Provedor;

use UxWeb\SweetAlert\SweetAlert as Alert;
use App\DatosGenerales;
use App\FormaContacto;
use App\Giro;
use App\Http\Controllers\Controller;
use App\Provedor;
use Illuminate\Http\Request;

class ProvedorlDatosGeneralesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Provedor $provedor)
    {
        //
        $datos = $provedor->datosGeneralesProvedor;
        if ($datos==null) {
            # code...
            return redirect()->route('provedores.datosgenerales.create',['provedor'=>$provedor]);;
        }
        else{
            $giro = Giro::findorFail($datos->giro_id);
            $formaContacto = FormaContacto::findorFail($datos->forma_contacto_id);
            // dd($giro);
            return view('datosgeneralesprovedores.view',['datos'=>$datos, 'provedor'=>$provedor, 'giro'=>$giro, 'formaContacto'=>$formaContacto]);
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Provedor $cliente)
    {
        //
        $giros = Giro::get();
        $formaContactos = FormaContacto::get();
        // dd($giros);}
        return view('datosgeneralesprovedores.create',['provedor'=>$provedor, 'giros'=>$giros, 'formaContactos'=>$formaContactos]);
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
        $datos = DatosGeneralesProvedor::create($request->all());
        Alert::success('Datos generales creados con éxito');
        return redirect()->route('provedores.datosgenerales.index',['provedor'=>$provedor]);;

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
        $datos = $provedor->datosGeneralesProvedor;
        // dd($datos);
        $giro = Giro::findorFail($datos->giro_id);
        $formaContacto = FormaContacto::findorFail($datos->forma_contacto_id);
        // dd($giro);
        return view('datosgeneralesprovedores.view',['datos'=>$datos, 'provedor'=>$provedor, 'giro'=>$giro, 'formaContacto'=>$formaContacto]);
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
        $datos = $provedor->datosGenerales;
        $giros = Giro::get();
        $formaContactos = FormaContacto::get();
        return view('datosgeneralesprovedores.edit',['provedor'=>$provedor, 'datos'=>$datos, 'giros'=>$giros, 'formaContactos'=>$formaContactos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $provedor, DatosGeneralesProvedor $datosgenerale)
    {
        //
        // dd($datosgenerale);
        $datosgenerale->update($request->all());
        $giro = Giro::findorFail($datosgenerale->giro_id);
        $formaContacto = FormaContacto::findorFail($datosgenerale->forma_contacto_id);
        Alert::success('Datos generales actualizados con éxito');
        return view('datosgeneralesprovedores.view',['datos'=>$datosgenerale,'provedor'=>$provedor, 'giro'=>$giro, 'formaContacto'=>$formaContacto]);

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
