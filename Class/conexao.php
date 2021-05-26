<?php
$host="localhost";
$user="root";
$db="king";
$pass="";

$mysqli = new mysqli($host, $user, "", $db);
//$mysqli->exec('SET CHARACTER SET utf8');
if($mysqli->connect_errno){

    echo " Falha na conexao com banco de dados: (".$mysqli->connect_errno.")" .$mysqli->error;
    
    }
    error_reporting(E_ALL);

//mysqli_close($mysqli);

?>