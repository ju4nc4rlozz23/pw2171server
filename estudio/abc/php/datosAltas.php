<?php
	require("utilerias.php");

	function valida(){
		$respuesta = false;	
		$conexion=conecta();

		$u = GetSQLValueString($_POST["usuario"],"text");
		$c = GetSQLValueString(md5($_POST["clave"]),"text");

		$consulta  = sprintf("select usuario,clave from usuarios where usuario=%s and clave=%s limit 1", $u, $c);

		$resultado = mysql_query($consulta);
		
		if(mysql_num_rows($resultado)>0){
			$respuesta = true;
		}
		$arregloJSON = array('respuesta' => $respuesta );
		print json_encode($arregloJSON);
	}

	function alta(){
		$respuesta = false;
		$conexion=conecta();

		$u = GetSQLValueString($_POST["usuario"],"text");
		$n = GetSQLValueString($_POST["nombre"],"text");
		$c = GetSQLValueString(md5($_POST["clave"]),"text");
		$d = GetSQLValueString($_POST["departamento"],"int");
		$v = GetSQLValueString($_POST["vigencia"],"int");
		
		$repetido= sprintf("select usuario from usuarios where usuario=%s", $u); //En el select devuelve un dataset
		$duplicado= mysql_query($repetido);
		if(mysql_num_rows($duplicado)>0){
			$arregloJSON = array('respuesta' => $respuesta );
			print json_encode($arregloJSON);
			return;
		}

		$consulta = sprintf("insert into usuarios values(default,%s,%s,%s,%d,%d)",$u,$n,$c,$d,$v);
		mysql_query($consulta);
		//Si el registro se insertó
		if(mysql_affected_rows()>0) {
			$respuesta = true;
		}
		$arregloJSON = array('respuesta' => $respuesta );
		print json_encode($arregloJSON);
	}

	

	//Menú principal
	$opcion=$_POST["opcion"];
	switch ($opcion) {
		case 'valida':
			valida();
			break;
		case 'alta':
			alta();
			break;
		default:
			# code...
			break;
	}
?>