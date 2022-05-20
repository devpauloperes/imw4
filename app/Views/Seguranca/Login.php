<?= $this->extend('Layouts/Template_Publico') ?>

<?= $this->section('conteudo') ?>

<div class="mb-3">
  <?php if (isset($_GET["msg"])) : ?>
    <div class="alert alert-info p-3" role="alert"> <?php echo $_GET["msg"]; ?> </div>
  <?php endif ?>

  <?php if (isset($_GET["erro"])) : ?>
    <div class="alert alert-danger p-3" role="alert"> <?php echo $_GET["erro"]; ?> </div>
  <?php endif ?>

</div>

<div class="card">
  <div class="card-body">
    <form method="POST">
      <div class="row">

        <div class="mb-3 mt-3">
          <label for="cpf">Login</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input class="form-control form-control-lg" type="text" id="cpf" name="cpf" placeholder="CPF" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="senha">Senha</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input class="form-control form-control-lg" type="password" id="senha" name="senha" placeholder="Senha" required>
          </div>
          <small>
            <a href="esqueci-minha-senha">Recuperar ou Senha?</a>
          </small>
        </div>

        <label class="container">
          <input type="checkbox" checked="checked" id="salvarCredencial">
          <span class="txt2  text-small" for="salvarCredencial">
            Mantenha-me conectado
          </span>

        </label>


        <div class="mb-3 col-lg-12 col-md-12 col-sm-12 text-center">


          <button class="btn btn-lg btn-primary mb-3 mt-3" type="submit">
            Entrar
          </button>

        </div>

      </div>
    </form>

  </div>
</div>



<?= $this->endSection() ?>