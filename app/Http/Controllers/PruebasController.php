<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PruebasController extends Controller{
	public function index(){
	 return view('productos.index');
	}
	public function create(){
	 return view('productos.create');
	}
	public function view(){
	 return view('productos.view');
	}

    


}

