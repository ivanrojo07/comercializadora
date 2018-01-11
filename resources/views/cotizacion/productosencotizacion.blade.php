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
		</tr>
	@endforeach
</table>