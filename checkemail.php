<?php

//CONNECT TO PDO

require 'php/pdoconnection.php';
//CHECH IF USERNAME EXISTS
if (isset($_POST))
{
    $emailposted=$_POST["email"];

    // Validate email
if (!filter_var($emailposted, FILTER_VALIDATE_EMAIL) === false) {

$activito=2;
try {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare('SELECT COUNT(*) name FROM usuarios WHERE Correo = :email');
    $stmt->execute(array('email' => $emailposted));
    $numdefilas = $stmt->fetchColumn();

    }
 catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

if ($numdefilas==0)
{
 echo "<div class='alert alert-success '><i class='fa fa-check'></i> Email disponible</div> <input id='emailchecker' type='hidden' value='1' name='emailchecker'>  ";
}
 else {
    echo "<div class='alert alert-danger '><i class='fa fa-close'></i> Email NO disponible <input id='emailchecker' type='hidden' value='0' name='emailchecker'></div>";
}
} else {
    echo("<div class='alert alert-danger '><i class='fa fa-close'></i> $emailposted, No es un email válido <input id='emailchecker' type='hidden' value='0' name='emailchecker'></div>");
}
}
