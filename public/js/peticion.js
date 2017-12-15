$(obtener_registros());

function obtener_registros(busqueda)
{
	
	$.ajax({
		url : 'result.php',
		type : 'POST',
		dataType : 'html',
		data : { busqueda: busqueda },
		})

	.done(function(resultado){
		$("#datos").html(resultado);
	})
}

$(document).on('keyup', '#query', function()
{

	var valor=$(this).val();
	
	
	if (valor!="")
	{
		obtener_registros(valor);
	}
	else
		{
			obtener_registros();
			
		}
});