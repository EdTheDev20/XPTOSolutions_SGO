<?php 


?>
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Gestão de <b>usuários</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Username</th>
                        <th>Tipo de Cliente</th>
                        <th>Situação</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($usersforAdm as $usuario) : ?>
                        <tr>
                            <td><?php echo $usuario->getUserId(); ?></td>
                            <td><?php echo $usuario->getName(); ?></td>
                            <td><?php echo $usuario->getClientType(); ?></td>
                            <td><?php if($usuario->getTipoDeCliente()=="1"){echo "Particular";}
                            else {echo "Empresa";} ?></td>
                            <td> <?php echo $usuario->getEstadoConta(); ?></td>


                            <td>
                                <a href="#" class="delete" title="delete"><i class="bi bi-x"></i></a>
                                <a href="#" class="Aceitar" title="Aceitar" data-toggle="tooltip"><i class="bi bi-check"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>