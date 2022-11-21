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
        <form action="aspirante-documentos/new">
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->include('Includes/mensagens') ?>

                    <h4 class="mt-2"> <b>Atenção: selecione o ano corretamente abaixo para que os dados sejam recepcionados com 
                        qualidade pela comissão ministerial.</b> </h4>


                </div>

                

                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                    <label for="nome">Escolha qual ano será o seu envio</label>

                    <div class="mt-3">
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ano" value="1">
                            <span class="form-check-label">
                                1 Ano
                            </span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ano" value="2">
                            <span class="form-check-label">
                                2 Ano
                            </span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ano" value="3">
                            <span class="form-check-label">
                                3 Ano
                            </span>
                        </label>
                    </div>


                </div>



                <div class="form-group col-lg-3 col-md-3 col-sm-6 mt-4">
                    <button class="btn btn-primary"><i class="fa fa-external-link-alt" aria-hidden="true"></i> Iniciar envio da documentação</button>
                </div>
            </div>
        </form>
    </div>
</div>




<?= $this->endSection() ?>