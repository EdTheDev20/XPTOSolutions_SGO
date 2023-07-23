<div class="row justify-content-center my-5">
    <div class="col-lg-6">

        <form method="post">
            <div class="mb-3">
                <label for="provinciaSelect" class="form-label">Província</label>

                <select name="provinciaSelect" id="provinciaSelect" class="form-select" onchange="alterMunicipios()" required>
                    ç <option value="" selected disabled>Provincia</option>
                    <?php
                    foreach ($provincias as $provincia) :
                    ?>
                        <option value="<?php echo $provincia->getId(); ?>" <?php
                                                                            if ($provId == $provincia->getId()) {
                                                                                echo 'selected';
                                                                            }
                                                                            ?>><?php echo $provincia->getProvincia(); ?> </option>
                    <?php endforeach;
                    ?>

                </select>
            </div>

            <div class="mb-3">
                <label for="municipioSelect" class="form-label">Município</label>
                <select name="municipioSelect" onchange="alterComunas()" id="municipioSelect" class="form-select" required>
                    <option value="" selected disabled>Município</option>
                    <?php
                    foreach ($municipios as $municipio) :
                    ?>
                        <option value=<?php echo $municipio->getId(); ?> <?php
                                                                            if ($munId == $municipio->getId()) {
                                                                                echo 'selected';
                                                                            }
                                                                            ?>> <?php echo $municipio->getMunicipio(); ?> </option>
                    <?php endforeach;
                    ?>



                </select>
            </div>



            <div class="mb-3">
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
            <div class="mb-3">
                <label class="form-label" for="username">Nome De Usuário/Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="nomeCompleto">Nome Completo</label>
                <input type="text" name="nomeCompleto" id="nomeCompleto" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="email">Endereço email</label>
                <input type="text" name="email" id="email" class="form-control" required>
                <div class="form-text" required id="emailHelp">Nunca iremos partilhar o seu email</div>
            </div>

            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
            </div>

            <div class="mb-3">
                <label for="checkPassword" class="form-label">Confirme a password</label>
                <input type="password" class="form-control" id="checkPassword" onkeyup='check();' name="checkPassword" required>
                <span id="message"></span>
            </div>

            <div class="mb-3">
                <label class="form-label" for="numeroTelefone">Número de telefone</label>
                <input type="number" pattern=".{5,10}" required onkeyup='check();' name="numeroTel" id="numeroTel" class="form-control" required>
            </div>


            <div class="mb-3">
                <label for="tipodeCliente" class="form-label">Tipo de cliente
                </label>

                <select name="tipodeCliente" id="tipodeCliente" class="form-select" onchange="typeOfClient()" required>
                    <option value="" selected disabled>Selecione um tipo de cliente</option>
                    <option value="1">Particular</option>
                    <option value="2">Empresa</option>
                </select>
            </div>

            <div class="mb-3" id="empresaActivities">
         
            
            </div>

            <div class="mb-3">
                <label class="form-label" for="morada">Morada</label>
                <input type="text" name="morada" id="morada" class="form-control" required>
            </div>




            <div class="mb-3">
                <label for="nacionalidadeSelect" class="form-label">Nacionalidade</label>
                <select class="form-select" id="nacionalidadeSelect" name="nacionalidadeSelect" required>
                    <option value="" disabled selected>Nacionalidade</option>
                    <?php foreach ($nacionalidades as $nacionalidade) : ?>
                        <option value="<?php echo $nacionalidade->getId(); ?> "> <?php echo $nacionalidade->getNacionalidade(); ?> </option>
                    <?php endforeach; ?>

                </select>
            </div>



            <button type="submit" class="btn btn-primary">Registrar</button>
            <input type="hidden" name="form-submitted" value="1" />
        </form>
    </div>
</div>