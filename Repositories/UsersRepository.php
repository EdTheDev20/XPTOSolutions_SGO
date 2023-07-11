<?php

require_once('./Model/Cliente.php');
require_once('./Model/Database.php');

class UsersRepository
{

    private $database;

    function __construct()
    {
        $this->database = Database::getInstance();
    }

    public function userLogin($email, $password)
    {
        $statement = $this->database->prepare("SELECT * from tuser WHERE email= :email and password= :password ");
        $statement->bindparam(":email", $email);
        $statement->bindparam(":password", $password);
        $statement->execute();
        $count = $statement->rowCount();

        if($count==1){ 
        $result = $statement->fetchAll();
        foreach($result as $user){
        $_SESSION["id"] = $user['id'];
        $_SESSION["nome"]=$user['nome'];
        $_SESSION["email"] = $user['email'];
        $_SESSION["password"] = $user['password'];
        $_SESSION["fk_tTipoDeUsuario"] = $user['fk_tTipoDeUsuario'];
        $_SESSION["fk_tEstadoConta"] = $user['fk_tEstadoConta'];   }
        $redirect = "Redirecionar";
        return $redirect;
    }
        else {
            $error = "Email ou Palavra Passe incorrecta";
            return $error;
        }
    }

    public function getCliente($id){
    $statement= $this->database->prepare("SELECT * from tuser where id=:id");
    $statement->bindparam(":id", $id);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $user){
    $cliente= new Cliente($user['id'],$user['fk_tTipoCliente'],$user['nome'],$user['email'],$user['morada'],$user['numTel'],$user['username'],$user['password'],$user['fk_prov'],$user['fk_mun'],$user['fk_com'],"null",$user['fk_tTipoDeUsuario'],$user['empresaActividade'],$user['fk_tNacionalidade'],$user['fk_tEstadoConta']);
    }
    return $cliente;
    }


    public function getAdminEmail()
    {
        $statement = $this->database->prepare("SELECT * from tuser where fk_tTipoDeUsuario=1");
        
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $admin) {
            $adminEmail = $admin['email'];
        }
        return $adminEmail;
    }

    public function createNewCliente($nome, $email, $morada, $numTel, $username, $password, $empresaActividade, $fk_prov, $fk_mun, $fk_com, $fk_tTipoCliente, $fk_tNacionalidade, $fk_tTipoDeUsuario, $fk_tEstadoConta)
    {
        try {
            /*
              Columns:
              id int(11) AI PK
              nome varchar(200) *
              email varchar(200) *
              morada varchar(200) *
              numTel varchar(200) *
              username varchar(100) *
              password varchar(200) *
              empresaActividade varchar(300)
              fk_prov int(11)  *
              fk_mun int(11) *
              fk_com int(11) *
              fk_tTipoCliente int(11)
              fk_tNacionalidade int(11)
              fk_tTipoDeUsuario int(11)
              fk_tEstadoConta int(11)
             */
            $stmt = $this->database->prepare("INSERT Into tuser(nome,email,morada,numTel,username,password,empresaActividade,fk_prov,fk_mun,fk_com,fk_tTipoCliente ,fk_tNacionalidade,fk_tTipoDeUsuario,fk_tEstadoConta) VALUES(:nome,:email,:morada,:numTel,:username,:password,:empresaActividade,:fk_prov,:fk_mun,:fk_com,:fk_tTipoCliente,:fk_tNacionalidade,:fk_tTipoDeUsuario,:fk_tEstadoConta)");
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":morada", $morada);
            $stmt->bindparam(":numTel", $numTel);
            $stmt->bindparam(":username", $username);
            $stmt->bindparam(":password", $password);
            $stmt->bindparam(":empresaActividade", $empresaActividade);
            $stmt->bindparam(":fk_prov", $fk_prov);
            $stmt->bindparam(":fk_mun", $fk_mun);
            $stmt->bindparam(":fk_com", $fk_com);
            $stmt->bindparam(":fk_tTipoCliente", $fk_tTipoCliente);
            $stmt->bindparam(":fk_tNacionalidade", $fk_tNacionalidade);
            $stmt->bindparam(":fk_tTipoDeUsuario", $fk_tTipoDeUsuario);
            $stmt->bindparam(":fk_tEstadoConta", $fk_tEstadoConta);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}

