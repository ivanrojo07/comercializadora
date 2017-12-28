@extends('layouts.blank')
@section('content')
<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<form id="buscarempleado" action="busqueda"
		onKeypress="if(event.keyCode == 13) event.returnValue = false;">
				<!-- {{ csrf_field() }} -->
			
				
				<div class="input-group" id="datos1">
					<input type="text" list='browsers' id="empleado" name="query" class="form-control" placeholder="Buscar..." autofocus>


				 
					
				</div>
			</form>
		</div>
	</div>
	<div id="datos" name="datos" class="jumbotron">
		
	</div>
</div>
@endsection