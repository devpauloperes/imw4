<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Dados do Histórico</h5>
    </div>
    <div class="card-body">
        <div class="row">

            <input type="hidden" name="membroId" id="membroId" value="<?php echo (isset($entidade)) ? $entidade["membroId"] : $_GET["membroId"]; ?>" />

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6 pf">
                <label for="dataMovimentacao">Data da Movimentação*</label>
                <input class="form-control date" id="dataMovimentacao" name="dataMovimentacao" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["dataMovimentacao"] : ""; ?>" type="text" placeholder="" required>
            </div>


            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="instituicaoId">Instituição</label>
                <select class="form-control select2" data-bs-toggle="select2" width="fit" name="instituicaoId" id="instituicaoId" required="required">
                    <option value="" disabled selected>Selecione</option>
                    <?php foreach ($Instituicao as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["instituicaoId"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3 col-lg-12 col-md-12 col-sm-12">
                <label for="descricao">Motivo/Descrição da mudança</label>
                <textarea class="form-control " name="descricao" id="descricao" rows="5"><?php echo (isset($entidade)) ? $entidade["descricao"] : ""; ?></textarea>
            </div>



        </div>
    </div>
</div>