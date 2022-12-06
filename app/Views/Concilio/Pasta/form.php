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
                <label for="nome">Titulo*</label>
                <input class="form-control " id="nome" name="nome" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["nome"] : ""; ?>" type="text" placeholder="" required="required">
            </div>

            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="ordem">Ordem</label>
                <input class="form-control " id="ordem" name="ordem" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["ordem"] : ""; ?>" type="text" placeholder="" >
            </div>


        </div>
    </div>
</div>