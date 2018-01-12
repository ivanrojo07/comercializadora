@extends('layouts.blank')
@section('content')
	{{-- expr --}}
	<div class="container">
		<div class="col-lg-6">
			<div class="input-group">	
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
				<input class="form-control" type="text" id="search" name="search">
			</div>
		</div>
		<div class="jumbotron" id="datos" name="datos">
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
				<thead>
					<tr class="info">
						<th>#</th>
						<th>Cliente</th>
						<th>Vendedor</th>
						<th>Fecha</th>
						<th>Validez hasta</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($cotizaciones as $cotizacion)
						{{-- expr --}}
						<tr class="active">
							<td>{{$cotizacion->cotiza}}</td>
							<td>
								@if ($cotizacion->cliente == null)
									{{-- true expr --}}
									No se asigno cliente
								@else
									{{-- false expr --}}
									{{$cotizacion->cliente->nombre}}
								@endif
								</td>
							<td>
								@if ($cotizacion->vendedor == null)
									{{-- true expr --}}
									No se asigno un vendedor
								@else
									{{-- false expr --}}
									{{$cotizacion->vendedor->nombre}}
								@endif
								</td>
							<td>{{$cotizacion->fecha}}</td>
							<td>{{$cotizacion->validez_cot}}</td>
							<td>0.00</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{$cotizaciones->links()}}
		</div>
	</div>

@endsection