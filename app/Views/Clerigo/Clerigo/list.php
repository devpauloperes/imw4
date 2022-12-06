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
    <div class="bg-holder d-none d-lg-block bg-card gb-title">
    </div>
    <!--/.bg-holder-->
    <div class="card-body">
        <form action="">
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->include('Includes/mensagens') ?>

                    <p class="mt-2">Filtros para pesquisa</p>


                </div>

                <div class="form-group col-lg-10 col-md-10 col-sm-9">
                    <label for="nome">Nome</label>
                    <input class="form-control " id="nome" name="nome" maxlength="200" value="<?php echo (isset($_GET["nome"])) ? $_GET["nome"] : ""; ?>" type="text" placeholder="">
                </div>

               

                <div class="form-group col-lg-1 col-md-1 col-sm-6 mt-4">
                    <button class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Listagem de Registros</h5>
    </div>

    <div class="card-body">
        <div class="row">

            <div class="col-12">
                <a href="<?php echo base_url(); ?>/<?php echo $route; ?>/new" title="Inserir um novo registro" class="btn btn-primary right"> <i class="fas fa-plus-circle"></i> Novo </a>
                <table class="table table-striped" style="font-size: 90%; margin-top: 15px;">
                    <thead class="thead-light">
                        <tr>

                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Estado</th>
                            <th>Cidade</th>
                            <th>E-mail</th>
                            <th>Telefone</th>

                            
                            <th width="250"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registros as $registro) : ?>

                            <tr>

                                <td><?php echo $registro["nome"]; ?></td>
                                <td><?php echo $registro["cpf"]; ?></td>
                                <td><?php echo $registro["estado"]; ?></td>
                                <td><?php echo $registro["cidade"]; ?></td>
                                <td><?php echo $registro["email"]; ?></td>
                                <td><?php echo $registro["celular"]; ?></td>
                                
                                <td class="table-action">
                                    <a href="<?php echo base_url(); ?>/clerigo-carteira-ministerial/<?php echo $registro["id"]; ?>" title="editar" class="btn"><i class="align-middle fas fa-fw fa-address-card"></i></a>
                                    <a href="<?php echo base_url(); ?>/<?php echo $route; ?>/<?php echo $registro["id"]; ?>" title="editar" class="btn"><i class="align-middle fas fa-fw fa-pen"></i></a>
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