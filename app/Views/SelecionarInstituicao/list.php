<?= $this->extend('Layouts/Template_Publico_Formulario') ?>

<?= $this->section('conteudo') ?>

<h1 class="h2 text-center">
    <?php echo $titlePage; ?>
</h1>

<div class="card mb-3">

    <div class="card-body">
        <div class="row">

            <div class="col-12 ">
                
                <table class="table table-striped mb-3" >
                    <thead class="thead-light">
                        <tr>

                            <th>Nome da Instituição</th>                            

                            <th width="80"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registros as $registro) : ?>

                            <tr>

                                <td><?php echo $registro["nome"]; ?></td>

                                <td class="table-action">
                                    <a href="<?php echo base_url(); ?>/<?php echo $route; ?>/<?php echo $registro["id"]; ?>" title="editar" class="btn">
                                        <i class="align-middle me-2 fas fa-fw fa-arrow-alt-circle-right" style="font-size: 30px;"></i>
                                    </a>                                    
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
                
                <div style="margin-top: 15px; width: 70%; margin: 0 auto;">
                <?= $pager->links("default", "bootstrap4") ?>
                </div>

            </div>

        </div>
    </div>
</div>


<?= $this->endSection() ?>