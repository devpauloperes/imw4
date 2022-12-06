<?= $this->extend('Layouts/Template_limpo') ?>

<?= $this->section('conteudo') ?>

<style>
    .corAzul {
        color: #003376;
    }
</style>


<div class="row ">

    <div class="col-12 text-center" style="background-color: #003376 ; border-bottom: solid 1em #ed1c24;">
        <img src="<?php echo base_url(); ?>/public/assets/img/illustrations/imw.png">
    </div>



    <div class="col-12 text-center">
        <h3 class="mt-3">CREDENCIAL DO CLÉRIGO</h3>
    </div>

</div>

<div class="row" style="width: 80% ; margin: 0 auto;">



    <div class="col-5">
        <?php if (isset($clerigo) && ($clerigo["foto"]) != "") : ?>
            <img src="<?php echo base_url(); ?>/public/uploads/Clerigo/<?php echo $clerigo["foto"]; ?>" class="img-fluid img-thumbnail">
        <?php else : ?>
            <i class="align-middle me-2 fas fa-fw fa-user-circle" style="font-size: 4em;"></i>
        <?php endif; ?>
    </div>

    <div class="col-7 mt-3 text-center">
        <h4 class="corAzul text-uppercase"><?php echo $clerigo["nome"]; ?></h4>
        <h5><?php echo $cargo["nome"]; ?></h5>
    </div>


</div>

<div class="row mt-3" style="width: 80% ; margin: 0 auto;">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-8 mb-3">
                    <span class="lead">CPF</span> <br />
                    <span><?php echo $clerigo["cpf"]; ?></span>
                </div>


                <div class="col-4 mb-3">
                    <span class="lead">Rol</span> <br />
                    <span><?php echo $cargo["nome"]; ?></span>
                </div>



                <div class="col-12 mb-3">
                    <span class="lead">Sexo</span> <br />
                    <span><?php echo $clerigo["sexo"]; ?></span>
                </div>

                <div class="col-12 mb-3">
                    <span class="lead">Estado Cívil</span> <br />
                    <span><?php echo ($clerigo["estadoCivil"] == 'C') ? "Casado" : "Solteiro"; ?></span>
                </div>

                <div class="col-8 mb-3">
                    <span class="lead">Nascimento</span> <br />
                    <span><?php echo ($clerigo["dataNascimento"] != null) ? date('d/m/Y', strtotime($clerigo["dataNascimento"]))  : "-"; ?></span>
                </div>

                <div class="col-8 mb-3">
                    <span class="lead">Ordenação</span> <br />
                    <span><?php echo ($clerigo["dataNascimento"] != null) ? date('d/m/Y', strtotime($clerigo["dataNascimento"]))  : "-"; ?></span>
                </div>

                <div class="col-4 mb-3">
                    <span class="lead">Validade</span> <br />
                    <span><?php echo date('Y'); ?></span>
                </div>


            </div>

        </div>
    </div>
</div>

<div class="col-12 text-center mt-2" style="background-color: #003376 ; border-top: solid 1em #ed1c24; min-height: 100vh;">

</div>



<?= $this->endSection() ?>