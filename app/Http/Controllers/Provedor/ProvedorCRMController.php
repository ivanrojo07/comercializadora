<?php

namespace App\Http\Controllers\Provedor;

use App\CRM;
use App\Http\Controllers\Controller;
use App\Provedor;
use Illuminate\Http\Request;

class ProvedorCRMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Provedor $cliente)
    {
        //
        
        $crms = $cliente->crm;
        return view('crmprovedores.index',['personal'=>$cliente, 'crms'=>$crms]);
        

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
    public function store(Request $request, Provedor $cliente)
    {
        //
        // dd($request->all());
        $crm = CRM::create($request->all());
        return redirect()->route('provedores.crm.index',['personal'=>$cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Provedor $cliente, $crm)
    {
        //
        $crm = ProvedorCRM::findOrFail($crm);
        return view('crmprovedores.view',['personal'=>$cliente,'crm'=>$crm]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Provedor $personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $personal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provedor $personal)
    {
        //
    }
}
