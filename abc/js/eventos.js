var iniciaApp = function(){
	//alert("Hola App");
	var entrar=function(){
		alert($("#txtUsuario").val());
		alert($("#txtClave").val());
		$("#perro").show();

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
	var datos=function(){
		$.get('datos.php', function(data) {
       		eval(data);
    	});
	}
	//seccion de declaracion de eventos
	$("#btnEntrar").on("click",entrar);
	$("#txtUsuario").on("keypress",teclaUsuario);
	$("#txtClave").on("keypress",teclaClave);
	$("#btnAltas").on("click",datos);
}
$(document).ready(iniciaApp);
