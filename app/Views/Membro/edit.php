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
<form method="POST" action="update/<?php echo $entidade["id"]; ?>" enctype="multipart/form-data">

    <?= $this->include($dirView . '/form') ?>

    

    <div class="col-12 text-center mt-3">
        <button class="btn btn-info mb-3" type="submit"><i class="fas fa-edit"></i> Alterar</button>

        <?php if ($entidade["tipoPessoa"] == 1) : ?>
        <button type="button mb-3" style="margin-top: -17px;" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Alterar Situação
        </button>
        <div class="dropdown-menu" style="">
            <a class="dropdown-item" href="<?php echo base_url(); ?>/membro-transferencia/new?membroId=<?php echo $entidade["id"] ?>">Transferir para outra igreja</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Aplicar Disciplina</a>
            <a class="dropdown-item" href="#">Desligar Membro</a>
        </div>
        <?php endif; ?>

        <button class="btn btn-danger mb-3" type="button" onclick="remover('delete/<?php echo $entidade["id"]; ?>');"><i class="fas fa-trash-alt"></i> Apagar</button>
    </div>

    <?php if ($entidade["tipoPessoa"] == 1) : ?>
    <div class="card mb-3 cardMembro">
        <div class="card-header">
            <h5 class="mb-0" id="historicos">Histórico</h5>
        </div>

        <div class="card-body">
            <div class="row">

                <div class="col-12">
                    <!-- <a href="<?php echo base_url(); ?>/membro-historico/new?membroId=<?php echo $entidade["id"] ?>" title="Inserir um novo registro" class="btn btn-primary right"> <i class="fas fa-plus-circle"></i> Novo Histórico </a> -->
                    <table class="table table-striped" style="font-size: 90%; margin-top: 15px;">
                        <thead class="thead-light">
                            <tr>

                                <th>Data</th>
                                <th>Instituição de Origem</th>
                                <th>Instituição de Destino</th>
                                <th>Descrição da Mudança</th>


                                <th width="150"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($MembroHistorico as $registro) : ?>

                                <tr>

                                    <td><?php echo date("d/m/Y", strtotime($registro["dataHistorico"])); ?></td>
                                    <td><?php echo $registro["origemNome"]; ?></td>
                                    <td><?php echo $registro["destinoNome"]; ?></td>
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



    <div class="card mb-3 cardMembro">
        <div class="card-header">
            <h5 class="mb-0" id="capacitacoes">Capacitações</h5>

        </div>

        <div class="card-body">
            <div class="row">

                <div class="col-12">
                    <a href="<?php echo base_url(); ?>/membro-capacitacao/new?membroId=<?php echo $entidade["id"] ?>" title="Inserir um novo registro" class="btn btn-primary right"> <i class="fas fa-plus-circle"></i> Nova Capacitação </a>
                    <table class="table table-striped" style="font-size: 90%; margin-top: 15px;">
                        <thead class="thead-light">
                            <tr>

                                <th>Nome da Capacitação</th>
                                <th>Data </th>
                                <th>Carga Horária</th>
                                <th>Certificado</th>


                                <th width="150"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($MembroCapacitacao as $registro) : ?>

                                <tr>

                                    <td><?php echo $registro["nome"]; ?></td>
                                    <td><?php echo date("d/m/Y", strtotime($registro["dataCapacitacao"])); ?></td>
                                    <td><?php echo $registro["cargaHoraria"]; ?></td>
                                    <td>
                                        <?php if ($registro["certificado"] = "") :  ?>
                                            <a href="<?php echo base_url(); ?>/public/uploads/Certificado/<?php echo $registro["certificado"]; ?>">Baixar Certificado</a>
                                        <?php endif; ?>
                                    </td>

                                    <td class="table-action">
                                        <a href="<?php echo base_url(); ?>/membro-capacitacao/<?php echo $registro["id"]; ?>" title="editar" class="btn"><i class="align-middle fas fa-fw fa-pen"></i></a>
                                        <a href="#<?php echo $registro["id"]; ?>" onclick="remover('membro-capacitacao/delete/<?php echo $registro['id']; ?>');" title="apagar" class="btn"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>



                </div>

            </div>
        </div>
    </div>

    <?php endif; ?>


</form>

<?= $this->endSection() ?>