/************************************************************************************************/
/************************************************************************************************/
/*@autor: Rocker
*@summary: Script que define los comportamientos de la aplicacin web.
*@date: 20121219
*/
/************************************************************************************************/
/************************************************************************************************/

$(document).on('ready', startScript);

/*Funcion que inicia la ejecucion del script, una vez se han cargado todos los elementos del DOM.*/
function startScript(){

	/*Metodo que configura de manera adecuada los botones de redreccion presentes en la grilla de redireccion del modulo de la secretaria.*/
	objSecretaria.configurarBtnRedireccion();


	/*Handler del evento 'click' sobre algun boton de redireccion presente en 'secretaria/solicitudes/admin'*/
	$(".botones_redireccion").on('click', function(){
		objSecretaria.redireccionarSolicitud(this);
	});



	/*Deshabilitamos el espacio donde se visualiza la respuesta dada por el responsable.
	* Este elemento se encuentra en el modulo 'preguntas', controlador 'respuestas', vista 'update/_form'
	*/
	$("#preguntas_descripcion").attr('disabled', true);

	/*Instruccion que se encarga de actualizar las grillas de datos necesarias.*/
	//window.setInterval("refreshGrids()", 5000);	
}

/*refreshGrids = function(){
	$.fn.yiiGridView.update('solicitudes-grid', {
		data: $(this).serialize(),
	});	
	window.clearInterval(8000);
},*/










/******************************************************************************************************************************************/
/******** Objeto literal encargado de todo el trabajo con los elementos presentes en el modulo 'secretaria' ****************************/
objSecretaria = {
	/*@summary: Metodo que permite definir el atributo 'id' de cada boton de redirrecion asociando éste al id de la solicitud a modificar.*/
	configurarBtnRedireccion: function(){		
		arr_prioridades = $(".prioridades");//Obtenemos el arreglo de elementos 'select'. Util para saber el tamaño y codigos de las solicitudes

		arr_botones_redireccion = $(".botones_redireccion");//Capturamos todos los botones de redireccion.

		for(var i = 0; i<arr_prioridades.length; i++){
			arr_botones_redireccion[i].id = arr_prioridades[i].id.split('_', 1)+'_btnredireccion';
		}
	}, 

	/*@summary: Metodo encargado de realizar la actualizacion de la solicitud seleccionada mediante su respectivo boton de redireccion.*/
	redireccionarSolicitud: function(obj){
		var id_solicitud = obj.id.split('_', 1);//Solo capturamos el numero que acompaña el valor del 'id' del boton de redireccion oprimido. Este numero es igual al 'id' de la solicitud a actualizar

		/*Variables que almacenaran los valores a actualizar.*/
		var txt_prioridad    = $("#"+id_solicitud+"_txtprioridad").val();
		var txt_categoria    = $("#"+id_solicitud+"_txtcategoria").val();
		var txt_destinatario = $("#"+id_solicitud+"_txtdestinatario").val();

		if(txt_destinatario != ""){
			var json_datos_solicitud = '{"idSolicitud":"'+id_solicitud+'","idPrioridad":"'+txt_prioridad+'","idCategoria":"'+txt_categoria+'","idUsuario_destino":"'+txt_destinatario+'"}';

			$.ajax({
				dataType: "html",
				type: 'post',
				url: "http://192.168.0.171/AppSolicitudes/index.php?r=secretaria/solicitudes/ajaxActualizarSolicitud",
				//url: "http://localhost/AppSolicitudes/branches/0.7/index.php?r=secretaria/solicitudes/ajaxActualizarSolicitud",
				data: 'data='+json_datos_solicitud,
				success: function(data){
					alert("Exito!");
				}, 
				error: function(data){
					alert(data.responseText);
				}
			});
		}
		else{
			alert("Debe seleccionar un destinatario!! :(");
		}		
	},
}
/********************************************************************************************************************************************/