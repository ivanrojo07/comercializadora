@extends('layouts.blank')
@section('content')
<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<form action="buscarpuesto">
				<div class="input-group">
					<input type="text" name="query" class="form-control" placeholder="Buscar..." autofocus>
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
					</span>
				</div>
			</form> 
		</div>
		<div class="col-lg-6">
			<a class="btn btn-success" href="{{ route('puestos.create') }}">
				<strong>Agregar Puesto</strong>
			</a>
		</div>
	</div>
	@if (count($puestos) == 0)
		{{-- true expr --}}
		<label>No hay puestos añadidos</label>
	@else
		{{-- false expr --}}
	<div class="jumbotron">
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>@sortablelink('id', '#'){{-- Nombre --}}</th>
					<th>@sortablelink('nombre', 'Nombre')</th>
					<th>@sortablelink('etiqueta', 'Etiqueta')</th>
					<th>Operacion</th>
				</tr>
			</thead>
			@foreach($puestos as $puesto)
				<tr class="active">
					<td>
						{{ $puesto->id }}
					</td>
					<td>{{ $puesto->nombre }}</td>
					<td>{{ $puesto->etiqueta }}</td>
					<td>
						<div class="row-8">
							<div class="col-sm-4">
								<a class="btn btn-info btn-sm" href="{{ route('puestos.edit',['puesto'=>$puesto]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><strong> Editar</strong></a>
								
							</div>
						</div>
						<form role="form" id="eliminar {{ $puesto->id }}" method="POST" action="{{ route('puestos.destroy',['puesto'=>$puesto]) }}">
							{{ csrf_field() }}
							<input type="hidden" name="_method" value="DELETE">
						<a type="submit" onclick="deleteFunction('eliminar {{ $puesto->id }}')" class="btn btn-info btn-sm" ><i class="fa fa-trash" aria-hidden="true"></i><strong> Borrar</strong></a>
						</form>
				</tr>
					</td>
				</tbody>
			@endforeach
		</table>
	</div>
	{{ $puestos->links()}}
	@endif
</div>
@endsection