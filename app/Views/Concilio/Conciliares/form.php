<div class="card mb-3">
    <div class="card-body">
        <div class="row">


            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="concilioId">Concílio</label>
                <select class="form-control select2" data-bs-toggle="select2" width="fit" name="concilioId" id="concilioId" required="required">
                    <option value="" disabled selected>Selecione</option>
                    <?php foreach ($Concilio as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["concilioId"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="nome">Nome*</label>
                <input class="form-control " id="nome" name="nome" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["nome"] : ""; ?>" type="text" placeholder="" required="required">
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="cpf">CPF</label>
                <input class="form-control cpf" id="cpf" name="cpf" maxlength="11" value="<?php echo (isset($entidade)) ? $entidade["cpf"] : ""; ?>" type="text" placeholder="">
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="celular">Celular</label>
                <input class="form-control celular" id="celular" name="celular" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["celular"] : ""; ?>" type="text" placeholder="">
            </div>

            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="email">E-mail</label>
                <input class="form-control " id="email" name="email" maxlength="200" value="<?php echo (isset($entidade)) ? $entidade["email"] : ""; ?>" type="text" placeholder="">
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="cidade">Cidade</label>
            <input class="form-control " id="cidade" name="cidade" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["cidade"] : ""; ?>" type="text" placeholder="">
         </div>


         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="estado">Estado</label>
            <input class="form-control " id="estado" name="estado" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["estado"] : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="igreja">Igreja/Congregação</label>
            <input class="form-control " id="igreja" name="igreja" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["igreja"] : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="distrito">Distrito</label>
            <input class="form-control " id="distrito" name="distrito" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["distrito"] : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="senha">Senha</label>
            <input class="form-control " id="senha" name="senha" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["senha"] : ""; ?>" type="text" placeholder="">
         </div>

        </div>
    </div>
</div>