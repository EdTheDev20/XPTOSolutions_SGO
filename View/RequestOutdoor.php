<div class="row justify-content-center my-5">
    <div class="col-lg-6">

        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="provinciaSelect" class="form-label">Província</label>

                <select name="provinciaSelect" id="provinciaSelect" class="form-select" onchange="alterMunicipiosOut()" required>
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
                <select name="municipioSelect" onchange="alterComunasout()" id="municipioSelect" class="form-select" required>
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
                <label for="tipodeCliente" class="form-label">Imagem do outdoor
                </label>

                <select name="outdoorimage" id="outdoorimage" class="form-select" onchange="imageoutdoorFunc()" required>
                    <option value="" selected disabled>O outdoor possui uma imagem?</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>

            <div class="mb-3" id="upload">
         
            
            </div>

            <div class="mb-3">
                <label class="form-label" for="startdate">Data de início</label>
                <input type="date" name="startdate" id="startdate" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="enddate">Data de fim</label>
                <input type="date" name="enddate" id="enddate" class="form-control" required>
            </div>



            <div class="mb-3">
                <label for="nacionalidadeSelect" class="form-label">Tipos de Outdoors</label>
                <select class="form-select" id="outdoortype" name="outdoortype" required>
                    <option value="" disabled selected>Tipos de outdoors</option>
                    <?php foreach ($outdoorTypes as $tipos) : ?>
                        <option value="<?php echo $tipos['id']; ?> "> <?php echo $tipos['nome']; ?> </option>
                    <?php endforeach; ?>

                </select>
            </div>



            <button type="submit" class="btn btn-primary">Registrar</button>
            <input type="hidden" name="outdoor-form" value="1" />
        </form>
    </div>
</div>