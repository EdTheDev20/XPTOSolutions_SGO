<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XPTO Solutions</title>
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.css">
       <script src="Scripts/formsSelect.js"></script>
    <script type="text/javascript" src="JS/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="JS/bootstrap.js"></script>
    <link rel="shortcut icon" href="../../Assets/Favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/loginCss.css" />
    <link rel="stylesheet" href="Content/bootstrap-icons-1.10.5/font/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Error.css" />
 
    <style>
        section {
            padding: 60px 0;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-xxl">
            <a href="index.php?op=home" class="navbar-brand">
                <span class="f-bold text-secondary">XPTO SOLUTIONS</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end align-center" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 " style="--bs-scroll-height:100px;">

                    <li class="nav-item">
                        <a href="index.php?op=home" class="nav-link">Página inicial</a>
                    </li>

                    <li class="nav-item">
                        <a href="#reviews" class="nav-link">Outdoors</a>
                    </li>

                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Sobre</a>
                    </li>

                    <li class="nav-item d-md-none">
                        <a href="#pricing" class="nav-link">Alguma Coisa</a>
                    </li>

                    <li class="nav-item ms-2 d-none d-md-inline">
                        <a href="#topics" class="btn btn-secondary">Alugue já</a>
                    </li>

                </ul>


                <?php
                if (!isset($_SESSION['nome'])) {
                    //Se não estiver set, apresente o botão de login.
                ?>
                    <div class="d-flex my-3">
                        <a class="btn btn-outline-dark btn-lg" href="index.php?op=login" role="button"> <span><i class="bi bi-person-circle"></i></span> Login </a>
                    </div>
                <?php
                } else {  ?>
                    <div class="d-flex my-3">
                        <a class="btn btn-outline-dark btn-lg" href="index.php?op=dashboard" role="button">
                            <span><i class="bi bi-person-circle"></i></span> <?php echo $_SESSION['nome']; ?> </a>
                    </div>

                    <div class="d-flex mx-2 my-3">
                        <a class="btn btn-outline-dark btn-lg" href="View/Logout.php" role="button"> <span><i class="glyphicon glyphicon-log-out"></i></span> Terminar Sessão </a>
                    </div>

                <?php
                } ?>


                <!--  <form action="" class="d-flex my-3">
                        <input type="search" placeholder="pesquisar" class="form-control me-2">
                        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                    </form> -->

            </div>
        </div>
    </nav>