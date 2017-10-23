@extends('layouts.app')
	@section('content')
		<div class="container" id="tab">
			<form role="form" id="form-cliente" method="POST" action="{{ route('personals.update',['personal'=>$personal]) }}" name="form">
					{{ csrf_field() }}
				<input type="hidden" name="_method" value="PUT">
				<div role="application" class="wizard clearfix" >
					<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
						<li role="presentation" tabindex="0" class="active" aria-controls="tabs-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true"><a href="#tab1" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-1">Datos Generales:</a></li>
						<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tab2" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-2">Dirección:</a></li>
						<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab3" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Personales:</a></li>
					</ul>
					<div id="tab1" class="pestana" style="display: inline;">
						<div class="panel-body">
							<div class="col-md-12 offset-md-2 mt-3">
								<legend>Información general:</legend>
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
    								<label class="control-label" for="tipo">Tipo de cliente:</label>
			    					<select type="select" name="tipo" class="form-control" id="tipo" onchange="formulario(this)">
			    						<option id="Prospecto" value="Prospecto" @if ($personal->tipo == "Prospecto")
			    							selected="selected" 
			    						@endif>Prospecto</option>
			    						<option id="Cliente" value="Cliente" @if ($personal->tipo == "Cliente")
			    							selected="selected" 
			    						@endif>Cliente</option>
			    					</select>
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
			    					<select type="select" name="tipopersona" class="form-control" id="tipopersona" onchange="persona(this)">
			    						<option id="Fisica" value="Fisica" @if ($personal->tipopersona == "Fisica")
			    							selected="selected"
			    						@endif >Fisica</option>
			    						<option id="Moral" value="Moral" @if ($personal->tipopersona == "Moral")
			    							selected="selected"
			    						@endif >Moral</option>
			    					</select>
			  					</div>
			  				</div>
			  				<div class="col-md-12 offset-md-2 mt-3" id="perfisica">
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="nombre">Nombre(s):</label>
			  						<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $personal->nombre }}">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
			  						<input type="text" class="form-control" id="apellidopaterno" value="{{ $personal->apellidopaterno }}" name="apellidopaterno">
			  					</div>
			  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
			  						<input type="text" class="form-control" id="apellidomaterno" value="{{ $personal->apellidomaterno }}" name="apellidomaterno">
			  					</div>
			  				</div>
			  				<div class="col-md-12 offset-md-2 mt-3" id="permoral" style="display:none;">
								<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
			  						<label class="control-label" for="razonsocial">Razon Social:</label>
			  						<input type="text" class="form-control" id="razonsocial" name="razonsocial" value="{{ $personal->razonsocial }}">
			  					</div>
							</div>
						</div>
					</div>
				</div>
				<div id="tab2" class="pestana">
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<legend>Dirección/Domicilio:</legend>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
								<label class="control-label" for="calle">Calle:</label>
								<input type="text" class="form-control" id="calle" value="{{ $personal->calle }}" name="calle">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">	
								<label class="control-label" for="numext" >Número Exterior:</label>
								<input type="text" class="form-control" id="numext" value="{{ $personal->numext }}" name="numext">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="numinter">Número Interior:</label>
								<input type="text" class="form-control" id="numinter" value="{{ $personal->numinter }}" name="numinter">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="cp">Código Postal:</label>
								<input type="text" class="form-control" id="cp" value="{{ $personal->cp }}" name="cp">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="colonia">Colonia:</label>
								<input type="text" class="form-control" id="colonia" value="{{ $personal->colonia }}" name="colonia">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="municipio">Municipio/Delegación:</label>
								<input type="text" class="form-control" id="municipio" value="{{ $personal->municipio }}" name="municipio">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="ciudad">Ciudad:</label>
								<input type="text" class="form-control" id="ciudad" value="{{ $personal->ciudad }}" name="ciudad">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="estado">Estado:</label>
								<input type="text" class="form-control" id="estado" value="{{ $personal->estado }}" name="estado">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="calle1">Entre calle:</label>
								<input type="text" class="form-control" id="calle1" value="{{ $personal->calle1 }}" name="calle1">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="calle2">Y calle:</label>
								<input type="text" class="form-control" id="calle2" value="{{ $personal->calle2 }}" name="calle2">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="referencia">Referencia:</label>
								<input type="text" class="form-control" id="referencia" value="{{ $personal->referencia }}" name="referencia">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente" style="display:none;">
								<label class="control-label" for="recidir">Tiempo recidiendo:</label>
								<input type="date" class="form-control" id="recidir" value="{{ $personal->recidir }}" name="recidir">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente1" style="display:none;">
								<label class="control-label" for="vivienda">Tipo de vivienda:</label>
								<input type="text" class="form-control" id="vivienda" value="{{ $personal->vivienda }}" name="vivienda">
							</div>
						</div>
					</div>
				</div>
				<div id="tab3" class="pestana">
					<div class="panel-body">
						<div class="col-md-12 offset-md-2 mt-3">
							<legend>Datos personales:</legend>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="mail">Correo:</label>
								<input type="email" class="form-control" id="mail" value="{{ $personal->mail }}" name="mail">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="rfc">RFC:</label>
								<input type="text" class="form-control" id="rfc" value="{{ $personal->rfc }}" name="rfc">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="telefonofijo">Número de Telefono:</label>
								<input type="text" class="form-control" id="telefonofijo" value="{{ $personal->telefonofijo }}" name="telefonofijo">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<label class="control-label" for="telefonocel">Número Celular:</label>
								<input type="text" class="form-control" id="telefonocel" value="{{ $personal->telefonocel }}" name="telefonocel">
							</div>
							<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12" id="cliente2" style="display:none;">
								<label class="control-label" for="estadocivil">Estado Civil:</label>
								<select type="select" class="form-control" id="estadocivil" value="{{ $personal->estadocivil }}" name="estadocivil">
		    						<option value="Casado" @if ($personal->estadocivil == "Casado")
		    							selected="selected" 
		    						@endif>Casado</option>
		    						<option value="Soltero" @if ($personal->estadocivil == "Soltero")
		    							selected="selected" 
		    						@endif>Soltero</optio>
		    					</select>
							</div>
						</div>
					</div>
				</div>
  				<button type="submit" class="btn btn-default">Guardar</button>
				</div>
			</form>
		</div>
	@endsection