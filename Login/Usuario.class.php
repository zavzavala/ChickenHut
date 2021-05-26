<?php

class Usuario{

    public function login($email, $senha){
        global $pdo;
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();

           $_SESSION['iduser'] = $dado['id_usuarios'];

           //$_SESSION['iduser'] = $dado['posto'];

           return true;
        }else{
            return false;

        }
    }
    public function logged($id){

        global $pdo;

        $array = array();

        $sql = "SELECT * FROM usuarios, posto WHERE usuarios.id_posto = posto.id_posto and usuarios.id_usuarios = :id_user";
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