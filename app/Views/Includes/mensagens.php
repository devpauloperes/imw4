<?php if (isset($_GET["msg"])) : ?>

    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            <strong>Atenção</strong>: <?php echo $_GET["msg"]; ?>
        </div>

       
    </div>
<?php endif; ?>

<?php if (isset($_GET["erro"])) : ?>

    <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            <strong>Atenção</strong> <?php echo $_GET["erro"]; ?>
        </div>

        
    </div>
<?php endif; ?>


<?php if (isset($_GET["info"])) : ?>
   
    <div class="alert alert-primary alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            <strong>Atenção</strong> <?php echo $_GET["info"]; ?>
        </div>

        
    </div>
<?php endif; ?>
