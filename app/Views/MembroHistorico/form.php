<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Dados do Histórico</h5>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="mb-3 col-lg-5 col-md-5 col-sm-12">
                <label for="tipoHistorico">Tipo de Histórico</label>
                <select class="form-control select2" data-bs-toggle="select2" onchange="viewHistorico(this.value);" width="fit" name="tipoHistorico" id="tipoHistorico" required="required">
                    <option value="" disabled selected>Selecione</option>
                    <?php foreach ($TipoHistorico as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["tipoHistorico"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="hidden" name="membroId" id="membroId" value="<?php echo (isset($entidade)) ? $entidade["membroId"] : $_GET["membroId"]; ?>" />

            <div class="mb-3 col-lg-2 col-md-2 col-sm-6 pf">
                <label for="dataHistorico">Data*</label>
                <input class="form-control date" id="dataHistorico" name="dataHistorico" maxlength="20" value="<?php echo (isset($entidade)) ? date("d/m/Y", strtotime($entidade["dataHistorico"])) : ""; ?>" type="text" placeholder="" required>
            </div>


            <div class="mb-3 col-lg-5 col-md-5 col-sm-12 transferencia">
                <label for="instituicaoOrigemId">Instituição Origem</label>
                <select class="form-control select2" data-bs-toggle="select2" width="fit" name="instituicaoOrigemId" id="instituicaoOrigemId" required="required">
                    <option value="" disabled selected>Selecione</option>
                    <?php foreach ($Instituicao as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["instituicaoOrigemId"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="mb-3 col-lg-5 col-md-5 col-sm-12 transferencia">
                <label for="instituicaoDestinoId">Instituição Destino</label>
                <select class="form-control select2" data-bs-toggle="select2" width="fit" name="instituicaoDestinoId" id="instituicaoDestinoId" required="required">
                    <option value="" disabled selected>Selecione</option>
                    <?php foreach ($Instituicao as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["instituicaoDestinoId"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3 col-lg-5 col-md-5 col-sm-12 exclusao">
                <label for="motivoExclusaoId">Motivo do Desligamento</label>
                <select class="form-control select2" data-bs-toggle="select2" width="fit" name="motivoExclusaoId" id="motivoExclusaoId" required="required">
                    <option value="" disabled selected>Selecione</option>
                    <?php foreach ($MotivoExclusao as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["motivoExclusaoId"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3 col-lg-12 col-md-12 col-sm-12">
                <label for="descricao">Motivo ou Observação </label>
                <textarea class="form-control " name="descricao" id="descricao" rows="5"><?php echo (isset($entidade)) ? $entidade["descricao"] : ""; ?></textarea>
            </div>



        </div>
    </div>
</div>


<script type="text/javascript">
    function viewHistorico(vTipoHistorico){
        if (vTipoHistorico == 1){
            jQuery(".transferencia").show();
        } else {
            jQuery(".transferencia").hide();
        }

        if (vTipoHistorico == 5 ){
            jQuery(".exclusao").show();
        } else {
            jQuery(".exclusao").hide();
        }
    }

    viewHistorico(jQuery("#tipoHistorico").val());
</script>