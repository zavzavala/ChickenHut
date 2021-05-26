<?php

class admin{

    public function login($admail, $adsenha){
        global $pdo;
        $sql = "SELECT * FROM usuarios WHERE nome = :email AND senha = :senha AND tipo ='Admin' limit 1";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $admail);
        $sql->bindValue("senha", MD5($adsenha) );
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();

           $_SESSION['idadmin'] = $dado['id_usuarios'];

           return true;
        }else{
            return false;

        }
    }
    public function logged($id){

        global $pdo;

        $array = array();

        $sql = "SELECT * FROM usuarios WHERE id_usuarios = :id_user";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("id_user", $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }
        return $array;
    }
}




?>