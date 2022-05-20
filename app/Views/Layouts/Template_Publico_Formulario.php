<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title><?php echo env("TituloSistema") ?></title>

  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
  <!-- -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>/public/assets/img/illustrations/favicon.ico">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>/public/assets/img/illustrations/favicon.ico">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>/public/assets/img/illustrations/favicon.ico">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>/public/assets/img/illustrations/favicon.ico">
  <link rel="manifest" href="<?php echo base_url(); ?>/public/assets/img/favicons/manifest.json">
  <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>/public/assets/img/illustrations/logomarca.png">


  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <!--   
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="<?php echo base_url(); ?>/public/assets/lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/public/assets/css/theme.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/public/assets/css/loginContainer.css" rel="stylesheet">
    -->

  <link href="<?php echo base_url(); ?>/public/assets/css/modern.css" rel="stylesheet">
  <style>
    body {
      opacity: 0;
    }
  </style>
  <script src="<?php echo base_url(); ?>/public/assets/js/settings.js"></script>

</head>

<body>



  <div class="splash">
    <div class="splash-icon"></div>
  </div>

  <main>

    <div class="text-center mt-3">
      <img src="<?php echo base_url(); ?>/public/assets/img/illustrations/logomarca.png">
    </div>

    <div class="container">

      <div class="card mt-5">
        <div class="card-body">
          <div class="m-sm-4">


            <?= $this->renderSection('conteudo') ?>


          </div>

        </div>
      </div>

    </div>
  </main>


  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->

  <!--
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>/public/assets/lib/@fortawesome/all.min.js"></script>
  <script src="<?php echo base_url(); ?>/public/assets/lib/stickyfilljs/stickyfill.min.js"></script>
  <script src="<?php echo base_url(); ?>/public/assets/lib/sticky-kit/sticky-kit.min.js"></script>
  <script src="<?php echo base_url(); ?>/public/assets/lib/is_js/is.min.js"></script>
  <script src="<?php echo base_url(); ?>/public/assets/lib/lodash/lodash.min.js"></script>
  <script src="<?php echo base_url(); ?>/public/assets/lib/perfect-scrollbar/perfect-scrollbar.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
  <script src="<?php echo base_url(); ?>/public/assets/lib/leaflet/leaflet.js"></script>
  <script src="<?php echo base_url(); ?>/public/assets/lib/leaflet.markercluster/leaflet.markercluster.js"></script>
  <script src="<?php echo base_url(); ?>/public/assets/lib/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>
  <script src="<?php echo base_url(); ?>/public/assets/js/theme.min.js"></script>
  -->


  <svg width="0" height="0" style="position:absolute">
    <defs>
      <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
        <path d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
        </path>
      </symbol>
    </defs>
  </svg>
  <script src="<?php echo base_url(); ?>/public/assets/js/app.js"></script>
  <?= $this->renderSection('script') ?>

</body>

</html>