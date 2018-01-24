@extends('layouts.infoempleado')
@section('infoempleado')
	{{-- expr --}}
	
	
	
	
	<div>
		<ul class="nav nav-pills nav-justified">
			<li role="presentation" class=""><a href="{{ route('empleados.show',['empleado'=>$empleado]) }}"  class="ui-tabs-anchor">Generales:</a></li>

			<li role="presentation" class="active"><a href="{{ route('empleados.datoslaborales.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Laborales:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.estudios.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Estudios:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.emergencias.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Emergencias:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.vacaciones.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Vacaciones:</a></li>

			<li role="presentation" class=""><a href="{{ route('empleados.faltas.index',['empleado'=>$empleado]) }}" class="ui-tabs-anchor">Administrativo:</a></li>
		</ul>
	</div>
	<div class="panel-default">

		<div class="panel-heading"><h5>Laborales:</h5>

		{{-- MODAL --}}
		 <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info " data-toggle="modal" data-target="#formularioTutor">Open Large Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="formularioTutor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position: 0,0 !important; right: -200px;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a large modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

		{{-- MODAL --}}

		</div>
		<div class="panel-body">
			<div class="col-md-12 offset-md-2 mt-3"> 
				<div class="form-group col-xs-3">
					<label class="control-label" for="fechacontratacion">Fecha de contratación:</label>
					
					<dd>{{ $datoslab->fechacontratacion }}</dd>
				</div>



				<div class="form-group col-xs-3">
					<label class="control-label" for="contrato">Tipo de contrato:</label>
					<dd>{{ $contrato }}</dd>
				</div>




                <div class="form-group col-xs-3">
					<label class="control-label" for="area">Área:</label>
					
					<dd>{{ $area }}</dd>
				</div>
				
				<div class="form-group col-xs-3">
					<label class="control-label" for="puesto">Puesto:</label>
					<dd>{{ $puesto }}</dd>
				</div>
				



			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="salarionom">Salario Nóminal:</label>
					<dd>{{ $datoslab->salarionom }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="salariodia">Salario Diario:</label>
					<dd>{{ $datoslab->salariodia }}</dd>
				</div>

				

				<div class="form-group col-xs-3">
					<label class="control-label" for="periodopaga">Periodicidad de Pago:</label>
					<dd>{{ $datoslab->periodopaga }}</dd>
				</div>
			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="prestaciones">Prestaciones:</label>
					<dd>{{ $datoslab->prestaciones }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="regimen">Régimen de Contratación:</label>
					<dd>{{ $datoslab->regimen }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="hentrada">Hora de Entrada:</label>
					<dd>{{ $datoslab->hentrada }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="hsalida">Hora de Salida:</label>
					<dd>{{ $datoslab->hsalida }}</dd>
				</div>
			</div>
			<div class="col-md-12 offset-md-2 mt-3">
				<div class="form-group col-xs-3">
					<label class="control-label" for="hcomida">Tiempo de Comida:</label>
					<dd>{{ $datoslab->hcomida }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="lugartrabajo">Lugar de Trabajo:</label>
					<dd>{{ $datoslab->lugartrabajo }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="banco">Banco:</label>
					<dd>{{ $datoslab->banco }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="cuenta">Cuenta:</label>
					<dd>{{ $datoslab->cuenta }}</dd>
				</div>
				<div class="form-group col-xs-3">
					<label class="control-label" for="clabe">CLABE:</label>
					<dd>{{ $datoslab->clabe }}</dd>
				</div>
			</div>
			<a class="btn btn-info btn-md" href="{{ route('empleados.datoslaborales.edit',['empleado'=>$empleado,'datoslaborale'=>$datoslab]) }}">
				<strong>Editar</strong>
			</a>
		</div>
	</div>
@endsection