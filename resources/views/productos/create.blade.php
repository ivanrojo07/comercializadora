@extends('layouts.app')
	@section('content')
	<div class="container" id="tab">
		<form role="form" id="form-cliente" method="POST" name="form">
		<div role="application" class="panel panel-group">
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Producto:</h4>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-xs-3">
			  						<label class="control-label" for="id">* ID:</label>
			  						<input type="text" class="form-control" id="id_auto" name="id" required readonly="" value="">
			  					</div>
			  					<div class="form-group col-xs-3">
			  						<label class="control-label" for="marca">* Marca:</label>
			  						<input type="text" class="form-control" id="marca" name="marca" required value=""onkeypress="sub()">
			  					</div>
			  					<div class="form-group col-xs-3">
			  						<label class="control-label" for="clave">* Clave:</label>
			  						<input type="text" class="form-control" id="clave" name="clave" required  onkeypress="sub()">
			  					</div>
			  					<div class="form-group col-xs-3">
			  					<label class="control-label" for="familia">* Familia:</label>
			    					<select type="select" name="familia" class="form-control" id="familia" required onchange="familia(this)">	
			    				</select>
			    				</div>
			    			</div>
			    			<div class="row">
			    				<div class="form-group col-xs-3">
			  						<label class="control-label" for="modelo">Modelo:</label>
			  						<input type="text" class="form-control" id="modelo" name="modelo">
			  					</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="tipo">Tipo:</label>
			    					<select type="select" name="tipo" class="form-control" id="tipo" onchange="tipo(this)">	
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="subtipo">Subtipo:</label>
			    					<select type="select" name="subptipo" class="form-control" id="subptipo" required onchange="subptipo(this)">	
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="presentacion">* Presentación(empaque):</label>
			    					<select type="select" name="presentacion" class="form-control" id="presentacion" required onchange="presentacion(this)">	
			    				</select>
			    				</div>

			    				
			    			</div>
			    			<div class="row">
			    				
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="calidad">Calidad:</label>
			    					<select type="select" name="calidad" class="form-control" id="calidad" onchange="calidad(this)">	
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="acabado">Acabado:</label>
			    					<select type="select" name="acabado" class="form-control" id="acabado" onchange="acabado(this)">	
			    				</select>
			    				</div>
			    				
			    			</div>
			    			<div class="row mt-3">
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="medida1">Medida 1:</label>
			  					<input type="text" class="form-control" id="medida1" name="medida1" required>
			  					<label class="control-label" for="medida2">Unidades:</label>

			    					<select type="select" name="selmedida1" class="form-control" id="selmedida1" onchange="medida1	(this)">	
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="medida2">Medida 2:</label>
			  					<input type="text" class="form-control" id="medida2" name="medida2">
			  					<label class="control-label" for="medida2">Unidades</label>
			    					<select type="select" name="selmedida2" class="form-control" id="selmedida2" onchange="medida2(this)">	
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="medida3">Medida 3:</label>
			  					<input type="text" class="form-control" id="medida3" name="medida3">
			  					<label class="control-label" for="medida2">Unidades</label>
			    					<select type="select" name="selmedida3" class="form-control" id="selmedida3" onchange="medida3(this)">	
			    				</select>
			    				</div>
			    				
			  					

			    			</div>
			    			<div class="row mt-3">
			    				<div class="form-group col-xs-3">
			  						<label class="control-label" for="corta">* Descripción corta:</label>
			  						<input type="text" class="form-control" id="corta" name="corta" required readonly="">
			  					</div>
			    			<div class="form-group col-xs-3">
			  						<label class="control-label" for="descripcion">* Descripción Larga:</label>
			  						<textarea class="form-control" id="descripcion" name="descripcion" required readonly="">
			  							</textarea>
			  					</div>
			  					<div class="form-group col-xs-3">
			  						<label class="control-label" for="sat">Clave Sat:</label>
			  						<input type="text" class="form-control" id="sat" name="sat">
			  					</div>
			    			<div class="form-group col-xs-3">
			  						<label class="control-label" for="descripcion_sat">Descripción SAT:</label>
			  						<textarea class="form-control" id="descripcion_sat" name="descripcion_sat">
			  							</textarea>
			  					</div>
			  				</div>

						</div>
					</div>
		</div>

	</div>
	<script type="text/javascript">
		function sub(){
			a = document.getElementById("marca").value;
			b=document.getElementById("clave").value;
			document.getElementById("id_auto").value=a+b;
		}
	</script>
	{{-- <script src="http://code.jquery.com/jquery-1.0.4.js"></script>
	<script>
		$(document).ready(function(){
			$("#marca").keyup(function(){
				var value=$(this).val();
				$("#id_auto").val(value);
			});
		});
</script> --}}
	@endsection
