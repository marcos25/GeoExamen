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
	$tipo = $_REQUEST['tipo'];
	$idex = $_REQUEST['idex'];
      $sql = "SELECT * FROM usuarios where ID='$id'";
	$rs=mysqli_query($con,$sql);
  $row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
    $count = mysqli_num_rows($rs);
	
if ($pass != $pass2){
    echo "Las contraseñas no coinciden, intente de nuevo...";
    exit;
}
 
  
   
 
$query="UPDATE usuarios SET Password = '$pass'  WHERE ID = '$id'";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Usuario guardado correctamente.</div>";

echo "<br><div class=head1><a href=../nvo/all-students.php>Regresar</a></div>";
if($tipo == 2){
    header("location: ../nvo/all-students.php?id=".$idex); 
}

?>

</body>
</html>

