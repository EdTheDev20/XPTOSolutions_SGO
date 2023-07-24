<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                        <h2>Gestão de gestores</h2>
                    </div>


                    <div class="col text-right">
                        <a href="index.php?op=creategestores"><button class="btn btn-success">Criar Novo Gestor</button></a>
                    </div>


                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Número de telefone</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($gestoresforAdm as $gestor) : ?>
                        <tr>
                            <td><?php echo $gestor->getUserId(); ?></td>
                            <td><?php echo $gestor->getName(); ?></td>
                            <td><?php echo $gestor->getUsername(); ?></td>
                            <td><?php echo $gestor->getEmail(); ?> </td>
                            <td> <?php echo $gestor->getCellphoneNumber(); ?></td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>