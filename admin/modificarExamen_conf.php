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
	
      $sql = "SELECT * FROM examen where IDExamen='$id'";
	$rs=mysqli_query($con,$sql);
  $row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
    $count = mysqli_num_rows($rs);
	
 
 
$query="UPDATE examen SET  TestName = '$name', Lugar = '$lugar', Fecha = '$fecha', HInicio = '$h_inicio', HFinal = '$h_fin',PassExamen='$passex' WHERE IDExamen = '$id'";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Examen guardado correctamente.</div>";

echo "<br><div class=head1><a href=../nvo/departments.php>Regresar</a></div>";
if($tipo == 2){
    header("location: ../nvo/departments.php"); 
}
header("location: ../nvo/departments.php"); 
?>

</body>
</html>

