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
                <li class="breadcrumb-item"><a href="#"><?php echo $titlePage; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Listagem</li>
            </ol>
        </nav>
    </div>
</div>



<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0 text-center">Votação: "<?php echo $Votacao["nome"]; ?>"</h5>
        <h5 class="mb-0">Opções de Voto</h5>
    </div>

    <div class="card-body">
        <div class="row">

            <div class="col-12">
                <a href="<?php echo base_url(); ?>/<?php echo $route; ?>/new?votacaoId=<?php echo $_GET["votacaoId"]; ?>" title="Inserir um novo registro" class="btn btn-primary right"> <i class="fas fa-plus-circle"></i> Novo </a>
                <table class="table table-striped" style="font-size: 90%; margin-top: 15px;">
                    <thead class="thead-light">
                        <tr>

                            <th>Nome</th>
                            <th>Ordem de exibição</th>
                            
                            <th width="150"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registros as $registro) : ?>

                            <tr>

                                <td><?php echo $registro["nome"]; ?></td>
                                <td><?php echo $registro["ordem"]; ?></td>
                                
                                
                                <td class="table-action">
                                    <a href="<?php echo base_url(); ?>/concilio-votacao-opcao/<?php echo $registro["id"]; ?>" title="editar" class="btn"><i class="align-middle fas fa-fw fa-pen"></i></a>
                                    <a href="#<?php echo $registro["id"]; ?>" onclick="remover('<?php echo $route; ?>/delete/<?php echo $registro['id']; ?>');" title="apagar" class="btn"><i class="align-middle fas fa-fw fa-trash"></i></a>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>

                <?= $pager->links("default", "bootstrap4") ?>

            </div>

        </div>
    </div>
</div>


<?= $this->endSection() ?>