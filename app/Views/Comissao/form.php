<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0"></h5>
    </div>
    <div class="card-body">
        <div class="row">




            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="nome">Nome*</label>
                <input class="form-control " id="nome" name="nome" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["nome"] : ""; ?>" type="text" placeholder="" required="required">
            </div>   
            
            <div class="mb-3 col-lg-3 col-md-3 col-sm-6 pf">
                <label for="dataInicio">Data de Inicio*</label>
                <input class="form-control date cardMembro" id="dataInicio" name="dataInicio" maxlength="20" value="<?php echo (isset($entidade)  && isset($entidade["dataInicio"])) ? date('d/m/Y', strtotime($entidade["dataInicio"])) : ""; ?>" type="text" placeholder="" required>

            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6 pf">
                <label for="dataFim">Data Fim</label>
                <input class="form-control date cardMembro" id="dataFim" name="dataFim" maxlength="20" value="<?php echo (isset($entidade)  && isset($entidade["dataFim"])) ? date('d/m/Y', strtotime($entidade["dataFim"])) : ""; ?>" type="text" placeholder="">

            </div>



        </div>
    </div>
</div>