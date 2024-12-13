<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>User Signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php

include("../database.php");

	$idr = $_REQUEST['idr'];
      

 
$query2 = "SELECT * FROM reactivosExamen WHERE IDReactivo ='$idr'";
$result2 = mysqli_query($con,$query2);


//Ciclo para disminuir el número de reactivos de todos los examenes que tenian al reactivo elimindado
 while($mostrar = mysqli_fetch_array($result2)){
	 $idx = $mostrar['IDExamen'];
	 echo $idx;
	 $sql = "SELECT * FROM examen WHERE IDExamen = '$idx'";
	 $result0 = mysqli_query($con,$sql)or die("No se encontró el examen");
	 $mostrar_n = mysqli_fetch_array($result0);
	 $nr = $mostrar_n['nReactivos'] - 1;
	 $sql = "UPDATE examen SET nReactivos = '$nr' WHERE IDExamen = '$idx'";
	 $result0 = mysqli_query($con,$sql)or die("No se pudo actualizar el número de reactivos del examen");
	 
 }  
 
 //Borramos los incisos que pertenecian al reactivo eliminado.
$query="DELETE FROM incisos WHERE IDReactivo = '$idr' ";
$rs=mysqli_query($con,$query)or die("No se pudo borrar en incisos");
//Borramos la asociación del reactivo con los examenes.
$query="DELETE FROM reactivosExamen WHERE IDReactivo = '$idr' ";
$rs=mysqli_query($con,$query)or die("No se pudo borrar en reactivosExamen");
//Eliminamos el reactivo.
$query="DELETE FROM reactivos WHERE IDReactivo = '$idr' ";
$rs=mysqli_query($con,$query)or die("No se pudo borrar en reactivos");

echo "<br><br><br><div class=head1>Reactivo borrado correctamente.</div>";



header("location: ../nvo/lista_reactivos.php"); 


?>

</body>
</html>

