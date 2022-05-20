<?= $this->extend('Layouts/Template_Publico') ?>

<?= $this->section('conteudo') ?>

<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
    <a class="d-flex flex-center mb-4" href="../../index.html">
        <img class="mr-2" src="<?php echo base_url(); ?>/public/assets/img/illustrations/logomarca.png" alt="" width="200" />
        <span class="text-sans-serif font-weight-extra-bold fs-5 d-inline-block"></span>
    </a>
    <div class="card">
        <div class="card-body p-4 p-sm-5">
            <h5 class="text-center">Trocar Senha</h5>
            <form class="mt-3" method="POST">
                <input type="hidden" name="hash" value="<?php echo $_GET["usuario"]; ?>" />
                <div class="form-group"><input class="form-control" type="password" name="senha" placeholder="Nova Senha" /></div>
                <div class="form-group"><input class="form-control" type="password" name="senha2" placeholder="Repita a Senha" /></div>
                <button class="btn btn-primary btn-block mt-3" type="submit" name="submit">Alterar Senha</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>