@extends('layouts.blank')
@section('content')
	<div class="container col-xs-10 col-xs-offset-1">
		<div class="panel-body">
			<div class="col-lg-6">
				<form action="buscarproducto">
					<div class="input-group">
						<input type="text" 
							   name="query" 
							   class="form-control" 
							   placeholder="Buscar..." 
							   autofocus>
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</span>
					</div>
				</form>
			</div>
		</div>
		<div class="jumbotron">
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px; margin-left: -45px;">
				<thead>
					<tr class="info">
						<th>@sortablelink('identificador','ID')</th>
						<th>@sortablelink('marca','Marca')</th>
						<th>@sortablelink('clave','Clave')</th>
						<th>@sortablelink('descripcion_short','Descripción corta')</th>
						<th>@sortablelink('familia','Familia')</th>
						<th>@sortablelink('tipo','Tipo')</th>
						<th width="200px">Operaciones</th>
					</tr>
				</thead>
				@foreach ($productos as $producto)
					{{-- expr --}}
					<tr>
						<td>{{$producto->identificador}}</td>
						<td>{{$producto->marca}}</td>
						<td>{{$producto->clave}}</td>
						<td>{{$producto->descripcion_short}}</td>
						<td>{{$producto->familia}}</td>
						<td>{{$producto->tipo}}</td>
						<td>
							
							<a class="btn btn-success btn-sm" href="{{ route('productos.show',['producto'=>$producto]) }}"><i class="fa fa-eye" aria-hidden="true"></i>
								<strong>Ver</strong>
							</a>
							<a class="btn btn-info btn-sm" href="{{ route('productos.edit',['producto'=>$producto]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
								<strong>Editar</strong>
							</a>
							
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection
