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
				<div class="form-group col-lg-4 col-sm-6 col-xs-12">
					<label class="control-label" for="fecha">Fecha:</label>
					<input class="form-control" type="date" name="fecha" value="{{$cotizacion->fecha}}">
				</div>
				<div class="form-group col-lg-4 col-sm-6 col-xs-12">
					<label class="control-label" for="validez">Validez hasta:</label>
					<input class="form-control" type="date" name="validez" value="{{$cotizacion->validez}}">
				</div>
					</form>
			</div>
		</div>
	</div>
@endsection