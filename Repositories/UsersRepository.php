<?php

require_once('./Model/Cliente.php');
require_once('./Model/Database.php');
require_once('./Model/Gestor.php');
class UsersRepository
{

    private $database;

    function __construct()
    {
        $this->database = Database::getInstance();
    }

    public function getGestores(){
        $statement = $this->database->prepare("SELECT * from tuser where fk_tTipoDeUsuario=2;");
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $gestor) {

        $gestores[] = new Gestor($gestor['id'],$gestor['fk_tTipoDeUsuario'],$gestor['nome'],$gestor['email'],$gestor['morada'],$gestor['numTel'],$gestor['username'],$gestor['password'],$gestor['fk_prov'],$gestor['fk_mun'],$gestor['fk_com']);
        }
        return $gestores;

    }
    public function getUserforDashBoard()
    {
        $statement = $this->database->prepare("SELECT 
    tuser.id, tuser.nome, tuser.email, tuser.morada, tuser.numTel, tuser.username, tuser.password, tuser.empresaActividade, tuser.fk_tEstadoConta, tuser.fk_tTipoCliente, tuser.fk_tTipoDeUsuario,
    tprovincia.nome AS prov_name, tmunicipio.nome AS mun_name, tcomuna.nome AS com_name, tnacionalidade.nome AS nacionalidade_name, testadocliente.nome AS estado_conta_nome
FROM 
    tuser
LEFT JOIN 
    tprovincia ON tuser.fk_prov = tprovincia.idtprovincia
LEFT JOIN 
    tmunicipio ON tuser.fk_mun = tmunicipio.idtmunicipio
LEFT JOIN 
    tcomuna ON tuser.fk_com = tcomuna.idtcomuna
LEFT JOIN 
    tnacionalidade ON tuser.fk_tNacionalidade = tnacionalidade.idtnacionalidade
LEFT JOIN 
    testadocliente ON tuser.fk_tEstadoConta = testadocliente.id
WHERE 
    tuser.fk_tEstadoConta <> 1;
");
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $user) {
            $users[] = new Cliente($user['id'], $user['fk_tTipoDeUsuario'], $user['nome'], $user['email'], $user['morada'], $user['numTel'], $user['username'], $user['password'], $user['prov_name'], $user['mun_name'], $user['com_name'], "null", $user['fk_tTipoCliente'], $user['empresaActividade'], $user['nacionalidade_name'], $user['estado_conta_nome']);
        }
        return $users;
    }

    public function userLogin($email, $password)
    {
        $statement = $this->database->prepare("SELECT * from tuser WHERE email= :email and password= :password ");
        $statement->bindparam(":email", $email);
        $statement->bindparam(":password", $password);
        $statement->execute();
        $count = $statement->rowCount();

        if ($count == 1) {
            $result = $statement->fetchAll();
            foreach ($result as $user) {
                $_SESSION["id"] = $user['id'];
                $_SESSION["nome"] = $user['nome'];
                $_SESSION["email"] = $user['email'];
                $_SESSION["password"] = $user['password'];
                $_SESSION["fk_tTipoDeUsuario"] = $user['fk_tTipoDeUsuario'];
                $_SESSION["fk_tEstadoConta"] = $user['fk_tEstadoConta'];
            }
            $redirect = "Redirecionar";
            return $redirect;
        } else {
            $error = "Email ou Palavra Passe incorrecta";
            return $error;
        }
    }

    public function getCliente($id)
    {
        $statement = $this->database->prepare("SELECT tuser.id, tuser.nome, tuser.email, tuser.morada, tuser.numTel, tuser.username, tuser.password, tuser.empresaActividade, tuser.fk_tEstadoConta, tuser.fk_tTipoCliente, tuser.fk_tTipoDeUsuario,
       tprovincia.nome AS prov_name, tmunicipio.nome AS mun_name, tcomuna.nome AS com_name, tnacionalidade.nome AS nacionalidade_name
FROM tuser
LEFT JOIN tprovincia ON tuser.fk_prov = tprovincia.idtprovincia
LEFT JOIN tmunicipio ON tuser.fk_mun = tmunicipio.idtmunicipio
LEFT JOIN tcomuna ON tuser.fk_com = tcomuna.idtcomuna
LEFT JOIN tnacionalidade ON tuser.fk_tNacionalidade = tnacionalidade.idtnacionalidade
WHERE tuser.id = :id;
");
        $statement->bindparam(":id", $id);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $user) {
            $cliente = new Cliente($user['id'], $user['fk_tTipoDeUsuario'], $user['nome'], $user['email'], $user['morada'], $user['numTel'], $user['username'], $user['password'], $user['prov_name'], $user['mun_name'], $user['com_name'], "null", $user['fk_tTipoCliente'], $user['empresaActividade'], $user['nacionalidade_name'], $user['fk_tEstadoConta']);
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

    public function updateClientData($clienteId, $clienteName, $clienteEmail, $clienteMorada, $clientenumTel, $clienteUsername, $clientePassword, $clienteEmpresaActividade, $clienteProv, $clienteMun, $clienteCom, $clienteTipo, $clienteNacionalidade)
    {
        try {
            $stmt = $this->database->prepare("UPDATE tuser
            SET 
                nome = :nome,
                email = :email,
                morada = :morada,
                numTel = :numTel,
                username = :username,
                password = :password,
                empresaActividade = :empresaActividade,
                fk_prov = :fk_prov,
                fk_mun = :fk_mun,
                fk_com = :fk_com,
                fk_tTipoCliente = :fk_tTipoCliente,
                fk_tNacionalidade = :fk_tNacionalidade
            WHERE id = :selected_id");

            $stmt->bindParam(':selected_id', $clienteId, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $clienteName, PDO::PARAM_STR);
            $stmt->bindParam(':email', $clienteEmail, PDO::PARAM_STR);
            $stmt->bindParam(':morada', $clienteMorada, PDO::PARAM_STR);
            $stmt->bindParam(':numTel', $clientenumTel, PDO::PARAM_STR);
            $stmt->bindParam(':username', $clienteUsername, PDO::PARAM_STR);
            $stmt->bindParam(':password', $clientePassword, PDO::PARAM_STR);
            $stmt->bindParam(':empresaActividade', $clienteEmpresaActividade, PDO::PARAM_STR);
            $stmt->bindParam(':fk_prov', $clienteProv, PDO::PARAM_INT);
            $stmt->bindParam(':fk_mun', $clienteMun, PDO::PARAM_INT);
            $stmt->bindParam(':fk_com', $clienteCom, PDO::PARAM_INT);
            $stmt->bindParam(':fk_tTipoCliente', $clienteTipo, PDO::PARAM_INT);
            $stmt->bindParam(':fk_tNacionalidade', $clienteNacionalidade, PDO::PARAM_INT);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {

            return false;
        }
    }

    public function approveUser($id)
    {
        try {
            $stmt = $this->database->prepare("UPDATE tuser
            SET fk_tEstadoConta = 1
            WHERE id = :id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function refuseUser($id)
    {
        try {
            $stmt = $this->database->prepare("UPDATE tuser
            SET fk_tEstadoConta = 2
            WHERE id = :id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function createNewCliente($nome, $email, $morada, $numTel, $username, $password, $empresaActividade, $fk_prov, $fk_mun, $fk_com, $fk_tTipoCliente, $fk_tNacionalidade, $fk_tTipoDeUsuario, $fk_tEstadoConta)
    {
        try {

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

    public function createNewGestor($nome, $email, $morada, $numTel, $username, $password, $fk_prov, $fk_mun, $fk_com, $fk_tTipoDeUsuario, $fk_tEstadoConta)
    {
        try {

            $stmt = $this->database->prepare("INSERT Into tuser(nome,email,morada,numTel,username,password,fk_prov,fk_mun,fk_com,fk_tTipoDeUsuario,fk_tEstadoConta) VALUES(:nome,:email,:morada,:numTel,:username,:password,:fk_prov,:fk_mun,:fk_com,:fk_tTipoDeUsuario,:fk_tEstadoConta)");
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":morada", $morada);
            $stmt->bindparam(":numTel", $numTel);
            $stmt->bindparam(":username", $username);
            $stmt->bindparam(":password", $password);
            $stmt->bindparam(":fk_prov", $fk_prov);
            $stmt->bindparam(":fk_mun", $fk_mun);
            $stmt->bindparam(":fk_com", $fk_com);
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
