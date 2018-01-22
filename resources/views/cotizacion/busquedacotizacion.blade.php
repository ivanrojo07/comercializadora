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