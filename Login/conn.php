<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$banco = "KING";

global $pdo;
try{

    //orientado a objectos com PDO
    $pdo = new PDO("mysql:dbname=".$banco."; host=".$host, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
echo "ERRO: ".$e->getMessage();
exit; 

}
?>