<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Examen agregar</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php

extract($_POST);
require("../database.php");

//Consulta para obtener la cantidad de preguntas activas 
$query2="SELECT * FROM reactivos WHERE estado = '1'";
$rs2=mysqli_query($con,$query2)or die("error al conectarse a base de datos...");
$reactivosTotales = mysqli_num_rows($rs2) ;

//Insertamos los datos solo si hay suficientes reactivos.
if ($nre <= $reactivosTotales){
	$query3="insert into examen(TestName,AdminID,Lugar,Fecha,HInicio,HFinal,PassExamen,Estado,nReactivos)values ('$name','3','$lugar','$fecha','$h_inicio','$h_fin','$passex','1','$nre')";
	$rs3=mysqli_query($con,$query3)or die("no se registro error error");
	echo "<p align=center>Examen <b>\"$testname\"</b> agregado correctamente.</p>";
}


$rand = range(1, 13);
$contador = 4;
//Buscamos el examen creado
$sql = "SELECT * From examen WHERE TestName='$name' and Estado = '1' and nReactivos = '$nre' and Lugar = '$lugar' and PassExamen = '$passex'";
$result = mysqli_query($con,$sql);
$mostrar2=mysqli_fetch_array($result);
$idex = $mostrar2['IDExamen'];
unset($_POST);

//Buscamos reactivos al azar para crear el examen
$sql = "SELECT * FROM reactivos WHERE estado = '1' ORDER BY RAND() LIMIT $nre";
$result = mysqli_query($con,$sql);


//Se revisa si hay suficientes reactivos para crear el examen deseado.
if ($nre <= $reactivosTotales){
	while($mostrar=(mysqli_fetch_array($result))){
		$idr = $mostrar['IDReactivo'];
		$query3="insert into reactivosExamen(IDReactivo,IDExamen)values ('$idr','$idex')";
		$rs3=mysqli_query($con,$query3)or die("no se registro error error");
		

	
	}
			
}
else{
	echo "<p align=center>No hay suficientes reactivos.</p>";
	
	
}
	
header("location: ../nvo/departments.php"); 


echo "<br><div class=head1><a href=../nvo/add-department.php>Clic aquí para regresar regresar</a></div>";

?>
</body>
</html>


