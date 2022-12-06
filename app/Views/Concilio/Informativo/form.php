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
                <label for="subtitulo">Sub Título</label>
                <input class="form-control " id="subtitulo" name="subtitulo" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["subtitulo"] : ""; ?>" type="text" placeholder="" >
            </div>

            <div class="mb-3 col-3">
                  <label for="dataInforme">Data do Informativo</label>
                  <input class="form-control date" id="dataInforme" name="dataInforme" maxlength="" value="<?php echo (isset($entidade) && isset($entidade["dataInforme"])) ? date("d/m/Y", strtotime($entidade["dataInforme"])) : ""; ?>" type="text" placeholder="">
               </div>

          
            <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
            <label for="arquivo">Arquivo <?php echo (isset($entidade) && $entidade["arquivo"] != "") ? '<a href="' . base_url() . '/public/uploads/Informativo/' . $entidade["arquivo"] . '" target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
            <input class="form-control-file" name="arquivo" id="arquivo" type="file">
         </div>


            <div class="mb-3 col-lg-12 col-md-12 col-sm-12">
                <label for="texto">Texto do Informativo</label>
                <textarea name="texto" class="form-control" id="" cols="30" rows="5"><?php echo (isset($entidade)) ? $entidade["texto"] : ""; ?></textarea>
            </div>




        </div>
    </div>
</div>