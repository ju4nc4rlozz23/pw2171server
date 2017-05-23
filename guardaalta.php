<?php 
	//Noche de pasión haciendo código <3 
	require("utilerias.php"); //agarra el codigo que esta en utileria y lo ... el require si hay alguna funcion que se encuentre en utilerias lo va a buscar ahi y lo va a utilizar 
 							  //el require solo usa lo que es necesario que se encuentre en utilerias y ahorras bytes, el include no, agarra todo. Require solo usa una parte del codigo. (OPTIMIZA PERO TRUENA)
	$conexion=conecta(); //servidor y bd
	$u=GetSQLValueString($_POST["txtUsuario"],"text");
	$n=GetSQLValueString($_POST["txtNombre"],"text");
	$c=GetSQLValueString(md5($_POST["txtClave"]),"text");
	$d=GetSQLValueString($_POST["txtDepto"],"int");
	$v=GetSQLValueString($_POST["txtVigencia"],"int");

	//Validar que no sea repetido el usuario
	$repetido=sprintf("select usuario from usuarios where usuario=%s",$u);
	$respuesta=mysql_query($repetido);
	if(mysql_num_rows($respuesta)>0)
	{
		print("Usuario repetido D:");
		return;
	}

	//Esta consulta está mal ¿Por qué? 
	//insercion parcial permite solo llenar los campos necesarios (osea que sea null o autoincremental)
	//insert into usuarios(usuario,nombre,clave,departamento,vigencia) values("juan","juan carlos","1233",100,1); esta funcion jala
	$consulta=sprintf("insert into usuarios values(default,%s,%s,%s,%d,%d)",$u,$n,$c,$d,$v); 
	//para ejecutar la consulta
	mysql_query($consulta);
	//¿como saber si se insertó, o no?
	if(mysql_affected_rows()>0){
		print("Usuario agregado: You did good");
	}
	else{
		print("Usuario no agregado: You didn't good");
	}


 ?>