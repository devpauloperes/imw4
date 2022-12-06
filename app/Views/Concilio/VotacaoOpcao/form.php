<div class="card mb-3">
    <div class="card-body">
        <div class="row">


            <input type="hidden" name="votacaoId" value="<?php echo (isset($entidade)) ? $entidade["votacaoId"] : $_GET["votacaoId"]; ?>">

            <div class="mb-3 col-lg-9 col-md-9 col-sm-12">
                <label for="nome">Nome da Opção de Voto</label>
                <input class="form-control " id="nome" name="nome" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["nome"] : ""; ?>" type="text" placeholder="" required="required">
            </div>


            <div class="mb-3 col-lg-3 col-md-3 col-sm-12">
                <label for="ordem">Ordem</label>
                <input class="form-control " id="ordem" name="ordem" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["ordem"] : ""; ?>" type="text" placeholder="">
            </div>



            <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
                <label for="foto">Foto <?php echo (isset($entidade) && $entidade["foto"] != "") ? '<a href="' . base_url() . '/public/uploads/Voto/' . $entidade["foto"] . '" target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
                <input class="form-control-file" name="foto" id="foto" type="file">
            </div>



            <div class="mb-3 col-lg-12 col-md-12 col-sm-12">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" class="form-control" id="" cols="30" rows="5"><?php echo (isset($entidade)) ? $entidade["descricao"] : ""; ?></textarea>
            </div>


        </div>
    </div>
</div>