<?php

$db_host = "localhost";

$db_username = "root";

$db_pass = "";

$db_name = "geodb";

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name,$db_username,$db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


?>