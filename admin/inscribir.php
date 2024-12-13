<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>User Signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php

extract($_POST);
include("../database.php");
	$id = $_REQUEST['id'];
	$ida = $_REQUEST['id1'];
    

 

//Consulta para encontrar nombre del alumno correspondiente
$query= "SELECT * from usuarios WHERE ID = '$id'";
$rs2=mysqli_query($con,$query)or die("Could Not Perform the Query");
$mostrar=(mysqli_fetch_array($rs2));
$nom_al = $mostrar['Nombre'];

//consulta para encontrar el nombre del examen correspondiente
$query= "SELECT * from examen WHERE IDExamen = '$ida'";
$rs2=mysqli_query($con,$query)or die("Could Not Perform the Query");
$mostrar=(mysqli_fetch_array($rs2));
$nom_ex = $mostrar['TestName'];

//Insertamos los dato en la tabla de inscripciones
$query= "INSERT into inscripciones(nombre_alumno,expediente_alumno,nombre_examen,IDExamen) values ('$nom_al','$id','$nom_ex','$ida')";
$rs2=mysqli_query($con,$query)or die("Could Not Perform the Query");
$mostrar=(mysqli_fetch_array($rs2));
$nom_ex = $mostrar['TestName'];





echo "<br><br><br><div class=head1>Usuario guardado correctamente.</div>";

echo "<br><div class=head1><a href=alumnos_gestion.php>Regresar</a></div>";

header("location: ../nvo/inscribir_examen.php?idex=".$ida); 

?>
</body>
</html>

