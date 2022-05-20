<?= $this->extend('Layouts/Template_Privado') ?>

<?= $this->section('conteudo') ?>

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Alteração de Senha
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">In&iacute;cio</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/mudar-senha/">alteração de senha</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edi&ccedil;&atilde;o</li>
            </ol>
        </nav>
    </div>
</div>
<?= $this->include('Includes/mensagens') ?>


<div class="card mb-3">
    <div class="card-header">
        
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="update/<?php echo $entidade["id"]; ?>">
                    
                    <?= $this->include('Usuario/MudarSenha/form') ?>

                    <?= $this->include('Includes/botao_salvar') ?>

                </form>
            </div>

        </div>
    </div>
</div>


<?= $this->endSection() ?>



