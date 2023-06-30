<?php 
require "./vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
class Mail{
protected $mail;
public function __construct($nome,$email,$subject,$message)
{
$this->mail = new PHPMailer(true); //Instanciar o objecto
$this->mail->isSMTP(); //Certificar que é SMTP
$this->mail->SMTPAuth= true; //Garantir a autenticação SMTP
$this->mail->Host = "smtp.gmail.com"; //Endereço do host
$this->mail->Port=465; //Endereço da porta
$this->mail->SMTPSecure='ssl'; //Tipo de conexão
$this->mail->Username = "xptosolutionstest@gmail.com"; //Email que será usado para enviar o email
$this->mail->Password= "bzicwjkkjnguvazq"; //Password do email que será utilizado
$this->mail->setFrom("xptosolutionstest@gmail.com"); //O email que irá mandar o email
$this->mail->addAddress($email,$nome); //Endereço que receberá o email
$this->mail->Subject = $subject; //Assunto do email
$this->mail->Body = $message;  //Mensagem do email
// this->mail->send();
}

public function sendMail(){
    $res = $this->mail->send();
    if($res == true){
        echo "sucesso";
    }
    else{
        $this->mail->SMTPDebug= SMTP::DEBUG_SERVER;
    }
}
}

?>  