@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="panel-body">
			<div class="col-lg-6">
				<form action="#">
					<div class="input-group">
						<input type="text" name="query" class="form-control" placeholder="Buscar...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</span>
					</div>
				</form>
			</div>
		</div>
		<div class="jumbotron">
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
				<thead>
					<tr class="info">
						<th>@sortablelink('','Identificador')</th>
						<th>@sortablelink('','Marca')</th>
						<th>@sortablelink('','Clave')</th>
						<th>@sortablelink('','Descripción corta')</th>
						<th>@sortablelink('','Familia')</th>
						<th>@sortablelink('','Tipo')</th>
					</tr>
				</thead>}
				@foreach ($productos as $producto)
					{{-- expr --}}
					<td>{{$producto->identificador}}</td>
					<td>{{$marca->nombre}}</td>
				@endforeach
			</table>
		</div>
	</div>
@endsection
