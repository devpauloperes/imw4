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
                <label for="corun">Quórum</label>
                <input class="form-control " id="corun" name="corun" maxlength="1" value="<?php echo (isset($entidade)) ? $entidade["corun"] : ""; ?>" type="text" placeholder="" ">
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-12">
                <label for="isVotacaoAberta">LIberado para votação?</label>
                <select class="form-control select2" data-bs-toggle="select2" width="fit" name="isVotacaoAberta" id="isVotacaoAberta" required="required">
                    <option value="" disabled selected>Selecione</option>
                    <?php foreach ($votacaoAberta as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["isVotacaoAberta"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="mb-3 col-lg-12 col-md-12 col-sm-12">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" class="form-control" id="" cols="30" rows="5"><?php echo (isset($entidade)) ? $entidade["descricao"] : ""; ?></textarea>
            </div>




        </div>
    </div>
</div>