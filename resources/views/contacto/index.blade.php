@extends('layouts.infocliente')
	@section('cliente')
					<ul role="tablist" class="nav nav-tabs nav-pills nav-justified">
						<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="#tab1">Dirección Fiscal:</a></li>
						<li class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"><a href="#tab2">Dirección Fisica:</a></li>
						<li class="active"><a href="#tab3" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Contacto:</a></li>
						<li role="presentation" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab3" role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-3">Datos Generales:</a></li>
					</ul>
					<div class="panel-default">
							<h2><span class="label label-default">Datos Contactos:</span></h2>
							@if (count($contactos) == 0)
								<p>Aún no tienes contactos</p>
							@endif
							@if (count($contactos) !=0)
							<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
									<thead>
										<tr class="info">
											<th>Nombre del contacto</th>
											<th>Puesto</th>
											<th>Area</th>
											<th>telefono:</th>
											<th>Operaciones</th>
										</tr>
									</thead>
									@foreach ($contactos as $contacto)
										<tr class="active">
											<td>{{ $contacto->nombre }} {{$contacto->apater}} {{$contacto->amater}}</td>
											<td>{{$contacto->puesto}}</td>
											<td>{{$contacto->area}}</td>
											<td>{{$contacto->telefonodir}}</td>
											<td>
												<a class="btn btn-success btn-sm" href="">Ver</a>
												<a class="btn btn-info btn-sm" href="">Editar</a>
										</tr>
											</td>
										</tbody>
									@endforeach
								</table>
							@endif
							<a type="button" class="btn btn-sm btn-success" href="{{ route('clientes.contacto.create',['cliente'=>$personal]) }}">Agregar</a>
      	</div>

		@endsection