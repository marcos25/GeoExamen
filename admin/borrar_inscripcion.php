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
	$idex = $_REQUEST['idex'];
    
	

echo $idex;
//Borramos las inscripciones correspondientes. 
$query="DELETE from inscripciones WHERE IDExamen = '$idex' and expediente_alumno = '$id'";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Usuario guardado correctamente.</div>";
header("location: ../nvo/alumnos_inscritos.php?id=".$idex); 

?>
<?php

?>
</body>
</html>

