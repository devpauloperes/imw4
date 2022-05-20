<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Dados do Usuário</h5>
    </div>
    <div class="card-body">
        <div class="row">


       

            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="nome">Nome*</label>
                <input class="form-control " id="nome" name="nome" maxlength="200" value="<?php echo (isset($entidade)) ? $entidade["nome"] : ""; ?>" type="text" placeholder="" required="required">
            </div>


            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="email">E-mail*</label>
                <input class="form-control " id="email" name="email" maxlength="200" value="<?php echo (isset($entidade)) ? $entidade["email"] : ""; ?>" type="text" placeholder="" required="required">
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="celular">Celular/WhastApp*</label>
                <input class="form-control celular" id="celular" name="celular" maxlength="17" value="<?php echo (isset($entidade)) ? $entidade["celular"] : ""; ?>" type="text" placeholder="" required="required">
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="cpf">CPF*</label>
                <input class="form-control cpf" id="cpf" name="cpf" maxlength="14" value="<?php echo (isset($entidade)) ? $entidade["cpf"] : ""; ?>" type="text" placeholder="" required="required">
            </div>

            <div class="mb-3 col-lg-2 col-md-2 col-sm-6">
                <label for="senha">Senha*</label>
                <input class="form-control " id="senha" name="senha" maxlength="200" value="<?php echo (isset($entidade)) ? $entidade["senha"] : ""; ?>" type="password" placeholder="" required="required">
            </div>


            <div class="mb-3">

                <div class="custom-control custom-switch">
                    <input class="custom-control-input" name="isAtivo" id="isAtivo" value="1" type="checkbox" <?php echo (isset($entidade) and '1' == $entidade["isAtivo"]) ? 'checked="checked"' : ""; ?>>
                    <label class="custom-control-label" for="isAtivo">Ativo?</label>
                </div>
            </div>

        </div>
    </div>
</div>