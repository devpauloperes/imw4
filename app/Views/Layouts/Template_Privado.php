<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- ===============================================-->
	<!--    Document Title-->
	<!-- ===============================================-->
	<title><?php echo env("TituloSistema") ?> - Dashborad</title>

	<!-- ===============================================-->
	<!--    Favicons-->
	<!-- ===============================================-->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>/public/assets/img/illustrations/logomarca.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>/public/assets/img/illustrations/logomarca.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>/public/assets/img/illustrations/logomarca.png">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>/public/assets/img/illustrations/logomarca.png">
	<!-- <link rel="manifest" href="<?php echo base_url(); ?>/public/assets/img/favicons/manifest.json"> -->
	<meta name="msapplication-TileImage" content="<?php echo base_url(); ?>/public/assets/img/illustrations/logomarca.png">

	<script src="<?php echo base_url(); ?>/public/assets/js/settings.js"></script>
	<script src="<?php echo base_url(); ?>/public/assets/js/app.js"></script>
	<script src="<?php echo base_url(); ?>/public/assets/js/regras.js"></script>

	<!-- ===============================================-->
	<!--    Stylesheets-->
	<!-- ===============================================-->
	<link href="<?php echo base_url(); ?>/public/assets/css/modern.css" rel="stylesheet">

	<style>
		body {
			opacity: 0;
		}
	</style>

	
	

</head>


<body>


	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="text-center">
				<a class="sidebar-brand" href="<?php echo base_url(); ?>">
					<img src="<?php echo base_url(); ?>/public/assets/img/illustrations/logomarca-branca.png" width="210" />
				</a>
			</div>
			<div class="sidebar-content">
				<div class="sidebar-user">
					<i class="align-middle me-2 fas fa-fw fa-user-circle" style="font-size: 60px;"></i>
					<div class="fw-bold"><?php echo $_SESSION["UsuarioLogado"]["nome"]; ?></div>
					<small> <?php echo $_SESSION["UsuarioLogado"]["email"]; ?></small>
				</div>
				 <?php echo $this->include("Includes/menus"); ?> 
				
			</div>
		</nav>
		<div class="main">
			<nav class="navbar navbar-expand navbar-theme">
				<a class="sidebar-toggle d-flex me-2">
					<i class="hamburger align-self-center"></i>
				</a>

				<form class="d-none d-sm-inline-block" action="<?php echo base_url(); ?>/promotores" method="GET">
					<input class="form-control form-control-lite" name="nome" type="text" placeholder="Pesquisar no sistema">
				</form>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle position-relative" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<i class="align-middle fas fa-envelope-open"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<!-- <img src="<?php echo base_url(); ?>/public/assets/img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Michelle Bilodeau"> -->
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Michelle Bilodeau</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">5m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<!-- <img src="<?php echo base_url(); ?>/public/assets/img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Kathie Burton"> -->
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Kathie Burton</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<!-- <img src="<?php echo base_url(); ?>/public/assets/img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="Alexander Groves"> -->
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Alexander Groves</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<!-- <img src="<?php echo base_url(); ?>/public/assets/img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Daisy Seger"> -->
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Daisy Seger</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown ms-lg-2">
							<a class="nav-link dropdown-toggle position-relative" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<i class="align-middle fas fa-bell"></i>
								<span class="indicator"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="ms-1 text-danger fas fa-fw fa-bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="ms-1 text-warning fas fa-fw fa-envelope-open"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">6h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="ms-1 text-primary fas fa-fw fa-building"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.1</div>
												<div class="text-muted small mt-1">8h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="ms-1 text-success fas fa-fw fa-bell-slash"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Anna accepted your request.</div>
												<div class="text-muted small mt-1">12h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown ms-lg-2">
							<a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-bs-toggle="dropdown">
								<i class="align-middle fas fa-cog"></i>
							</a>
							<?php echo $this->include("Includes/menu-profile"); ?>
						</li>
					</ul>
				</div>

			</nav>
			<main class="content">
				<?= $this->renderSection('conteudo') ?>
			</main>
			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-8 text-start">
							<!-- caso queira colocar um texto informativo de rodape -->
						</div>
						<div class="col-4 text-end">
							<p class="mb-0">
								&copy; 2022 - <a href="https://www.ducortech.com.br" target="_blank" class="text-muted">Tecnologia Ducotech</a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>

	</div>

	<svg width="0" height="0" style="position:absolute">
		<defs>
			<symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
				<path d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
				</path>
			</symbol>
		</defs>
	</svg>

	
	
	

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Select2
			$(".select2").each(function() {
				$(this)
					.wrap("<div class=\"position-relative\"></div>")
					.select2({
						placeholder: "Selecione",
						dropdownParent: $(this).parent()
					});
			});


		});
	</script>


	<script type="text/javascript">
		$(document).ready(function() {
			$('.date').mask('00/00/0000');
			$('.time').mask('00:00:00');
			$('.date_time').mask('00/00/0000 00:00:00');
			$('.cep').mask('00000-000');
			$('.phone').mask('0000-0000');
			$('.telefone').mask('(00) 0000-0000');
			$('.celular').mask('(00) 0 0000-0000');
			$('.phone_us').mask('(000) 000-0000');
			$('.mixed').mask('AAA 000-S0S');
			$('.cpf').mask('000.000.000-00', {
				reverse: true
			});
			$('.nit').mask('000.00000.00-0', {
				reverse: true
			});
			$('.cnpj').mask('00.000.000/0000-00', {
				reverse: true
			});
			$('.money').mask('000.000.000.000.000,00', {
				reverse: true
			});
			$('.money2').mask("#.##0,00", {
				reverse: true
			});
			$('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
				translation: {
					'Z': {
						pattern: /[0-9]/,
						optional: true
					}
				}
			});
			$('.ip_address').mask('099.099.099.099');
			$('.percent').mask('##0,00%', {
				reverse: true
			});
			$('.clear-if-not-match').mask("00/00/0000", {
				clearIfNotMatch: true
			});
			$('.placeholder').mask("00/00/0000", {
				placeholder: "__/__/____"
			});
			$('.fallback').mask("00r00r0000", {
				translation: {
					'r': {
						pattern: /[\/]/,
						fallback: '/'
					},
					placeholder: "__/__/____"
				}
			});
			$('.selectonfocus').mask("00/00/0000", {
				selectOnFocus: true
			});
			
		});
	</script>
	<?= $this->renderSection('script') ?>
</body>

</html>