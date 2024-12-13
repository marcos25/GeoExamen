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

//Guardamos los datos obtenidos del formulario.
$id = $_REQUEST['id'];
$sql = "SELECT * FROM usuarios where ID='$lid'";
$sql2 = "SELECT * FROM usuarios where ID='$id'";
$rs=mysqli_query($con,$sql);
$rs2=mysqli_query($con,$sql2);
mysqli_data_seek($rs2,0);
$datos= mysqli_fetch_row($rs2);
$clase = $datos[4];
//Contador para revisar si el expediente ya esta registrado.
$count = mysqli_num_rows($rs);

//Verificamos si otro usuario ya tiene el expediente
if($count>0 && $lid != $id)
{	
	
	echo "<br><br><br><div class=head1>El expediente ingresado ya pertenece a otro alumno</div>";
	
	if($clase == 1){
		echo "<br><div class=head1><a href=../nvo/edit-professor.php?id=$id>Regresar</a></div>";
	}
	if($clase == 0){
		echo "<br><div class=head1><a href=../nvo/edit-student.php?id=$id>Regresar</a></div>";
	}
	exit;
}
 
  
   
 
$query="UPDATE usuarios SET ID = '$lid', Nombre = '$name', Correo = '$email' WHERE ID = '$id'";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Usuario guardado correctamente.</div>";

echo "<br><div class=head1><a href=../nvo/index.php>Regresar</a></div>";
if($clase == 1){
	header("location: ../nvo/all-professors.php"); 
}
if($clase == 0){
	header("location: ../nvo/all-students.php"); 
}

?>

</body>
</html>

