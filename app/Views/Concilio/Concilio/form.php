<div class="card mb-3">
    <div class="card-body">
        <div class="row">



            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="nome">Nome*</label>
                <input class="form-control " id="nome" name="nome" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["nome"] : ""; ?>" type="text" placeholder="" required="required">
            </div>


            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="numero">Numero</label>
                <input class="form-control " id="numero" name="numero" maxlength="1" value="<?php echo (isset($entidade)) ? $entidade["numero"] : ""; ?>" type="text" placeholder="" ">
            </div>

            <div class=" mb-3 col-3">
                <label for="dataInicio">Data de Início*</label>
                <input class="form-control date" id="dataInicio" name="dataInicio" maxlength="" value="<?php echo (isset($entidade) && isset($entidade["dataInicio"])) ? date("d/m/Y", strtotime($entidade["dataInicio"])) : ""; ?>" type="text" placeholder="" required="required">
            </div>


            <div class="mb-3 col-3">
                <label for="dataFim">Data do Fim*</label>
                <input class="form-control date" id="dataFim" name="dataFim" maxlength="" value="<?php echo (isset($entidade) && isset($entidade["dataFim"])) ? date("d/m/Y", strtotime($entidade["dataFim"])) : ""; ?>" type="text" placeholder="" required="required">
            </div>


            <div class="mb-3 col-lg-12 col-md-12 col-sm-12">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" class="form-control" id="" cols="30" rows="5"><?php echo (isset($entidade)) ? $entidade["descricao"] : ""; ?></textarea>
            </div>




        </div>
    </div>
</div>