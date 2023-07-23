
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Gestão de usuários</h2>
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
                            <td><?php if ($usuario->getTipoDeCliente() == "1") {
                                    echo "Particular";
                                } else {
                                    echo "Empresa";
                                } ?></td>
                            <td> <?php echo $usuario->getEstadoConta(); ?></td>


                            <td>
                                <form method="post" class="d-inline">
                                    <input type="hidden" name="op" value="dashboard">
                                    <input type="hidden" name="task" value="delete">
                                    <input type="hidden" name="id" value="<?php echo $usuario->getUserId(); ?>">
                                    <button type="submit" class="btn btn-link delete-button" title="Rejeitar Adesão">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </form>




                                <form method="post" class="d-inline">
                                    <input type="hidden" name="op" value="dashboard">
                                    <input type="hidden" name="task" value="accept">
                                    <input type="hidden" name="id" value="<?php echo $usuario->getUserId(); ?>">
                                    <button type="submit" class="link-button" title="Aceitar adesão">
                                        <i class="bi bi-check"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>