<?= $this->extend('Layouts/Template_Privado') ?>

<?= $this->section('conteudo') ?>

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            <?php echo $titlePage; ?>
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">In&iacute;cio</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/<?php echo $route; ?>">Listagem</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edição</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card gb-title">
    </div>
    <!--/.bg-holder-->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <?= $this->include('Includes/mensagens') ?>

                <p class="mt-2">Altera&ccedil;&atilde;o de registro</p>

            </div>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Formul&aacute;rio de Altera&ccedil;&atilde;o</h5>
    </div>

</div>
<form method="POST" action="update/<?php echo $entidade["id"]; ?>">

    <?= $this->include($dirView . '/form') ?>

    <?= $this->include('Includes/botoes_alterar_apagar') ?>


    <div class="card mb-3">
        <div class="card-header">
            <h5 class="mb-0">Histórico do Membro</h5>
        </div>

        <div class="card-body">
            <div class="row">

                <div class="col-12">
                    <a href="<?php echo base_url(); ?>/membro-historico/new?membroId=<?php echo $entidade["id"] ?>" title="Inserir um novo registro" class="btn btn-primary right"> <i class="fas fa-plus-circle"></i> Novo </a>
                    <table class="table table-striped" style="font-size: 90%; margin-top: 15px;">
                        <thead class="thead-light">
                            <tr>

                                <th>Data</th>
                                <th>Instituicao</th>
                                <th>Descrição da Mudança</th>
                                

                                <th width="150"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($MembroHistorico as $registro) : ?>

                                <tr>

                                    <td><?php echo $registro["dataMovimentacao"]; ?></td>
                                    <td><?php echo $registro["instituicaoNome"]; ?></td>
                                    <td><?php echo $registro["descricao"]; ?></td>

                                    <td class="table-action">
                                        <a href="<?php echo base_url(); ?>/membro-historico/<?php echo $registro["id"]; ?>" title="editar" class="btn"><i class="align-middle fas fa-fw fa-pen"></i></a>
                                        <a href="#<?php echo $registro["id"]; ?>" onclick="remover('membro-historico/delete/<?php echo $registro['id']; ?>');" title="apagar" class="btn"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>

                    

                </div>

            </div>
        </div>
    </div>


</form>

<?= $this->endSection() ?>