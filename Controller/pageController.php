<?php
require_once(APP_PATH . '/Services/formServices.php');
require_once(APP_PATH . '/Model/Mail.php');
require_once(APP_PATH . '/Model/ValidationException.php');
class pageController
{
    private $formService = NULL;
    private $mail = NULL;
    public function __construct()
    {
        $this->formService = new formServices();
    }

    public function redirect($location)
    {
        header('Location: ' . $location);
        exit;
    }

    public function requestHandler()
    {
        include_once (APP_PATH . '/header.php');

        $filterOp = filter_input(INPUT_GET, 'op');
        $op = isset($filterOp) ? $filterOp : NULL;
        try {
            if (!$op || $op == 'home') {
                include APP_PATH . '/View/Home.php';
            } else if ($op == 'login') {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $result = $this->formService->makeLogin($_POST['useremail'], $_POST["userpassword"]);
                    if ($result !== "Redirecionar") {
                       $_SESSION['errorflag']=true;
                    } else {
                        $_SESSION['errorflag']=false;
                        $this->redirect("index.php?op=home");
                    }
                }
                if(!isset($_SESSION['nome'])){ //Set a sessão do user estiver não estiver ativada, apresentamos o login, caso contrário encaminhamos o mesmo para o index.
                 $this->generalLogin(); 
                } else {
                    $this->redirect("index.php?op=home");
                }
              

            } else if ($op == 'register') {
                $this->fillRegisterForm();
            } else if ($op == 'sucessRegister') {
                $this->displaySucessRegister();
            } else if ($op == 'dashboard') {
                $this->showDashboard();
            } else {
                $this->displayError();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function fillRegisterForm()
    {
        $username = '';
        $nome = '';
        $email = '';
        $password = '';
        $numerotelefone = '';
        $tipoDeCliente = '';
        $actividadeDaEmpresa = '';
        $provincia = '';
        $municipio = '';
        $comuna = '';
        $morada = '';
        $nacionalidade = '';
        $provincias = $this->formService->getProvincias();
        $nacionalidades = $this->formService->getNacionalidades();
        $filterProvId = filter_input(INPUT_GET, 'provid');
        $filterMunId = filter_input(INPUT_GET, 'munid');
        $provId = isset($filterProvId) ? $filterProvId : NULL;
        $munId = isset($filterMunId) ? $filterMunId : NULL;
        if ($provId) {
            $municipios = $this->formService->getMunicipiosFromProvinciaServ($provId);
        }
        if ($munId) {
            $comunas = $this->formService->getComunasFromMunicipiosServ($munId);
        }
        if (isset($_POST['form-submitted'])) {
            $nome = isset($_POST['nomeCompleto']) ? filter_input(INPUT_POST, 'nomeCompleto') : NULL;
            $email = isset($_POST['email']) ? filter_input(INPUT_POST, 'email') : NULL;
            $username = isset($_POST['username']) ? filter_input(INPUT_POST, 'username') : NULL;
            $numerotelefone = isset($_POST['numeroTel']) ? filter_input(INPUT_POST, 'numeroTel') : NULL;
            $password = isset($_POST['inputPassword']) ? filter_input(INPUT_POST, 'inputPassword') : NULL;
            $tipoDeCliente = isset($_POST['tipodeCliente']) ? filter_input(INPUT_POST, 'tipodeCliente') : NULL;
            $actividadeDaEmpresa = isset($_POST['actividadeDaEmpresa']) ? filter_input(INPUT_POST, 'actividadeDaEmpresa') : "null";
            $provincia = isset($_POST['provinciaSelect']) ? filter_input(INPUT_POST, 'provinciaSelect') : NULL;
            $municipio = isset($_POST['municipioSelect']) ? filter_input(INPUT_POST, 'municipioSelect') : NULL;
            $comuna = isset($_POST['comunaSelect']) ? filter_input(INPUT_POST, 'comunaSelect') : NULL;
            $morada = isset($_POST['morada']) ? filter_input(INPUT_POST, 'morada') : NULL;
            $nacionalidade = isset($_POST['nacionalidadeSelect']) ? filter_input(INPUT_POST, 'nacionalidadeSelect') : NULL;

            /* echo "Nome: ".$nome." email: ".$email." username: ".$username." número de telefone: ".$numerotelefone." password: ".$password." tipo de cliente: ".$tipoDeCliente." actividade da empresa:".$actividadeDaEmpresa." provincia:".$provincia. "municipio:".$municipio." comuna:".$comuna." morada:".$morada." nacionalidade: ".$nacionalidade; 
//Testing
*/

            try {

                $this->formService->insertInDB($nome, $email, $morada, $numerotelefone, $username, $password, $actividadeDaEmpresa, $provincia, $municipio, $comuna, $tipoDeCliente, $nacionalidade, "3", "3");
                $admmail = $this->formService->getAdmMail();
                $subject = "NOVO USUÁRIO CRIADO";
                $assunto = "Querido administrador, um novo usuário foi criado. Por favor acesso à aplicação para poder revisar.";
                $this->mail = new Mail("admin", $admmail, $subject, $assunto);
                $this->mail->sendMail();
                // Um usuário quando se registra é: Cliente e também é NãoConfirmado
                $this->redirect('index.php?op=sucessRegister');
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }


        include APP_PATH . '/View/Register.php';
    }

    public function showDashboard()
    {
        include APP_PATH . '/View/Dashboard.php';
    }

    public function generalLogin()
    {
        include APP_PATH . '/View/Login.php';
    }

    public function displayError()
    {
        include APP_PATH . '/View/Error.php';
    }

    public function displaySucessRegister()
    {
        include APP_PATH . '/View/LoginSuccess.php';
    }
}
