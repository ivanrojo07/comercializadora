@extends('layouts.blank')
@section('content')
	<div class="container col-xs-10 col-xs-offset-1">
		<div class="panel-body">
			<div class="col-lg-6">
				<form action="buscarproducto" onKeypress="if(event.keyCode == 13) event.returnValue = false;">
					<div class="input-group">
						<input type="text" id="producto" 
							   name="query" 
							   class="form-control" 
							   placeholder="Buscar..." 
							   autofocus>
					</div>
				</form>
			</div>
		</div>
		<div id="datos" name="datos" class="jumbotron">
		</div>
	</div>
@endsection
