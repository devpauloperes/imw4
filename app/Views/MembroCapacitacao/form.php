<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Dados do Histórico</h5>
    </div>
    <div class="card-body">
        <div class="row">

            <input type="hidden" name="membroId" id="membroId" value="<?php echo (isset($entidade)) ? $entidade["membroId"] : $_GET["membroId"]; ?>" />

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6 pf">
                <label for="dataCapacitacao">Data da Capacitação*</label>
                <input class="form-control date" id="dataCapacitacao" name="dataCapacitacao" maxlength="20" value="<?php echo (isset($entidade)) ? date("d/m/Y", strtotime($entidade["dataCapacitacao"])) : ""; ?>" type="text" placeholder="" required>
            </div>

            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="nome">Nome</label>
                <input class="form-control " id="nome" name="nome" maxlength="200" value="<?php echo (isset($entidade)) ? $entidade["nome"] : ""; ?>" type="text" placeholder="">
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-12">
                <label for="cargaHoraria">Carga Horária</label>
                <input class="form-control " id="cargaHoraria" name="cargaHoraria" maxlength="200" value="<?php echo (isset($entidade)) ? $entidade["cargaHoraria"] : ""; ?>" type="number" placeholder="">
            </div>

            <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
                <label for="certificado">Certificao</label>
                <input class="form-control form-control-file" name="certificado" id="certificado" type="file" > <!--accept="image/gif, image/jpeg, image/png" -->
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-12">
                        <label for="isIWE">Feito no IWE?*</label>
                        <select class="form-control select2" data-bs-toggle="select2" width="fit" name="isIWE" id="isIWE" required="required">
                            <option value="" disabled selected>Selecione</option>
                            <?php foreach ($Boleano as $item) : ?>
                                <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["isIWE"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

        </div>
    </div>
</div>