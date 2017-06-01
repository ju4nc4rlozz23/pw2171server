var iniciaApp = function(){
	//alert("Hola App");
	var entrar=function(){
		var usuario=$("#txtUsuario").val();
		var clave=$("#txtClave").val();
		//estos parametros se pasaron al php
		var parametros="opcion=valida"+
						"&usuario="+usuario+
						"&clave="+clave+
						"&id="+Math.random();

		var validaEntrada = $.ajax({
			method:"POST",
			url:"php/datos.php", //le solicitamos a esta ruta
			data:parametros,  //estos datos
			dataType:"json" //y recibimos un json  


		});	
		//done sustituye al success
		validaEntrada.done(function(data){
			// alert(data.respuesta); 
			if(data.respuesta==true){
				$("#datosUsuario").hide();
				$("nav").show("slow");
			}
			
		});

		validaEntrada.fail(function(jqError,textStatus){
			alert("Solicitud fallida: "+textStatus);
		});

	}
	var teclaUsuario=function(tecla){
		if(tecla.which==13){
			$("#txtClave").focus();
		}
	}
	var teclaClave=function(tecla){
		if(tecla.which==13){
			entrar();
		}
	}
	//seccion de declaracion de eventos
	$("#btnEntrar").on("click",entrar);
	$("#txtUsuario").on("keypress",teclaUsuario);
	$("#txtClave").on("keypress",teclaClave);
}
$(document).ready(iniciaApp);
