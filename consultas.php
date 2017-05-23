<?php 
	include("utilerias.php");
	$conexion=conecta();
	$consulta=sprintf("select * from usuarios order by usuario");
	$resultado=mysql_query($consulta);
	$tabla="<table border=1>";
	$tabla.="<tr>";
	$tabla.="<th>Usuario</th>";
	$tabla.="<th>Nombre</th>";
	$tabla.="<th>Departamento</th>";
	$tabla.="<th>Vigencia</th>";
	$tabla.="<th>Acción</th>";
	$tabla.="<th>Acción</th>";
	$tabla.="</tr>";
	//resultado es un dataset (por si mismo no lo podemos, tenemos que convertirlo a un array asociativo)
	if(mysql_num_rows($resultado)>0){ //Hay registros
		while($registro=mysql_fetch_array($resultado)){
			//va a intentar sacar de resultado un registro e intentar convertirlo a un ...
			//print($registro["usuario"]."<br>");
			$tabla.="<tr>";
			$tabla.="<td>".$registro["usuario"]."</td>";
			$tabla.="<td>".$registro["nombre"]."</td>";
			$tabla.="<td>".$registro["departamento"]."</td>";
			$tabla.="<td>".$registro["vigencia"]."</td>";
			//$tabla.="<td><a href='borrabaja.php?txtUsuario=".$registro["usuario"]."'>Baja</a></td>";
			$tabla.="<td><a href='borrabaja.php?txtUsuario=".$registro["usuario"]."'>Baja</a>";
			$tabla.="<td><a href='cambio.php?txtUsuario=".$registro["usuario"]."'>Cambios</a>";
			$tabla.="</tr>";

		}
	}
	else{
		$tabla.="<tr><td colspan=5>Sin Registros</td></tr>";
	}
	$tabla.="</table>";
	print($tabla);
 ?>