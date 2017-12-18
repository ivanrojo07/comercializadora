

<meta name="csrf-token" content="{{ csrf_token() }}">


<?php


$size=0;
echo"
<table class='table table-striped table-bordered table-hover' style='color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px'>
			<thead>
				<tr class='info'>
				
					
					<th>Nombre/Razón Social</th>
					<th>Tipo de persona</th>
					<th>Alias</th>
					<th>RFC</th>
					<th>Vendedor</th>
					<th>Operacion</th>
				</tr>
			</thead>
			<tbody>
			";
foreach ($_GET as $get ) {
	
	
	

	$size=strlen($get);	
  



		
        
		foreach($clientes as $personal){
        
        $dato=$personal->tipopersona;

		if ($personal->tipopersona == 'Fisica'){

			$dato=$personal->nombre." ".$personal->apellidopaterno." ".$personal->apellidomaterno;
						 
						}else{
							$dato=$personal->razonsocial;
						}


				compare($size,$personal,$get,$dato);
		

			}

		echo"</tbody></div></table>";
	    
	


      
    
      		
      
	
}

/************************************************************/

/************************************************************/

/*
echo"
<table class='table table-striped table-bordered table-hover' style='color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px'>
			<thead>
				<tr class='info'>
				
					<th>Nombre</th>
					<th>('nombre', 'Nombre/Razón Social')</th>
					<th>Tipo de persona</th>
					<th>Alias</th>
					<th>RFC</th>
					<th>Vendedor</th>
					<th>Operacion</th>
				</tr>
			</thead>
			<tbody>
			";

		foreach($clientes as $personal){
        $dato=$personal->tipopersona;
		if ($personal->tipopersona == 'Fisica'){

			$dato=$personal->nombre." ".$personal->apellidopaterno." ".$personal->apellidomaterno;
						 
						}else{
							$dato=$personal->razonsocial;
						}
				echo"<tr class='active'>
					
					<td>".$personal->nombre."</td>
					<td>".$dato."</td>
					<td>".$personal->tipopersona."</td>
					<td>".$personal->alias."</td>
					<td>".strtoupper($personal->rfc)."</td>
					<td>".$personal->vendedor."</td>
					<td>
			<a class='btn btn-success btn-sm' href=''>
							<i class='fa fa-eye' aria-hidden='true'></i> 
							Ver
							</a>

							<a class='btn btn-info btn-sm' 
							href='giros'>
							<i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar
							</a>
				
				</td>
				</tr>";
		

			}

		echo"</tbody></div></table>";*/




function compare($size,$personal,$get,$dato){

	
		$name=strtolower($personal->nombre);		
        //$razon=strtolower($dato);

				if(substr($name,0,$size)==strtolower($get)){	

				echo"<tr class='active'>
					
					
					<td>".$dato."</td>
					<td>".$personal->tipopersona."</td>
					<td>".$personal->alias."</td>
					<td>".strtoupper($personal->rfc)."</td>
					<td>".$personal->vendedor."</td>
					<td>
			<a class='btn btn-success btn-sm' href=''>
							<i class='fa fa-eye' aria-hidden='true'></i> 
							Ver
							</a>

							<a class='btn btn-info btn-sm' 
							href='giros'>
							<i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar
							</a>
				
				</td>
				</tr>";}




			
	}


		

		?>

