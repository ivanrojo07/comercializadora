$(buscar_datos());


function buscar_datos(consulta){
	$.ajax({
		url:'\resources\views\contacto'
		type:'POST',
		dataType:'html',
		data:{ consulta:consulta},
	})
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	})

}

$(document).on('keyup', '#query',fucntion(){
	var valor=$(this).val();
	if(valor!=""){
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});