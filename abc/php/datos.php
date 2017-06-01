<?php 
	require("utilerias.php");

	function valida(){
		$respuesta=false;
		$conexion=conecta();
		$u=GetSQLValueString($_POST["usuario"],"text");
		$c=GetSQLValueString(md5($_POST["clave"]),"text");
		$consulta=sprintf("select usuario,clave from usuarios where usuario=%s and clave=%s limit 1",$u,$c);

		$resultado=mysql_query($consulta);
		if(mysql_num_rows($resultado)>0){
			$respuesta=true;
		}
						     //llave JSON .. Valor PHP
		$salidaJSON = array('respuesta' => $respuesta );
		print(json_encode($salidaJSON)); //Es un array por que hay que convertirlo, el print de esta manera lo convierte en respuesta
	}

	//Codigo CC
	//Mi4wMDJ8fDE0OTU1NzA5NDE4NjY7MTQ5NTU3MDk0MTg2NjsxNDk1NjYwMDM0NzA0O2p1NG5jNHJsb3p6fMOnwr3CpAZ8NTMxMzYwLjEwNDE5NTI4Nzk7ODcwMjE2MzYuMTA0MjI1NTU7NjY3Mjs0OzMwMTU5ODIyLjMyMzI2NjYxOzg7MDswOzA7MDswOzA7MDswOzA7NDswOzA7MDswOzA7MDs7MDswOzA7MDswOzA7MDstMTstMTstMTstMTstMTswOzA7MDswOzUwOzA7MDt8NzMsNzMsNDQzMzM3NSwwOzU3LDU4LDY0OTE3NDIsMDs0OCw0OCw5ODc1MzY1LDA7MjcsMjcsMTExMTE5MjUsMDsxOSwxOSwxODAzMjI3NywwOzUsNSw2Njk3NDc3LDA7MCwwLDAsMDswLDAsMCwwOzAsMCwwLDA7MCwwLDAsMDswLDAsMCwwOzAsMCwwLDA7MCwwLDAsMDswLDAsMCwwO3zDp8K/wrDDp8K/wr/Dp8KPwqDDpMKAwoDDpMKDwq/DpsKqwqDDpMKMwoDDpMKAwoDDpMK/woDDpMKAwoDDpMKAwo/DpsKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKowoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDpMKAwoDDocKAwoB8w6fCsMKAw6TCvsKAw6TCu8Knw6XCicKAw6TCgMKEw6TCqsKAw6TCgMKQw6TCgMKAw6TCgMKAw6TCgsKAw6TCgMKAw6TChMKAw6TCsMKAw6TCgMKAw6TCgMKgw6TCgMKAw6TCgMKAw6TChMKAw6TCgMKA%21END%21

	//MENÚ PRINCIPAL
	$opcion=$_POST["opcion"];
	switch ($opcion) {
		case 'valida':
			valida();
			break;
		
		default:
			# code...
			break;
	}
 ?>



