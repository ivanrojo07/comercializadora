@extends('layouts.blank')
@section('content')

<div class="container">
	<div class="panel-body">
		<div class="col-lg-6">
			<form id="buscarcliente" action="busqueda"
		onKeypress="if(event.keyCode == 13) event.returnValue = false;">
				<!-- {{ csrf_field() }} -->
			
				
				<div class="input-group" id="datos1">
					<input list='browsers' name="query" id="query" class="form-control" placeholder="Buscar..." autofocus>


				 
					

					
				</div>
			</form>
		</div>
	</div>




	<div id="datos" name="datos" class="jumbotron">
		{{-- TABLA AJAX DE CLIENTES --}}
			
	</div>
</div>
@foreach ($personals as $personal)
	{{-- expr --}}
	<div class="persona" id="{{$personal->id}}">
		<div class="container" id="tab">
			<div role="application" class="panel panel-group" >
				<div class="panel-default">
					<div class="panel-heading"><h4>@if ($personal->tipopersona == "Fisica")
						{{-- true expr --}}
						{{ucwords($personal->nombre)." ".ucwords($personal->apellidopaterno)." ".ucwords($personal->apellidomaterno)}}
					@else
						{{-- false expr --}}
						{{ucwords($personal->razonsocial)}}
					@endif:</h4></div>
					
				</div>
				<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
					<li role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active active"><a href="#tab1{{$personal->id}}" tabindex="-1">Dirección Fiscal:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tab2{{$personal->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Dirección Fisica:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab3{{$personal->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
					<li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab4{{$personal->id}}" role="tab" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a></li>
				</ul>
				<div class="panel-default pestana" aria-hidden="false" id="tab1{{$personal->id}}" style="display: block;">
					<div class="panel-heading">Dirección Fiscal:</div>
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="calle">Calle:</label>
		    					<dd>{{ $personal->calle }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numext">Numero exterior:</label>
		    					<dd>{{ $personal->numext }}</dd>
		  					</div>	
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numinter">Numero interior:</label>
		    					<dd>{{ $personal->numinter }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="cp">Código postal:</label>
		    					<dd>{{ $personal->cp }}</dd>
		  					</div>		
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="colonia">Colonia:</label>
		  						<dd>{{ $personal->colonia }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
		  						<dd>{{ $personal->municipio }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="ciudad">Ciudad:</label>
		  						<dd>{{ $personal->ciudad }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="estado">Estado:</label>
		  						<dd>{{ $personal->estado }}</dd>
		  					</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle1">Entre calle:</label>
		  						<dd>{{ $personal->calle1 }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle2">Y calle:</label>
		  						<dd>{{ $personal->calle2 }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Referencia:</label>
		  						<dd>{{ $personal->referencia }}</dd>
		  					</div>
						</div>
					</div>
				</div>
				<div class="panel-default pestana" id="tab2{{$personal->id}}">

					<div class="panel-heading">Dirección Fisica:</div>
					<div class="panel-body">
						@if (count($personal->direccionFisica) == 0 )
							{{-- true expr --}}
							<h3>Aun no tiene direccion Fisica</h3>
						@else
							{{-- false expr --}}

						<div class="col-md-12 offset-md-2 mt-3">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="calle">Calle:</label>
		    					<dd>{{$personal->direccionFisica->calle}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numext">Numero exterior:</label>
		    					<dd>{{$personal->direccionFisica->numext}}</dd>
		  					</div>	
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		    					<label class="control-label" for="numint">Numero interior:</label>
		    					<dd>{{$personal->direccionFisica->numint}}</dd>
		  					</div>		
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="colonia">Colonia:</label>
		  						<dd>{{$personal->direccionFisica->colonia}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="municipio">Delegación o Municipio:</label>
		  						<dd>{{$personal->direccionFisica->municipio}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="ciudad">Ciudad:</label>
		  						<dd>{{ $personal->direccionFisica->ciudad }}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="estado">Estado:</label>
		  						<dd>{{$personal->direccionFisica->estado}}</dd>
		  					</div>
						</div>
						<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle1">Entre calle:</label>
		  						<dd>{{$personal->direccionFisica->calle1}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="calle2">Y calle:</label>
		  						<dd>{{$personal->direccionFisica->calle2}}</dd>
		  					</div>
		  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
		  						<label class="control-label" for="referencia">Referencia:</label>
		  						<dd>{{$personal->direccionFisica->referencia}}</dd>
		  					</div>
						</div>
						@endif
					</div>
				</div>
				<div class="panel-default pestana" id="tab3{{$personal->id}}">
					<div class="panel-heading">
						Contactos:
					</div>
					
					@if (count($personal->contactos) == 0)
					<div class="panel-body">
						<h3>Aún no tienes contactos</h3>
					</div>
					@endif
					@if (count($personal->contactos) !=0)
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
							<thead>
								<tr class="info">
									<th>Nombre del contacto</th>
									<th>Telèfono Directo</th>
									
									<th>Telèfono celular</th>
								</tr>
							</thead>
							@foreach ($personal->contactos as $contacto)
								<tr class="active">
									<td>{{ $contacto->nombre }} {{$contacto->apater}} {{$contacto->amater}}</td>

									<td>{{$contacto->telefono1}}</td>
									
									<td>{{$contacto->celular1}}</td>
									
								</tr>
								</tbody>
							@endforeach
						</table>
					</div>
					@endif
				</div>
				
							
				<div class="panel-default pestana" id="tab4{{$personal->id}}">
				 	<div class="panel-heading">Datos Generales:</div>
				 	@if (count($personal->datosGenerales) == 0)
						<div class="panel-body">
							<h3>Aún no tienes datos generales</h3>
						</div>
						@endif
						@if (count($personal->datosGenerales) !=0)
				 	<div class="panel-body">
				 		<div class="col-md-12 offset-md-2 mt-3">
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 			<label class="control-label" for="nombre">Tamaño de la empresa:</label>
								<dd>{{$personal->datosGenerales->nombre}}</dd>
				 			</div>
				 		</div>
				 		<div class="col-md-12 offset-md-2 mt-3">
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="web">Sitio web:</label>
				 				<dd>{{$personal->datosGenerales->web}}</dd>
				 			</div>

				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="comentario">Comentarios:</label>
				 				<dd>{{$personal->datosGenerales->comentario}}</dd>
				 			</div>
				 			<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
				 				<label class="control-label" for="fechacontacto">Fecha de contacto:</label>
				 				<dd>{{$personal->datosGenerales->fechacontacto}}</dd>
				 			</div>
				 		</div>
				 	</div>
				 	@endif
				</div>
			</div>
		</div>
	</div>
@endforeach

@endsection


