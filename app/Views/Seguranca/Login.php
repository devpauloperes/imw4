<?= $this->extend('Layouts/Template_Publico') ?>

<?= $this->section('conteudo') ?>

<div class="mb-3">
  <?php if (isset($_GET["msg"])) : ?>
    <div class="alert alert-info" role="alert"> <?php echo $_GET["msg"]; ?> </div>
  <?php endif ?>

  <?php if (isset($_GET["erro"])) : ?>
    <div class="alert alert-danger" role="alert"> <?php echo $_GET["erro"]; ?> </div>
  <?php endif ?>

</div>

<form method="POST">
  <div class="row">

    <div class="mb-3  col-lg-12 col-md-12 col-sm-12">
      <label for="cpf">Login:</label>
      <div class="input-group">
        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
        <input class="form-control" type="text" id="cpf" name="cpf" placeholder="CPF" required>
      </div>
    </div>

    <div class="mb-3 col-lg-12 col-md-12 col-sm-12">
      <label for="senha">Senha:</label>
      <div class="input-group">
        <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
        <input class="form-control" type="password" id="senha" name="senha" placeholder="Senha" required>
      </div>

    </div>

    <div class="mb-3 col-lg-12 col-md-12 col-sm-12 text-center">
      <label class="container"><span class="txt2" for="salvarCredencial">
          Mantenha-me conectado
        </span>
        <input type="checkbox" checked="checked" id="salvarCredencial">
        <span class="checkmark"></span>
      </label>

      <div class="text-center p-t-12 mb-3">

        Esqueceu seu

        <a class="txt2" href="esqueci-minha-senha">
          Usuário ou Senha?
        </a>
      </div>


      <button class="btn btn-primary mb-3 mt-3" type="submit">
        Entrar
      </button>


      
      

    </div>


  </div>
</form>



<?= $this->endSection() ?>