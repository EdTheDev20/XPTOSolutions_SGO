<?php
class Database{
protected $servername;
protected $username;
protected $password;
private static $instance=NULL;
/*
function __construct($servername='localhost:3307',$username='root',$password='Password123')
{

try{
    $conn = new PDO("mysql:host=$servername;dbname=xptosolutions_sgo",$username,$password);
    // Definimos no PDO o modo de erro para a excepção 
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Conexão sucedida";
} catch (PDOException $e){
    echo "Conexão falhada" . $e->getMessage();
}
}   */
public static function getInstance($servername='localhost:3307',$username='root',$password='Password123') {

    if (!isset(self::$instance)) {
        try {
            self:: $instance = new PDO("mysql:host=$servername;dbname=xptosolutions_sgo",$username,$password);
            self:: $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    return self::$instance;
}

}






?>