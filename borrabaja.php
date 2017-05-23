<?php 
	include("utilerias.php");
	$conexion=conecta(); //servidor y bd
	$u=GetSQLValueString($_GET["txtUsuario"],"text"); //get para conseguirlo desde la URL?
	$consulta=sprintf("delete from usuarios where usuario=%s",$u);
	mysql_query($consulta);

	if(mysql_affected_rows()>0){
		print("Usuario agregado: You did good");
	}
	else{
		print("Usuario no agregado: You didn't good");
	}
 ?>

