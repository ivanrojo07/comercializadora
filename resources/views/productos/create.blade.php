@extends('layouts.app')
	@section('content')
	<div class="container" id="tab">
		<form role="form" id="form-cliente" method="POST" name="form" action="{{ route('productos.store') }}">
			{{ csrf_field() }}
		<div role="application" class="panel panel-group">
					<div class="panel-default">
						<div class="panel-heading"><h4>Datos del Producto:</h4>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="form-group col-xs-3">
			  						<label class="control-label" for="id">* ID:</label>
			  						<input type="text" class="form-control" id="id_auto" name="identificador"  required readonly="" value="1">
			  					</div>
			  					<div class="form-group col-xs-3">
			  						<label class="control-label" for="marca">* Marca:</label>
			  						<select type="select" name="marca_id" class="form-control" id="marca_id" onchange='document.getElementById("id_auto").value = this.value'>
			  							@foreach ($marcas as $marca)
			  								{{-- expr --}}
			  								<option id="{{$marca->id}}" value="{{$marca->abreviatura}}" selected="selected">{{$marca->nombre}}</option>
			  							@endforeach
			  						</select>
			  						{{-- <input type="text" class="form-control" id="marca" name="marca" required value=""onkeypress="sub()"> --}}
			  					</div>
			  					<div class="form-group col-xs-3">
			  						<label class="control-label" for="clave">* Clave:</label>
			  						<input type="text" class="form-control" id="clave" name="clave" required  onkeypress="sub()">
			  					</div>
			  					<div class="form-group col-xs-3">
			  					<label class="control-label" for="familia">* Familia:</label>
			    					<select type="select" name="familia_id" class="form-control" id="familia_id" required onchange="familia(this)">
			    						@foreach ($familias as $familia)
			    							{{-- expr --}}
			    							<option id="{{$familia->id}}" value="{{$familia->id}}" selected="selected">{{$familia->nombre}}</option>
			    						@endforeach
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
			    					<select type="select" name="tipo_id" class="form-control" id="tipo_id" onchange="tipo(this)">
			    						@foreach ($tipos as $tipo)
			    							{{-- expr --}}
			    							<option id="{{$tipo->id}}" value="{{$tipo->id}}" selected="selected">{{$tipo->nombre}}</option>
			    						@endforeach
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="subtipo">Subtipo:</label>
			    					<select type="select" name="subptipo_id" class="form-control" id="subptipo_id" required onchange="subptipo(this)">
			    					@foreach ($subtipos as $subtipo)
			    							{{-- expr --}}
			    							<option id="{{$subtipo->id}}" value="{{$subtipo->id}}" selected="selected">{{$subtipo->nombre}}</option>
			    						@endforeach	
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="presentacion">* Presentación(empaque):</label>
			    					<select type="select" name="presentacion_id" class="form-control" id="presentacion_id" required onchange="presentacion(this)">
			    					@foreach ($presentaciones as $presentacion)
			    							{{-- expr --}}
		    							<option id="{{$presentacion->id}}" value="{{$presentacion->id}}" selected="selected">{{$presentacion->nombre}}</option>
		    						@endforeach	
			    				</select>
			    				</div>

			    				
			    			</div>
			    			<div class="row">
			    				
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="calidad">Calidad:</label>
			    					<select type="select" name="calidad_id" class="form-control" id="calidad_id" onchange="calidad(this)">
			    					@foreach ($calidades as $calidad)
		    							{{-- expr --}}
		    							<option id="{{$calidad->id}}" value="{{$calidad->id}}" selected="selected">{{$calidad->nombre}}</option>
		    						@endforeach	
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="acabado">Acabado:</label>
			    					<select type="select" name="acabado_id" class="form-control" id="acabado_id" onchange="acabado(this)">
			    					@foreach ($acabados as $acabado)
		    							{{-- expr --}}
		    							<option id="{{$acabado->id}}" value="{{$acabado->id}}" selected="selected">{{$acabado->nombre}}</option>
		    						@endforeach	
			    				</select>
			    				</div>
			    				
			    			</div>
			    			<div class="row mt-3">
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="medida1">Medida 1:</label>
			  					<input type="text" class="form-control" id="medida1" name="medida1" required>
			  					<label class="control-label" for="medida2">Unidades:</label>

			    					<select type="select" name="unidad1_id" class="form-control" id="unidad1_id" onchange="medida1	(this)">
			    						@foreach ($unidades as $unidad)
			    							{{-- expr --}}
			    							<option id="{{$unidad->id}}" value="{{$unidad->id}}" selected="selected">{{$unidad->nombre}}</option>
			    						@endforeach
				    				</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="medida2">Medida 2:</label>
			  					<input type="text" class="form-control" id="medida2" name="medida2">
			  					<label class="control-label" for="medida2">Unidades</label>
			    					<select type="select" name="unidad2_id" class="form-control" id="unidad2_id" onchange="medida2(this)">
			    						@foreach ($unidades as $unidad)
			    							{{-- expr --}}
			    							<option id="{{$unidad->id}}" value="{{$unidad->id}}" selected="selected">{{$unidad->nombre}}</option>
			    						@endforeach
				    				</select>	
			    				</select>
			    				</div>
			    				<div class="form-group col-xs-3">
			  					<label class="control-label" for="medida3">Medida 3:</label>
			  					<input type="text" class="form-control" id="medida3" name="medida3">
			  					<label class="control-label" for="medida2">Unidades</label>
			    					<select type="select" name="unidad3_id" class="form-control" id="unidad3_id" onchange="medida1	(this)">
			    						@foreach ($unidades as $unidad)
			    							{{-- expr --}}
			    							<option id="{{$unidad->id}}" value="{{$unidad->id}}" selected="selected">{{$unidad->nombre}}</option>
			    						@endforeach
				    				</select>	
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
					<div class="panel-body">
						<button type="submit" class="btn btn-default">Guardar</button>
				<p><strong>*Campo requerido</strong></p>
				</div>	
		</div>
	</form>
	</div>
	<script type="text/javascript">
		function sub(){
			a = document.getElementById("marca").value;
			b=document.getElementById("clave").value;
			document.getElementById("id_auto").value=a+b;
		}
	</script>
	
	@endsection
