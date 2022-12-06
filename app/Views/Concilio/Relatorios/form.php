<div class="card mb-3">
    <div class="card-body">
        <div class="row">


            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="pastaId">Pasta</label>
                <select class="form-control select2" data-bs-toggle="select2" width="fit" name="pastaId" id="pastaId" required="required">
                    <option value="" disabled selected>Selecione</option>
                    <?php foreach ($Pasta as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["pastaId"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="nome">Titulo*</label>
                <input class="form-control " id="nome" name="nome" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["nome"] : ""; ?>" type="text" placeholder="" required="required">
            </div>



            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="ordem">Ordem</label>
                <input class="form-control " id="ordem" name="ordem" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["ordem"] : ""; ?>" type="text" placeholder="">
            </div>

            <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
                <label for="arquivo">Arquivo <?php echo (isset($entidade) && $entidade["arquivo"] != "") ? '<a href="' . base_url() . '/public/uploads/Relatorio/' . $entidade["arquivo"] . '" target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
                <input class="form-control-file" name="arquivo" id="arquivo" type="file">
            </div>

            <div class="mb-3 col-lg-12 col-md-12 col-sm-12">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" class="form-control" id="" cols="30" rows="5"><?php echo (isset($entidade)) ? $entidade["descricao"] : ""; ?></textarea>
            </div>



        </div>
    </div>
</div>