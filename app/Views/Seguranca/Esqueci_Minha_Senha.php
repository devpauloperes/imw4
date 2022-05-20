<?= $this->extend('Layouts/Template_Publico') ?>

<?= $this->section('conteudo') ?>


    
        
        <form method="POST">
            <div class="mb-3">
                <label>Esqueceu sua senha? <br /> </label>
                <input class="form-control form-control-lg" type="text" name="cpf" placeholder="Entre com o seu CPF cadastrado">
            </div>

            <div class="text-center mt-3">
                <button class="btn btn-lg btn-primary btn-block mt-3" type="submit" name="submit">Recuperar Senha</button>
            </div>
        </form>
    
   

<?= $this->endSection() ?>