<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Dados do Dependente</h5>
    </div>
    <div class="card-body">
        <div class="row">

            <input class="form-control " id="clerigoId" name="clerigoId" value="<?php echo (isset($entidade)) ? $entidade["clerigoId"] : $_GET["id"]; ?>" type="hidden">


            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="nome">Nome*</label>
                <input class="form-control " id="nome" name="nome" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["nome"] : ""; ?>" type="text" placeholder="" required="required">
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="cpf">CPF</label>
                <input class="form-control cpf" id="cpf" name="cpf" maxlength="11" value="<?php echo (isset($entidade)) ? $entidade["cpf"] : ""; ?>" type="text" placeholder="">
            </div>

            <div class="mb-3 col-3">
                  <label for="dataNascimento">Data de Nascimento*</label>
                  <input class="form-control date" id="dataNascimento" name="dataNascimento" maxlength="" value="<?php echo (isset($entidade) && isset($entidade["dataNascimento"])) ? date("d/m/Y", strtotime($entidade["dataNascimento"])) : ""; ?>" type="text" placeholder="" required="required">
               </div>


               <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
            <label for="arquivoCpf">CPF <?php echo (isset($entidade) && $entidade["arquivoCpf"] != "") ? '<a href="' . base_url() . '/public/uploads/Dependente/' . $entidade["arquivoCpf"] . '" target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
            <input class="form-control-file" name="arquivoCpf" id="arquivoCpf" type="file">
         </div>

         <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
            <label for="arquivoRg">RG <?php echo (isset($entidade) && $entidade["arquivoRg"] != "") ? '<a href="' . base_url() . '/public/uploads/Dependente/' . $entidade["arquivoRg"] . '" target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
            <input class="form-control-file" name="arquivoRg" id="arquivoRg" type="file">
         </div>

         <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
            <label for="arquivoTituloEleitor">Titulo de Eleitor <?php echo (isset($entidade) && $entidade["arquivoTituloEleitor"] != "") ? '<a href="' . base_url() . '/public/uploads/Dependente/' . $entidade["arquivoTituloEleitor"] . '" target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
            <input class="form-control-file" name="arquivoTituloEleitor" id="arquivoTituloEleitor" type="file">
         </div>
         
         <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
            <label for="arquivoCarteiraVacina">Carteira de Vacina <?php echo (isset($entidade) && $entidade["arquivoCarteiraVacina"] != "") ? '<a href="' . base_url() . '/public/uploads/Dependente/' . $entidade["arquivoCarteiraVacina"] . '" target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
            <input class="form-control-file" name="arquivoCarteiraVacina" id="arquivoCarteiraVacina" type="file">
         </div>

         <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
            <label for="arquivoCertidaoNascimento">Certidão de Nascimento <?php echo (isset($entidade) && $entidade["arquivoCertidaoNascimento"] != "") ? '<a href="' . base_url() . '/public/uploads/Dependente/' . $entidade["arquivoCertidaoNascimento"] . '" target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
            <input class="form-control-file" name="arquivoCertidaoNascimento" id="arquivoCertidaoNascimento" type="file">
         </div>






        </div>
    </div>
</div>