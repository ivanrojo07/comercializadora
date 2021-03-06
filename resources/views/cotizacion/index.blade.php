@extends('layouts.blank')
@section('content')
	{{-- expr --}}
	<div class="container">
		<div class="panel-body">
		<div class="col-lg-6">
			<form id="buscarcotizacion" action="buscarcotizacion"
		onKeypress="if(event.keyCode == 13) event.returnValue = false;">
				{{-- {{ csrf_field() }} --}}
			<div class="input-group">	
				<span class="input-group-addon" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
				<input type="text" 
					       list='browsers' 
					       id="cotizacion" 
					       name="query" 
					       class="form-control" 
					       placeholder="Buscar..." 
					       autofocus>
			</div>
			</form>
		</div>
		</div>

		<div class="jumbotron" id="tablaCotizacion" name="tablaCotizacion">
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
				<thead>
					<tr class="info">
						<th>#</th>
						<th>Estado</th>
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
							<td>{{$cotizacion->estado}}</td>
							<td>
								@if ($cotizacion->cliente == null)
									{{-- true expr --}}
									No se asigno cliente
								@else
									{{-- false expr --}}
									@if ($cotizacion->cliente->tipopersona == "Moral")
										{{-- true expr --}}
										{{$cotizacion->cliente->razonsocial}}
									@else
										{{-- false expr --}}
										{{$cotizacion->cliente->nombre}} {{$cotizacion->cliente->apellidopaterno}} {{$cotizacion->cliente->apellidomaterno}}
									@endif
								@endif
								</td>
							<td>
								@if ($cotizacion->vendedor == null)
									{{-- true expr --}}
									No se asigno un vendedor
								@else
									{{-- false expr --}}
									{{$cotizacion->vendedor->nombre}} {{$cotizacion->vendedor->appaterno}} {{$cotizacion->vendedor->apmaterno}}
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
	<script>
		
		$(document).on('keyup',':input#cotizacion', function(){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: "buscarcotizacion",
				type: "GET",
				datatype: "html",
				data: {busqueda:$('#cotizacion').val()},
			}).done(function(resultado){
				$("#tablaCotizacion").html(resultado);
			});
		});
	</script>

@endsection