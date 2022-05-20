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
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Instituições</h5>
								</div>

								<div class="col-auto">
									<div class="avatar">
										<div class="avatar-title rounded-circle bg-primary-dark">
											<i class="align-middle" data-feather="truck"></i>
										</div>
									</div>
								</div>
							</div>
							<h1 class="display-5 mt-1 mb-3">2.562</h1>
							<div class="mb-0">
								<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.65% </span>
								Less sales than usual
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Clérios</h5>
								</div>

								<div class="col-auto">
									<div class="avatar">
										<div class="avatar-title rounded-circle bg-primary-dark">
											<i class="align-middle" data-feather="users"></i>
										</div>
									</div>
								</div>
							</div>
							<h1 class="display-5 mt-1 mb-3">17.212</h1>
							<div class="mb-0">
								<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.50% </span>
								More visitors than usual
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Arrecação no mês</h5>
								</div>

								<div class="col-auto">
									<div class="avatar">
										<div class="avatar-title rounded-circle bg-primary-dark">
											<i class="align-middle" data-feather="dollar-sign"></i>
										</div>
									</div>
								</div>
							</div>
							<h1 class="display-5 mt-1 mb-3">$24.300</h1>
							<div class="mb-0">
								<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 8.35% </span>
								More earnings than usual
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col mt-0">
									<h5 class="card-title">Missionários</h5>
								</div>

								<div class="col-auto">
									<div class="avatar">
										<div class="avatar-title rounded-circle bg-primary-dark">
											<i class="align-middle" data-feather="shopping-cart"></i>
										</div>
									</div>
								</div>
							</div>
							<h1 class="display-5 mt-1 mb-3">43</h1>
							<div class="mb-0">
								<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -4.25% </span>
								Less orders than usual
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




</div>



<?= $this->endSection() ?>