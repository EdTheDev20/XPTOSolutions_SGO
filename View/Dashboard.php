<div class="container-fluid">
    <h1 class=" text-center"> O seu perfil </h1>
    <hr>


</div>
<!-- 
o Tipo de Cliente (Empresa ou Particular)
o Actividade da Empresa

-->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card mb-4">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nome Completo</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?php 
                    echo $User->getName();
                            
                            ?> </p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Tipo De Cliente</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                            <?php 
                            $tipoDeCliente = $User->getTipoDeCliente();
                          if($tipoDeCliente==1){
                            echo "Particular";
                          }
                          else echo "Empresa";
                            
                            ?>    

                            </p>
                        </div>
                    </div>

                    <hr>
<?php
if($User->getActividadeDaEmpresa()!="null"){
?>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Actividade da Empresa</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                                <?php
                               echo $User->getActividadeDaEmpresa();
                                ?>
                            </p>
                        </div>
                    </div>

                    <hr>
<?php 
} ?>



                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Username</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?php echo $User->getUsername(); ?></p>
                        </div>
                    </div>



                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?php echo $User->getEMail(); ?></p>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Número de telefone</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">
                            <?php echo $User->getCellphoneNumber(); ?>    

                            </p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Província</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?php echo $User->getProvincia(); ?></p>
                        </div>

                        <div class="col-sm-3">
                            <p class="mb-0">Município</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?php echo $User->getMunicipio(); ?></p>
                        </div>

                        <div class="col-sm-3">
                            <p class="mb-0">Comuna</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?php echo $User->getComuna(); ?></p>
                        </div>
                    </div>


                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Morada</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?php echo $User->getAddress(); ?></p>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nacionalidade</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"> <?php echo $User->getNacionalidade(); ?></p>
                            </div>
                        </div>

                        <div class="col-sm-9 my-3">

                            <form method="POST">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>