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
                <li class="breadcrumb-item active" aria-current="page">Novo Registro</li>
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
            <div class="col-lg-8">
                <?= $this->include('Includes/mensagens') ?>

                <p class="mt-2">Inserir novo registro</p>

            </div>
        </div>
    </div>
</div>

<form method="POST" action="./">
    <?= $this->include($dirView . '/form') ?>
    <?= $this->include('Includes/botao_salvar') ?>            
</form>

<?= $this->endSection() ?>



<?= $this->section('script') ?>


<?= $this->endSection() ?>