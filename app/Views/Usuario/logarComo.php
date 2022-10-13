<?= $this->extend('Layouts/Template_Privado') ?>

<?= $this->section('conteudo') ?>


<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            <?php echo $tituloPage; ?>
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">In&iacute;cio</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/<?php echo $rota; ?>"><?php echo $tituloPage; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Novo Registro</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <?= $this->include('Includes/mensagens') ?>
    </div>
</div>


<form method="POST" action="./" enctype="multipart/form-data">

    <div class="card mb-3">
        <div class="card-header">
            <h5 class="mb-0">Formul&aacute;rio de Cadastro</h5>
        </div>
        <div class="card-body ">
            <div class="row">

                <div class="col-6">
                    <label for="usuarioId" class="mb-2">Selecione o Usuário</label>
                    <select class="form-control select2" data-bs-toggle="select2" name="usuarioId" id="usuarioId">
                        <?php foreach ($Usuarios as $item) : ?>
                            <option value="<?php echo $item["id"]; ?>">
                                <?php echo $item["nome"]; ?> -
                                <?php echo $item["email"]; ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
            </div>
        </div>

    </div>

    <?= $this->include('Includes/botao_salvar') ?>

</form>




<?= $this->endSection() ?>