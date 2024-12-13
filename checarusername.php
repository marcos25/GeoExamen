<?php

//CONNECT TO PDO

require 'php/pdoconnection.php';
//CHECH IF USERNAME EXISTS
if (isset($_POST))
{
    $usernameposted=$_POST["username"];
    if (strlen($usernameposted)<4) {
    }
    else {
 try {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $db->prepare('SELECT COUNT(*) username FROM usuarios WHERE ID =:username and (Estado =1 or Estado=0)');
    $stmt->execute(array('username' => $usernameposted));
    $numdefilas = $stmt->fetchColumn();


    }
 catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

if ($numdefilas==0)
{
 echo "<div class='alert alert-success '><i class='fa fa-check'></i> Nombre de usuario disponible</div><input id='usernamechecker' type='hidden' value='1' name='usernamechecker'>";
}
 else {
    echo "<div class='alert alert-danger'><i class='fa fa-close'></i> Nombre de usuario NO disponible<input id='usernamechecker' type='hidden' value='0' name='usernamechecker'></div>";
}
}
}