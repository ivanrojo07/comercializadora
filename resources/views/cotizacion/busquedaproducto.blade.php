<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
	<thead>
		<tr class="info">
			<th>Marca</th>
			<th>Descripción corta</th>
			<th>Descripción</th>
		</tr>
	</thead>
	<tbody>
		
	
	@foreach ($productos as $producto)
		{{-- expr --}}
		<tr title="Has Click para agregar el producto a la Cotización" style="cursor: pointer" class="active">
			<td>{{$producto->marca}}</td>
			<td>{{$producto->descripcion_short}}</td>
			<td>{{$producto->descripcion_large}}</td>
		</tr>
	@endforeach
	</tbody>
</table>