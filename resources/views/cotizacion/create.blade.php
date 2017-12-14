@extends('layouts.app')
@section('content')
	{{-- expr --}}
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading"><h5>Cotización:</h5></div>
			<div class="panel-body">
				@if ($edit == true)
					{{-- true expr --}}
					<form role="form" method="POST" action="{{ route('cotizaciones.update',['cotizacione'=>$cotizacion]) }}">
						<input type="hidden" name="_method" value="PUT">
				@else
					{{-- false expr --}}
					<form role="form" method="POST" action="{{ route('cotizaciones.create') }}">
				@endif
				<div class="form-group col-lg-4 col-sm-6 col-xs-12">
					<label class="control-label" for="personal_id">Cliente:</label>
					<select type="select" name="personal_id" class="form-control" id="personal_id">
						@foreach ($clientes as $cliente)
							{{-- SELECCIONAR LA OPCION QUE TENGA LA COTIZACIÓN --}}
							<option id="{{$cliente->id}}" value="{{$cliente->id}}" @if ($cotizacion->personal_id == $cliente->id)
								{{-- expr --}}
								selected="selected" 
							@endif>@if ($cliente->tipopersona == 'Fisica')
								{{-- MOSTRAR EL NOMBRE, APELLIDOS SI ES PERSONA FISICA--}}
								{{$cliente->nombre}} {{$cliente->apellidopaterno}} {{$cliente->apellidomaterno}}
							@else
								{{-- MOSTRAR LA RAZON SOCIAL SI ES PERSONA MORAL --}}
								{{$cliente->razonsocial}}
							@endif</option>
						@endforeach
					</select>
				</div>
				<div class="form-group col-lg-4 col-sm-6 col-xs-12">
					<label class="control-label" for="user_id">Vendedor:</label>
					<select type="select" name="user_id" class="form-control" id="user_id">
						@foreach ($vendedores as $vendedor)
							{{-- SELECCIONAR LA OPCION QUE TENGA LA COTIZACIÓN --}}
							<option id="{{$vendedor->id}}" value="{{$vendedor->id}}" @if ($cotizacion->user_id == $vendedor->id)
								{{-- expr --}}
								selected="selected" 
							@endif>{{ $vendedor->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group col-lg-4 col-sm-6 col-xs-12">
					<label class="control-label" for="cotizacion">Cotización:</label>
					<input class="form-control" type="text" name="cotizacion" value="{{$cotizacion->cotizacion}}">
				</div>
				<div class="form-group col-lg-6 col-sm-6 col-xs-12">
					<label class="control-label" for="fecha">Fecha:</label>
					<input class="form-control" type="date" name="fecha" value="{{$cotizacion->fecha}}">
				</div>
				<div class="form-group col-lg-6 col-sm-6 col-xs-12">
					<label class="control-label" for="validez">Validez hasta:</label>
					<input class="form-control" type="date" name="validez" value="{{$cotizacion->validez}}">
				</div>
				<div class="form-group col-lg-2 col-sm-6 col-xs-12">
					<label class="control-label" for="producto_id">Producto:</label>
					<input class="form-control" type="text" name="producto_id" value="{{$cotizacion->producto_id}}">
					<label class="control-label" for="descuento">Descuento:</label>
					<input class="form-control" type="text" name="descuento" value="{{$cotizacion->descuento}}">
					<label class="control-label" for="cantidad">Cantidad:</label>
					<input class="form-control" type="text" name="cantidad" value="{{$cotizacion->cantidad}}">
				</div>
				<div class="form-group col-lg-10 col-sm-6 col-xs-12">
					<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
						<thead>
							<tr class="info">
								<th>@sortablelink('marca','Marca')</th>
								<th>@sortablelink('descripcion_short','Descripción corta')</th>
								<th>@sortablelink('descripcion_large','Descripción')</th>
							</tr>
						</thead>
						@foreach ($productos as $producto)
							{{-- expr --}}
							<tr class="active">
								<td>{{$producto->marca}}</td>
								<td>{{$producto->descripcion_short}}</td>
								<td>{{$producto->descripcion_large}}</td>
							</tr>
						@endforeach
					</table>
				</div>
				<div class="form-group col-lg-12 col-sm-6 col-xs-12">
					<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
						<thead>
							<tr class="info">
								<th>@sortablelink('identificador','ID')</th>
								<th>@sortablelink('modelo','Modelo')</th>
								<th>@sortablelink('marca','Marca')</th>
								<th>@sortablelink('descripcion_large','Descripción')</th>
								<th>@sortablelink('','Precio Neto')</th>
								<th>@sortablelink('','I.V.A.')</th>
								<th>@sortablelink('','Total')</th>
							</tr>
						</thead>
					</table>
				</div>
				<div class="form-group col-lg-offset-9 col-lg-3 has-success has-feedback">
					<div class="input-group">
					    <span class="input-group-addon">Subtotal:&nbsp</span>
					    <div class="input-group-addon">$</div>
					    <input type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status" readonly disabled="disabled">
					 </div>
					 <div class="input-group">
					    <span class="input-group-addon">I.V.A.:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp</span>
					    <div class="input-group-addon">$</div>
					    <input type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status" readonly disabled="disabled">
					 </div>
					 <div class="input-group">
					    <span class="input-group-addon">Total:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
					    <div class="input-group-addon">$</div>
					    <input type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status" readonly disabled="disabled">
					 </div>
				</div>
					</form>
			</div>
		</div>
	</div>
@endsection