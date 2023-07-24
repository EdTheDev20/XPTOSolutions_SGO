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
        include_once(APP_PATH . '/header.php');

        $filterOp = filter_input(INPUT_GET, 'op');
        $op = isset($filterOp) ? $filterOp : NULL;
        try {
            if (!$op || $op == 'home') {
                include APP_PATH . '/View/Home.php';
            } else if ($op == 'login') {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $result = $this->formService->makeLogin($_POST['useremail'], $_POST["userpassword"]);
                    if ($result !== "Redirecionar") {
                        $_SESSION['errorflag'] = true;
                    } else {
                        $_SESSION['errorflag'] = false;
                        if ($_SESSION["fk_tEstadoConta"] != "1") {
                            session_destroy();
                            $this->redirect("index.php?op=loginerror");
                        } else {
                            $this->redirect("index.php?op=home");
                        }
                    }
                }
                if (!isset($_SESSION['nome'])) { //Set a sessão do user estiver não estiver ativada, apresentamos o login, caso contrário encaminhamos o mesmo para o index.
                    $this->generalLogin();
                } else {
                    $this->redirect("index.php?op=home");
                }
            } else if ($op == 'register') {
                $this->fillRegisterForm();
            } else if ($op == 'sucessRegister') {
                $this->displaySucessRegister();
            } else if ($op == 'datachangesucess') {
                $this->displayDataChangeSuccess();
            } else if ($op == 'dashboard') {
                $this->displayDashboard();
            } else if($op=="creategestores"){
                $this-> registerManager();
            } 
            else if($op=="createoutdoors"){
                $this-> createOutdoors();
            }
            else if ($op == 'loginerror') {
                session_destroy();
                $this->displayLoginError();
            } else {
                $this->displayError();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        include_once(APP_PATH . '/footer.php');
    }

    public function displayDashboard()
    {
        if (isset($_SESSION['id'])) {
            if ($_SESSION["fk_tTipoDeUsuario"] == "1") {
                $usersforAdm = $this->formService->getUsersForAdm();
                $this->displayUserManagement($usersforAdm);
                $gestoresforAdm = $this->formService-> getGestoresForAdm();
                $this->displayManagersManagement($gestoresforAdm);
                $task =  isset($_POST['task']) ? filter_input(INPUT_POST, 'task') : FALSE;
                if($task=='delete'){
                  try {       
                $this->formService->recusarUser($_POST['id']);
                    session_destroy();
                   

                  } catch(ValidationException $e){
                    throw $e;
                  }
                }
                else if($task=='accept'){
                    try {       
                        $this->formService->aprovarUser($_POST['id']);
                            session_destroy();
                          } catch(ValidationException $e){
                            throw $e;
                          }
                    session_destroy();
                }
            }
            if ($_SESSION["fk_tTipoDeUsuario"] == "3") {
                $DashBoardCliente = $this->formService->getClienteDash($_SESSION['id']);
                $provincias = $this->formService->getProvincias();
                $nacionalidades = $this->formService->getNacionalidades();

                $filterProvId = filter_input(INPUT_GET, 'provid');
                $filterMunId = filter_input(INPUT_GET, 'munid');
                $provId = isset($filterProvId) ? $filterProvId : NULL;
                $munId = isset($filterMunId) ? $filterMunId : NULL;
                $_SESSION['provId'] = '';

                if ($provId) {
                    $municipios = $this->formService->getMunicipiosFromProvinciaServ($provId);
                    $_SESSION['provId'] = $provId;
                }
                $_SESSION['munid'] = '';
                if ($munId) {
                    $comunas = $this->formService->getComunasFromMunicipiosServ($munId);
                    $_SESSION['munid'] = $munId;
                }

                if (isset($_POST['editForm'])) {

                    $username = $_POST['username'];
                    $nome = $_POST['nomeCompleto'];
                    $email = $_POST['email'];
                    $password = $_POST['inputPassword'];
                    $numerotelefone = $_POST['numeroTel'];
                    $tipoDeCliente = $_POST['tipodeCliente'];
                    $actividadeDaEmpresa = isset($_POST['actividadeDaEmpresa']) ? filter_input(INPUT_POST, 'actividadeDaEmpresa') : "null";
                    $provincia = $_POST['provinciaSelect'];
                    $municipio = $_POST['municipioSelect'];
                    $comuna = $_POST['comunaSelect'];
                    $morada = $_POST['morada'];
                    $nacionalidade = $_POST['nacionalidadeSelect'];
                    try {
                        $this->formService->alterClientData($_SESSION['id'], $nome, $email, $morada, $numerotelefone, $username, $password, $actividadeDaEmpresa, $provincia, $municipio, $comuna, $tipoDeCliente, $nacionalidade);
                        session_destroy();
                        $this->redirect("index.php?op=datachangesucess");
                    } catch (ValidationException $e) {
                        $errors = $e->getErrors();
                    }
                }
                if (!isset($municipios)) {
                    $comunas = NULL;
                }
                if (!isset($comunas)) {
                    $comunas = NULL;
                }
                echo "Lista de outdoors";
               $outdoors= $this->formService->getOutdoors();
               print_r($outdoors);
                $this->showDashboardUser($DashBoardCliente, $provincias, $municipios, $comunas, $nacionalidades);
            }
        } else {
            $this->redirect("index.php?op=home");
        }
    }

    public function displayManagersManagement($gestoresforAdm){
     include APP_PATH . '/View/ManagersManagement.php';
        
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

    public function showDashboardUser($User, $provincias, $municipios, $comunas, $nacionalidades)
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

    public function displayUserManagement($usersforAdm)
    {
        include APP_PATH . '/View/UserManagement.php';
    }
    public function displayLoginError()
    {
        include APP_PATH . '/View/AwaitAproval.php';
    }

    public function displayDataChangeSuccess()
    {
        include APP_PATH . '/View/DataChangeSuccess.php';

    }

    public function createOutdoors(){
        $outdoorTypes = $this->formService->getOutdoorTypes();
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


        if (isset($_POST['outdoor-form'])) {
            $targetDir = "Uploads/"; // Directory where the uploaded image will be stored
            $targetFile = $targetDir . basename($_FILES["imageUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
          
            // Check if the file is an actual image or a fake image
            $check = getimagesize($_FILES["imageUpload"]["tmp_name"]);
            if ($check !== false) {
              // File is an image
              move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $targetFile);
              echo "Image uploaded successfully.";
            } else {
              echo "File is not an image.";
            }
            echo $targetFile;
            $provinciaSelect = $_POST['provinciaSelect'];
            $municipioSelect = $_POST['municipioSelect'];
            $comunaSelect = $_POST['comunaSelect'];
            $outdoortype = $_POST['outdoortype'];
            $startdate = $_POST['startdate'];
            $enddate = $_POST['enddate'];
            $this->formService->fs_solicitaOutdoor($outdoortype,$provinciaSelect,$municipioSelect,$comunaSelect,$startdate,$enddate,$targetFile,"100","2","null","null",$_SESSION['id']);
          }


        include APP_PATH . '/View/RequestOutdoor.php';
    }
    public function registerManager(){

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

        if (isset($_POST['manager-create'])) {

            $username = $_POST['username'];
            $nome = $_POST['nomeCompleto'];
            $email = $_POST['email'];
            $password = $_POST['inputPassword'];
            $numerotelefone = $_POST['numeroTel'];
            $provincia = $_POST['provinciaSelect'];
            $municipio = $_POST['municipioSelect'];
            $comuna = $_POST['comunaSelect'];
            $morada = $_POST['morada'];
            try {
               $this->formService->createManagersInDB($nome,$email,$morada,$numerotelefone,$username,$password,$provincia,$municipio,$comuna,'2','1');
               $subject = "NOVO USUÁRIO CRIADO";
               $assunto = "Querido utilizador, o administrador do site XPTO criou uma conta em seu nome. Por favor acesso à aplicação para poder revisar.";
               $this->mail = new Mail("admin", $email, $subject, $assunto);
               $this->mail->sendMail();
                $this->redirect("index.php?op=dashboard");
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }

        include APP_PATH . '/View/ManagerRegister.php';
    }
}

