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
                        <h3>Total de Presentes: <?php echo $Presentes; ?></h3>
                        <p class="mt-2">Atenção: Todas as votações foram atualizadas conforme o sistema de presenças: https://imw.azurewebsites.net/concilio/4/api/participantes?Ispresente_IsLike=1</p>


                </div>

                
            </div>
        </form>
    </div>
</div>


<?= $this->endSection() ?>