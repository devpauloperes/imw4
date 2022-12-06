<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Dados do Dependente</h5>
    </div>
    <div class="card-body">
        <div class="row">

            <input class="form-control " id="clerigoId" name="clerigoId" value="<?php echo (isset($entidade)) ? $entidade["clerigoId"] : $_GET["id"]; ?>" type="hidden">

            <div class="mb-3 col-lg-3 col-md-4 col-sm-12">
                  <label for="areaCapacitacaoId">Área*</label>
                  <select class="form-control select2" data-bs-toggle="select2" width="fit" name="areaCapacitacaoId" id="areaCapacitacaoId" required="required">
                     <option value="" disabled selected>Selecione</option>
                     <?php foreach ($area as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["areaCapacitacaoId"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>
            
               <div class="mb-3 col-lg-3 col-md-4 col-sm-12">
                  <label for="tipoCapacitacaoId">Tipo*</label>
                  <select class="form-control select2" data-bs-toggle="select2" width="fit" name="tipoCapacitacaoId" id="tipoCapacitacaoId" required="required">
                     <option value="" disabled selected>Selecione</option>
                     <?php foreach ($tipo as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["tipoCapacitacaoId"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>

            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="nome">Nome*</label>
                <input class="form-control " id="nome" name="nome" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["nome"] : ""; ?>" type="text" placeholder="" required="required">
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-12">
                <label for="cargaHoraria">Carga Horária*</label>
                <input class="form-control " id="cargaHoraria" name="cargaHoraria" maxlength="9" value="<?php echo (isset($entidade)) ? $entidade["cargaHoraria"] : ""; ?>" type="text" placeholder="" required="required">
            </div>

            

         <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
            <label for="certificado">Certificado (Imagem ou PDF) <?php echo (isset($entidade) && $entidade["certificado"] != "") ? '<a href="' . base_url() . '/public/uploads/Certificado/' . $entidade["certificado"] . '" target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
            <input class="form-control-file" name="certificado" id="certificado" type="file">
         </div>






        </div>
    </div>
</div>