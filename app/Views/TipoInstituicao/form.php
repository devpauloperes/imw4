<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Dados do Usuário</h5>
    </div>
    <div class="card-body">
        <div class="row">




            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="nome">Nome*</label>
                <input class="form-control " id="nome" name="nome" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["nome"] : ""; ?>" type="text" placeholder="" required="required">
            </div>

            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="cor">Cor</label>
                <select class="form-control select2" data-bs-toggle="select2" width="fit" name="cor" id="cor" required="required">
                    <option value="" disabled selected>Selecione</option>
                    <?php foreach ($Cores as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["cor"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="sigla">Sigla*</label>
                <input class="form-control " id="sigla" name="sigla" maxlength="1" value="<?php echo (isset($entidade)) ? $entidade["sigla"] : ""; ?>" type="text" placeholder="" required="required">
            </div>


            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="hierarquia">Hierarquia*</label>
                <input class="form-control " id="hierarquia" name="hierarquia" maxlength="1" value="<?php echo (isset($entidade)) ? $entidade["hierarquia"] : ""; ?>" type="text" placeholder="" required="required">
            </div>





        </div>
    </div>
</div>