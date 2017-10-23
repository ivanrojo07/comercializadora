@extends('layouts.app')
@section('content')
	<div class="container theme-showcase">
		<div class="jumbotron">
			{{-- {{dd($personal)}} --}}
			<h2><span class="label label-default">Datos Laborales: </span></h2>
		@if (count($datoslab) == 0)
				<p>Aún no tienes Datos Laborales</p>
		    	<a type="button" class="btn btn-sm btn-success" href="{{ route('personals.datoslaborales.create', $personal) }}">Agregar</a>
		@endif
		@if (count($datoslab) != 0);
			{{-- expr --}}
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
				<thead>
					<tr class="info">
						<th>Nombre</th>
						<th>Nombre de la empresa</th>
						<th>Giro de la empresa</th>
						<th>Puesto en la empresa</th>
						<th>Ingresos mensuales</th>
						<th>Operaciones</th>
					</tr>
				</thead>
					<tr class="active">
						<td>{{$personal->nombre}} {{ $personal->apellidopaterno }} {{ $personal->apellidomaterno }}</td>
						<td>{{ $datoslab->nombreempresa }}</td>
						<td>{{ $datoslab->giroempresa }}</td>
						<td>{{$datoslab->puestoempresa}}</td>
						<td>${{$datoslab->ingresosmesempresa}}</td>
						<td>
							<a class="btn btn-success btn-sm" href="{{ route('personals.datoslaborales.show',[$personal,$datoslab]) }}">Ver</a>
							<a class="btn btn-info btn-sm" href="{{ route('personals.datoslaborales.edit', [$personal,$datoslab]) }}">Editar</a>
					</tr>
						</td>
					</tbody>
			</table>
		@endif
		
		</div>
	</div>
@endsection