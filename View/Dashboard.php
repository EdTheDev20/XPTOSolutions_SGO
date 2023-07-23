<div class="container-fluid">
    <h1 class=" text-center"> O seu perfil </h1>
    <hr>


</div>

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
                                if ($tipoDeCliente == 1) {
                                    echo "Particular";
                                } else echo "Empresa";

                                ?>

                            </p>
                        </div>
                    </div>

                    <hr>
                    <?php
                    if ($User->getActividadeDaEmpresa() != "null") {
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
                        <div class="col-sm-9 my-3" id="edit">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editmodal">Edit</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Edite os seus dados</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="editform" name="edit" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="provinciaSelect" class="form-label">Província</label>

                        <select name="provinciaSelect" id="provinciaSelect" class="form-select" onchange="editAlterMunicipios()" required>
                            <option value="" selected disabled>Provincia</option>
                            <?php
                            foreach ($provincias as $provincia) :
                            ?>
                                <option value="<?php echo $provincia->getId(); ?>" <?php
                                                                                    if ($_SESSION['provId'] == $provincia->getId()) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                    ?>><?php echo $provincia->getProvincia(); ?> </option>
                            <?php endforeach;
                            ?>

                        </select>


                    </div>

                    <div class="form-group">
                        <label for="municipioSelect" class="form-label">Município</label>
                        <select name="municipioSelect" onchange="editalterComunas()" id="municipioSelect" class="form-select" required>
                            <option value="" selected disabled>Município</option>
                            <?php
                            foreach ($municipios as $municipio) :
                            ?>
                                <option value=<?php echo $municipio->getId(); ?> <?php
                                                                                    if ($_SESSION['munid'] == $municipio->getId()) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                    ?>> <?php echo $municipio->getMunicipio(); ?> </option>
                            <?php endforeach;
                            ?>



                        </select>

                    </div>

                    <div class="form-group">
                        <label for="comunaSelect" class="form-label">Comuna</label>
                        <select name="comunaSelect" id="comunaSelect" class="form-select" required>
                            <option value="" disabled selected>Comuna</option>
                            <?php
                            foreach ($comunas as $comuna) :
                            ?>
                                <option value=<?php echo $comuna->getId(); ?>> <?php echo $comuna->getComuna(); ?> </option>
                            <?php endforeach;
                            ?>


                        </select>

                    </div>

                    <div class="form-group">
                        <label class="form-label" for="username">Nome De Usuário/Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?php echo $User->getUsername(); ?>" required>
                    </div>

                    <div class="form-group">

                        <label class="form-label" for="nomeCompleto">Nome Completo</label>
                        <input type="text" name="nomeCompleto" id="nomeCompleto" value="<?php echo $User->getName(); ?>" class="form-control" required>

                    </div>


                    <div class="form-group">
                        <label class="form-label" for="email">Endereço email</label>
                        <input type="text" value="<?php echo $User->getEMail(); ?>" name="email" id="email" class="form-control" required>
                        <div class="form-text" required id="emailHelp">Nunca iremos partilhar o seu email</div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="numeroTelefone">Número de telefone</label>
                        <input value="<?php echo $User->getCellphoneNumber(); ?>" type="number" pattern=".{5,10}" required onkeyup='check();' name="numeroTel" id="numeroTel" class="form-control" required>

                    </div>

                    <div class="form-label">
                        <label for="tipodeCliente" class="form-label">Tipo de cliente
                        </label>

                        <select name="tipodeCliente" id="tipodeCliente" class="form-select" onchange="typeOfClient()" required>
                            <option value="" selected disabled>Selecione um tipo de cliente</option>
                            <option value="1">Particular</option>
                            <option value="2">Empresa</option>
                        </select>

                    </div>

                    <div class="form-label" id="empresaActivities">

                    </div>

                    <div class="form-label">
                        <label class="form-label" for="morada">Morada</label>
                        <input type="text" name="morada" id="morada" class="form-control" value=" <?php echo $User->getAddress(); ?>" required>
                    </div>

                    <div class="form-label">
                        <label for="nacionalidadeSelect" class="form-label">Nacionalidade</label>
                        <select class="form-select" id="nacionalidadeSelect" name="nacionalidadeSelect" required>
                            <option value="" disabled selected>Nacionalidade</option>
                            <?php foreach ($nacionalidades as $nacionalidade) : ?>
                                <option value="<?php echo $nacionalidade->getId(); ?> "> <?php echo $nacionalidade->getNacionalidade(); ?> </option>
                            <?php endforeach; ?>

                        </select>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-success" id="Submeter">
                    <input type="hidden" name="editForm" value="1" />
                </div>
            </form>


        </div>
    </div>
</div>