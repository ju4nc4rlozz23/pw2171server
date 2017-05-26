<?php 
	require("utilerias.php");

	function valida(){
		$respuesta=false;
		$conexion=conecta();
		$u=GetSQLValueString($_GET["usuario"],"text");
		$c=GetSQLValueString(md5($_GET["clave"]),"text");
		$consulta=sprintf("select usuario,clave from usuarios where usuario=%s and clave=%s limit 1",$u,$c);

		$resultado=mysql_query($consulta);
		if(mysql_num_rows($resultado)>0){
			$respuesta=true;
		}
						     //llave JSON .. Valor PHP
		$salidaJSON = array('respuesta' => $respuesta );
		print(json_encode($salidaJSON)); //Es un array por que hay que convertirlo, el print de esta manera lo convierte en respuesta
	



	}

	//HACER LAS FUNCIONES DE ALTA BAJA Y CONSULTA

	//MENÚ PRINCIPAL
	//Menú principal
	$opcion = $_GET["opcion"];
	switch ($opcion) {
		case 'valida':
			valida();
			break;
		case 'guarda':
			guarda();
			break;
		case 'borra':
			borra();	
			break;

		case 'cambia' :
			CambiaUsuario();
			break;

		case 'consulta' :
			ConsultaUsuario();
			break;
		
		default:
			# code...
			break;
	}
 ?>