@extends('layouts.blank')
@section('content')
	{{-- expr --}}
	<div class="row-8">
				@if ($edit == true)
					{{-- true expr --}}
					<form role="form" method="POST" action="{{ route('cotizaciones.update',['cotizacione'=>$cotizacion]) }}">
						<input type="hidden" name="_method" value="PUT">
						{{csrf_field()}}
				@else
					{{-- false expr --}}
					<form  id="cotizacion" role="form" method="POST" action="{{ route('cotizaciones.store') }}">
						{{csrf_field()}}
				@endif
		<div class="panel panel-default">
			<div class="panel-heading"><h5>Cotización: <button type="submit" class="col-md-offset-10 btn btn-success">Guardar</button></h5></div>
			<div class="panel-body">
				<div class="form-group col-lg-4 col-sm-6 col-xs-12">
					<input type="hidden" name="cotizacion_id" id="cotizacion_id" value="{{$cotizacion->id}}">
					<label class="control-label" for="personal_id">Cliente:</label>
					<select type="select" name="personal_id" class="form-control" id="personal_id">
						@foreach ($clientes as $cliente)
							{{-- SELECCIONAR LA OPCION QUE TENGA LA COTIZACIÓN --}}
							<option id="{{$cliente->id}}" value="{{$cliente->id}}" 
								@if ($cotizacion->personal_id == $cliente->id)
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
					<label class="control-label" for="empleado_id">Vendedor:</label>
					<select type="select" name="empleado_id" class="form-control" id="empleado_id">
						@foreach ($vendedores as $vendedor)
							{{-- SELECCIONAR LA OPCION QUE TENGA LA COTIZACIÓN --}}
							<option id="{{$vendedor->id}}" value="{{$vendedor->id}}" @if ($cotizacion->empleado_id == $vendedor->id)
								{{-- expr --}}
								selected="selected" 
							@endif>{{ $vendedor->nombre }} {{$vendedor->appaterno}} {{$vendedor->apmaterno}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group col-lg-4 col-sm-6 col-xs-12">
					<label class="control-label" for="cotiza">Cotización:</label>
					<input class="form-control" type="text" name="cotiza" id="cotiza"  value="{{$cotizacion->cotiza}}" readonly>
				</div>
				<div class="form-group col-lg-6 col-sm-6 col-xs-12">
					<label class="control-label" for="fecha">Fecha:</label>
					<input class="form-control" type="date" id="fecha" name="fecha" value="{{$cotizacion->fecha}}">
				</div>
				<div class="form-group col-lg-6 col-sm-6 col-xs-12">
					<label class="control-label" for="validez_cot">Validez hasta:</label>
					<input class="form-control" type="date" name="validez_cot" id="validez_cot" value="{{$cotizacion->validez_cot}}">
				</div>
				<div class="form-group col-lg-2 col-sm-6 col-xs-12">
					<label class="control-label" for="productos">Producto:</label>
					<div class="input-group">	
						<span class="input-group-addon" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
						<input class="form-control" type="text" id="search" name="search">
					</div>
					<label class="control-label" for="descuento">Descuento:</label>
					<input class="form-control" type="text" name="descuento" value="{{$cotizacion->descuento}}">
					<label class="control-label" for="cantidad">Cantidad:</label>
					<input class="form-control" type="text" name="cantidad" value="{{$cotizacion->cantidad}}">
				</div>
				<div class="form-group col-lg-10 col-sm-6 col-xs-12" style="
										height: 250px;
										overflow: scroll;">
					<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
						<thead>
							<tr class="info">
								<th>Marca</th>
								<th>Descripción corta</th>
								<th>Descripción</th>
							</tr>
						</thead>							
						<tbody id="table">
						@foreach ($productos as $producto)
							{{-- expr --}}
							<tr title="Has Click para agregar el producto a la Cotización" style="cursor: pointer" onclick="agregarProducto({{$producto->id}})" class="active">
								<td>{{$producto->marca}}</td>
								<td>{{$producto->descripcion_short}}</td>
								<td>{{$producto->descripcion_large}}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
				<div class="form-group col-lg-12 col-sm-6 col-xs-12" id="productoscotizados" name="productoscotizados">
					<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
						<thead>
							<tr class="info">
								<th>ID</th>
								<th>Modelo</th>
								<th>Marca</th>
								<th>Descripción</th>
								<th>Precio Neto</th>
								<th>I.V.A.</th>
								<th>Total</th>
								<th>_</th>
							</tr>
						</thead>
						@foreach ($productoscotizados as $productocot)
							{{-- expr --}}

							<tr>
								<td>{{ $productocot->identificador }}</td>
								<td>{{$productocot->modelo}}</td>
								<td>{{$productocot->marca}}</td>
								<td>{{$productocot->descripcion_short}}</td>
								<td>0.00</td>
								<td>0.00</td>
								<td>0.00</td>
								<td><a onclick="quitarProducto({{$producto->id}})">Eliminar</a></td>
							</tr>
						@endforeach
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
	<script>
		$(document).on('keyup', '#search', function() {
			var $rows = $('#table tr');
		  var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase().split(' ');

		  $rows.hide().filter(function() {
		    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
		    var matchesSearch = true;
		    $(val).each(function(index, value) {
		      matchesSearch = (!matchesSearch) ? false : ~text.indexOf(value);
		    });
		    return matchesSearch;
		  }).show();
		});
		function agregarProducto(producto){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: "{{ url('/incotizacion') }}",
				type: "POST",
				dataType: "html",
				data: {
					cotizacion_id: $("#cotizacion_id").val(),
					producto_id: producto
				},
			}).done(function(result){
				$("#productoscotizados").html(result);
			});
		}
		function quitarProducto(producto){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: "{{ url('/eliminarproductoencotizacion') }}"+"/"+producto,
				type: "POST",
				dataType: "html",
				data: {
					cotizacion_id: $("#cotizacion_id").val(),
					producto_id: producto
				},
			}).done(function(result){
				$("#productoscotizados").html(result);
			});
		}
	</script>
@endsection