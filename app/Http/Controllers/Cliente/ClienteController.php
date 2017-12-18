<?php

namespace App\Http\Controllers\Cliente;

use Illuminate\Http\Request;
use App\Personal;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


public function busqueda(Request $request){
    
    $query = $request->input('query');
    $wordsquery = explode(' ',$query);
    $clientes = Personal::where(function($q) use ($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                  $q->orWhere('nombre','LIKE',"%$word%")
                   // ->orWhere('rfc','LIKE',"%$word%")
                 
                   // ->orWhere('tipopersona','LIKE',"%$word%")
                   // ->orWhere('alias','LIKE',"%$word%")
                    ->orWhere('rfc','LIKE',"%word%");
                    
            }
        })->paginate(10);
     
      
        
       
       return view('clientes.index',['clientes'=>$clientes]);
       //return view('clientes.index',['variable'=>$_GET]);
        

    }



}
