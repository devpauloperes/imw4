<?= $this->extend('Layouts/Template_Privado') ?>

<?= $this->section('conteudo') ?>

<div class="container-fluid">

	<div class="header">
		<h1 class="header-title">
			Bem vindo(a)
		</h1>
		<p class="header-subtitle">ao sistema <?php echo env("TituloSistema"); ?>.</p>
	</div>


	<div class="col-xl-12 col-xxl-12 d-flex">
		<div class="w-100">
			
		</div>
	</div>




</div>



<?= $this->endSection() ?>