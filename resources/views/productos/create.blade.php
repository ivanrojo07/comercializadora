@extends('layouts.app')
	@section('content')
	<div class="container" id="tab">
		<form role="form" id="form-cliente" method="POST" name="form">
		<div role="application" class="panel panel-group">
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Producto:</h4>
						</div>
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<div class="form-group col-xs-3">
			  						<label class="control-label" for="alias">ID:</label>
			  						<input type="text" class="form-control" id="id" name="id" required readonly="">
			  					</div>
			  					<div class="form-group col-xs-3">
			  						<label class="control-label" for="alias">Marca:</label>
			  						<input type="text" class="form-control" id="marca" name="marca">
			  					</div>
			  					<div class="form-group col-xs-3">
			  						<label class="control-label" for="alias">* Clave:</label>
			  						<input type="text" class="form-control" id="clave" name="clave" required>
			  					</div>
			  					<div class="form-group col-xs-3">
			  					<label class="control-label" for="familia">Familia:</label>
			    					<select type="select" name="familia" class="form-control" id="familia" onchange="familia(this)">	
			    				</select>
			    				</div>
			    			</div>
			    			<div class="col-md-12 offset-md-2 row mt-3">
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="tipo">Tipo:</label>
			    					<select type="select" name="tipo" class="form-control" id="tipo" onchange="tipo(this)">	
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="subtipo">Subtipo:</label>
			    					<select type="select" name="subptipo" class="form-control" id="subptipo" onchange="familia(this)">	
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="medida1">Medida 1:</label>
			  					<input type="text" class="form-control" id="medida1" name="medida1" required>

			    					<select type="select" name="selmedida1" class="form-control" id="selmedida1" onchange="medida1	(this)">	
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="medida2">Medida 2:</label>
			  					<input type="text" class="form-control" id="medida2" name="medida2">
			    					<select type="select" name="selmedida2" class="form-control" id="selmedida2" onchange="medida2(this)">	
			    				</select>
			    				</div>
			    			</div>
						</div>
					</div>
		</div>

	</div>
	@endsection
