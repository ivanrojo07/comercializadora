@extends('layouts.app')
@section('content')
<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<form action="#">
				<div class="input-group">
					<input type="text" name="query" class="form-control" placeholder="Buscar...">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
					</span>
				</div>
			</form>
		</div>
		<div class="col-lg-6">
			<a class="btn btn-success" href="#">Nuevo Giro</a>
		</div>
	</div>
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
			@foreach($giros as $giro)
				<tr class="active">
					<td>
						{{ $giro->id }}
					</td>
					<td>{{ $giro->nombre }}</td>
					<td>{{ $giro->etiqueta }}</td>
					<td>
						<a class="btn btn-success btn-sm" href="#"><i class="fa fa-eye" aria-hidden="true"></i> Ver</a>
						<a class="btn btn-info btn-sm" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
						<a class="btn btn-info btn-sm" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Borrar</a>
				</tr>
					</td>
				</tbody>
			@endforeach
		</table>
	</div>
	{{ $giros->links()}}
</div>
@endsection