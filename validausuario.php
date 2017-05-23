<?php 

	include("utilerias.php");
	function validausuario($usuario,$clave){
		//debemos conectarnos a la computadora o servidor donde se encuentra la base de datos
		//recibe tres parametros: "computadora","usuario","contraseña"
		// $conexion=mysql_connect("localhost","root",""); //es una buena practica guardar la conexion en una variable para distinguir entre diferentes conexion
		// mysql_select_db("pw2171");	
		$conexion  = conecta();
		$usuario   = GetSQLValueString($usuario,"text");
		$clave     = GetSQLValueString(md5($clave),"text");
		$consulta  = sprintf("select usuario,clave from usuarios where usuario=%s and clave=%s",$usuario,$clave); //sustituye los %s, la primer variable se mete al primer %s y despues la siguiente variable al %s que sigue
		//$consulta  = "select usuario,clave from usuarios where usuario='".$usuario."' and clave='".md5($clave)."' limit 1"; //la concatenacion de cadenas es con el punto "."
		$resultado = mysql_query($consulta);//recordset es el conjunto de registros
		if(mysql_num_rows($resultado)>0){
			print("<a href='alta.php'>Alta</a> <br>");
			print("<a href='baja.php'>Baja</a> <br>");
			print("<a href='cambio.php'>Cambio</a> <br>");
			print("<a href='consultas.php'>Consuta</a> <br>");
			//print("Bienvenido ".$usuario); 
		}
		else{
			print("Usuario y/o contraseña incorrectos"); //importante marcar que los estan mal
		}
	}

	if(isset($_POST["txtUsuario"]) && isset($_POST["txtClave"]))
	{
		$usuario=$_POST["txtUsuario"];
		$clave=$_POST["txtClave"];
		validausuario($usuario,$clave);
		//print($usuario);
		//print($clave);
	}
	else{
		print("<a href='acceso.html'> Valida tus datos</a>");
	}
 ?>

