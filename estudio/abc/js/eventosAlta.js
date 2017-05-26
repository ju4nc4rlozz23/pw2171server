// $ = jquery - son equvalentes

var iniciaApp = function(){
	// alert("Hola App :D");

	//Funcionalidad
	var valida = function(){
		//Obtener datos
	var usuario = $("#txtUsuario").val();
	var clave   = $("#txtClave").val();
		
	var parametros = "opcion=valida"+
		             "&usuario="+usuario+
	                 "&clave="+clave;
		
		//Validamos que no esten vacíos
		if(usuario!="" && clave!="")
		{
			//Hacemos la petición remota
			$.ajax({
				cache:false,
				type:"POST",
				url: "php/datos.php",
				dataType:"json",
				data:parametros,
				success: function(response){
					if(response.respuesta == true){    
						$("#datosUsuario").hide("slow");
						$("nav").show("slow"); 
					}
					else{
						alert("Usuario y/o contraseña incorrectos D:");
					}
				},
				error: function(xhr,ajaxOptions,thrownError){
					alert("Algo murio dentro de ti T:");
				}
			});
		}
		else{
			alert("Usuario y clave necesarios");
		}
	}
	var teclaUsuario = function(tecla){
		if(tecla.which==13){
			$("#txtClave").focus();
		}
	}
	var teclaClave = function(tecla){
		if(tecla.which==13){
			valida();
		}
	}

	//ACCIONES BOTONES MENU
	var Altas = function(){
		//Mostrar cuadros de texto para ingresar datos
		$("h2").html("Alta de usuarios");
		$("#artConsultas").hide("slow");
		$("#artAcciones").show("slow");

		$("#inAcciones").show("slow");

		$("#artAcciones > button").hide();
		$("#btnGuardar").show();
	}


	//ACCIONES BOTONES ACCION 
	var Guardar = function(){
		var usuario   = $("#txtUsuarioNombre").val(); 
		var nombre    = $("#txtNombre").val();
		var clave     = $("#txtClaveNombre").val();
		var depto     = $("#txtDepartamento").val();
		var vigencia  = $("#txtVigencia").val();
		
		if(usuario!="" && nombre!="" && clave!="" && depto!="" && vigencia!="")
		{
			//Parámetros para el ajax
			var parametros = "opcion=guardar"+
							 "&usuario="+usuario+
							 "&nombre="+nombre+
							 "&clave="+clave+
							 "&departamento="+depto+
							 "&vigencia="+vigencia;
			$.ajax({
				cache:false,
				type:"POST",
				dataType:"json",
				url:"php/datos.php",
				data:parametros,
				success:function(response){
					if(response.respuesta == true){
						alert("Usuario registrado");
						$("#artAcciones > input").val("");
						$("#inAcciones > input").val("");
					}
					else
						alert("Usuario no registrado y/o duplicado");
				},
				error:function(xhr,ajaxOptions,thrownError){
					alert("No se pudo conectar al servidor");
				}
			});
		}
		else
			alert("Todos los campos son obligatorios");

	}

	
	//Sección de declaración de eventos
	$("#btnEntrar").on("click",valida);
	$("#txtUsuario").on("keypress", teclaUsuario);
	$("#txtClave").on("keypress", teclaClave);

	//BOTONES MENU
	$("#btnAltas").on("click",Altas);

	//BOTONES ACCION
	$("#btnGuardar").on("click",Guardar);

}

$(document).ready(iniciaApp);