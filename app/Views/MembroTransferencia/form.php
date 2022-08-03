<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Dados do Histórico</h5>
    </div>
    <div class="card-body">
        <div class="row">

            <input type="hidden" name="membroId" id="membroId" value="<?php echo (isset($entidade)) ? $entidade["membroId"] : $_GET["membroId"]; ?>" />

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6 pf">
                <label for="dataHistorico">Data da Transferência*</label>
                <input class="form-control date" id="dataHistorico" name="dataHistorico" maxlength="20" value="<?php echo (isset($entidade)) ? date("d/m/Y", strtotime($entidade["dataHistorico"])) : date("d/m/Y"); ?>" type="text" placeholder="" required>
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

        </div>
    </div>
</div>