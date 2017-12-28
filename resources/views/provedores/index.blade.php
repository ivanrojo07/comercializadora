@extends('layouts.blank')
@section('content')
<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<form action="buscarprovedor">
				<div class="input-group">
					<input type="text" id="provedor" 
					       name="query" 
					       class="form-control" 
					       placeholder="Buscar..."
					       autofocus
					       onKeypress="if(event.keyCode == 13) event.returnValue = false;">

					       
				</div>
				<a class="btn btn-info" href="{{ route('provedores.create')}}">
							        <strong>
							   Agregar Proveedor</strong>
							</a>
			</form>
		</div>
	</div>
	<div id="datos" name="datos" class="jumbotron">

	</div>
	
</div>


@endsection