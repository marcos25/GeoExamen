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
     

//Se actualiza el estado del usuario correspondiente de 0 a 1, lo cual siginica que su registro fue aceptado por un admin.
$query="UPDATE usuarios SET Estado = '1' WHERE ID = '$id'";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Usuario guardado correctamente.</div>";

echo "<br><div class=head1><a href=../nvo/data-table.php>Regresar</a></div>";
header("location: ../nvo/data-table.php"); 

?>
</body>
</html>

