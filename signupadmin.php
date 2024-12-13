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
include("database.php");

      $sql = "SELECT * FROM usuarios where ID='$username' and Estado = '2'";

	$rs=mysqli_query($con,$sql);
  $row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
    $count = mysqli_num_rows($rs);
	if($count>0)
	{
    $query="UPDATE usuarios SET  Nombre = '$name', Correo = '$email', Password = '$pass', Clase = '1',Estado = '1' WHERE ID = '$username'";
    $rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
	echo "<br><br><br><div class=head1>Tu cuenta ha sido creada exitosamente.</div>";
    echo "<br><div class=head1><a href=index.php>Regresar</a></div>";
	exit;
	}
	$sql = "SELECT * FROM usuarios where ID='$username' and Estado = '1'";
	$rs=mysqli_query($con,$sql);
  $row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
    $count = mysqli_num_rows($rs);
    if($count>0)
	{
	echo "<br><div class=head1>Expediente ya registrado, intente con otro....</div>";

    echo "<br><div class=head1><a href=signup.php>Regresar</a></div>";
	exit;
	}
		$sql = "SELECT * FROM usuarios where ID='$username' and Estado = '0'";
	$rs=mysqli_query($con,$sql);
  $row = mysqli_fetch_array($rs,MYSQLI_ASSOC);
    $count = mysqli_num_rows($rs);
    if($count>0)
	{
	echo "<br><div class=head1>Expediente ya registrado, intente con otro....</div>";

    echo "<br><div class=head1><a href=signup.php>Regresar</a></div>";
	exit;
	}

$query="insert into usuarios(ID,Nombre,Correo,Password,Clase,Estado) values('$username','$name','$email','$pass','1','1')";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query1");
echo "<br><div class=head1>La cuenta ha sido creada exitosamente.</div>";

   echo "<br><div class=head1><a href=nvo/index.php>Regresar</a></div>";
?>
</body>
</html>


