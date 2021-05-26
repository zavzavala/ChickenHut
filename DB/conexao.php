<?php
$host="localhost";
$user="root";
$db="king";
$pass="";

$mysqli = new mysqli($host, $user, "", $db);

if($mysqli->connect_errno){

echo " Falha na conexao com banco de dados: (".$mysqli->connect_errno.")" .$mysqli->error;

}
?>