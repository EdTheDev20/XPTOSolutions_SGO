<?php
require_once('./Model/Database.php');
require_once('./Model/Outdoor.php');
class OutdoorsRepository
{
    private $database;
    function __construct()
    {
        $this->database = Database::getInstance();
    }

    public function getOutdoorType()
    {
        $tipos = array();
        $statement = $this->database->prepare("SELECT * from ttipooutdoors");
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function getOutdoors(){
    $outdoors = array();
    $statement = $this->database->prepare("SELECT * from toutdoor");
    $statement ->execute();
    $result = $statement->fetchAll();
    return $result;
    }

    public function getGestorComMenosTarefa()
    {

        $query = "SELECT tuser.id
FROM tuser
LEFT JOIN toutdoor ON tuser.id = toutdoor.fk_gestid
WHERE tuser.fk_tTipoDeUsuario = 2
GROUP BY tuser.id
ORDER BY COUNT(toutdoor.id) ASC
LIMIT 1";
        $stmt = $this->database->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        print_r($result);

        if ($result) {
            $userId = $result[0]['id'];
            return $userId;
        }
    }

    public function solicitaOutdoor($tipo, $provincia, $municipio, $comuna, $datain, $datafim, $imgpath, $preco, $estado, $gestor="null", $comprovpath='null', $userid)
    {
        $query = "INSERT INTO toutdoor (fk_tipo, fk_tprovincia, fk_tmunicipio, fk_tcomuna, datain, datafim, imgpath, preco, fk_estado, fk_gestid, comprovpath, fk_userid) 
                  VALUES (:tipo, :provincia, :municipio, :comuna, :datain, :datafim, :imgpath, :preco, :estado, :gestor, :comprovpath, :userid)";

        $stmt = $this->database->prepare($query);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':provincia', $provincia);
        $stmt->bindParam(':municipio', $municipio);
        $stmt->bindParam(':comuna', $comuna);
        $stmt->bindParam(':datain', $datain);
        $stmt->bindParam(':datafim', $datafim);
        $stmt->bindParam(':imgpath', $imgpath);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':estado', $estado);
        $gestorid = $this->getGestorComMenosTarefa();
        $stmt->bindParam(':gestor', $gestorid);
        $stmt->bindParam(':comprovpath', $comprovpath);
        $stmt->bindParam(':userid', $userid);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
