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

                    <p class="mt-3">Total de membros no rol: <?= $pager->getTotal(); ?></p>


                </div>

              
            </div>
        </form>
    </div>
</div>

<div class="card mb-3">
    

    <div class="card-body">
        <div class="row">

            <div class="col-12">
                
                <table class="table table-striped" style="font-size: 90%; margin-top: 15px;">
                    <thead class="thead-light">
                        <tr>                            
                            <th>Nome</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registros as $registro) : ?>

                            <tr>                                
                                <td><?php echo $registro["nome"]; ?></td>
                                
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