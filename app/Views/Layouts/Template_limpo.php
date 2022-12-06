<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- ===============================================-->
	<!--    Document Title-->
	<!-- ===============================================-->
	<title><?php echo env("TituloSistema") ?></title>

	<!-- ===============================================-->
	<!--    Favicons-->
	<!-- ===============================================-->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>/public/assets/img/illustrations/favicon.ico">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>/public/assets/img/illustrations/favicon.ico">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>/public/assets/img/illustrations/favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>/public/assets/img/illustrations/favicon.ico">
	<!-- <link rel="manifest" href="<?php echo base_url(); ?>/public/assets/img/favicons/manifest.json"> -->
	<meta name="msapplication-TileImage" content="<?php echo base_url(); ?>/public/assets/img/illustrations/logomarca.png">

	<script src="<?php echo base_url(); ?>/public/assets/js/settings.js"></script>
	<script src="<?php echo base_url(); ?>/public/assets/js/app.js"></script>
	<script src="<?php echo base_url(); ?>/public/assets/js/regras.js"></script>

	<!-- ===============================================-->
	<!--    Stylesheets-->
	<!-- ===============================================-->
	<link href="<?php echo base_url(); ?>/public/assets/css/dark.css" rel="stylesheet">

	<style>
		body {
			opacity: 0;
		}
	</style>




</head>


<body>


	<?= $this->renderSection('conteudo') ?>

</body>
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