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
	$idex = $_REQUEST['idex'];
	$idr = $_REQUEST['idr'];
      

 
  
//Eliminamos la relación entre el reactivo y el examen.
$query="DELETE FROM reactivosExamen WHERE IDReactivo = '$idr' and IDExamen = '$idex'";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");

//Proceso para disminuir la cantidad de reactivos del examen debido al reactivo quitado.
$query2 = "SELECT * FROM examen WHERE IDExamen ='$idex'";
$result2 = mysqli_query($con,$query2);
mysqli_data_seek($result2,0);
$examen = mysqli_fetch_row($result2);
$npreg = $examen[2];
$npreg = $npreg-1;
echo $npreg;
$query= "UPDATE examen SET nReactivos='$npreg' WHERE IDExamen='$idex'";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Reactivo borrado correctamente.</div>";



echo "<script language=Javascript> location.href=\"../nvo/gestion_reactivos.php?id=$idex\"; </script>";


?>
</body>
</html>

