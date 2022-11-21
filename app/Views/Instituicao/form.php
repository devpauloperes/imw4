<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Dados da Instituição</h5>
    </div>
    <div class="card-body">
        <div class="row">


            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="tipoInstituicaoId">Tipo de Instituição</label>
                <select class="form-control select2" data-bs-toggle="select2" width="fit" name="tipoInstituicaoId" id="tipoInstituicaoId" required="required">
                    <option value="" disabled selected>Selecione</option>
                    <?php foreach ($TipoInstituicao as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["tipoInstituicaoId"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="instituicaoId">Instituição Pai</label>
                <select class="form-control select2" data-bs-toggle="select2" width="fit" name="instituicaoId" id="instituicaoId">
                    <option value="" disabled selected>Selecione</option>
                    <?php foreach ($Instituicao as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["instituicaoId"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="nome">Nome*</label>
                <input class="form-control " id="nome" name="nome" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["nome"] : ""; ?>" type="text" placeholder="" required="required">
            </div>


            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="cnpj">CNPJ*</label>
                <input class="form-control cnpj" id="cnpj" name="cnpj" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["cnpj"] : ""; ?>" type="text" placeholder="" required="required">
            </div>


            <div class="mb-3 col-lg-3 col-md-3 col-sm-6 pf">
                <label for="dataAbertura">Data de Abertura</label>
                <input class="form-control date" id="dataAbertura" name="dataAbertura" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["dataAbertura"] : ""; ?>" type="text" placeholder="">
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6 pf">
                <label for="dataFechamento">Data de Fechamento</label>
                <input class="form-control date" id="dataFechamento" name="dataFechamento" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["dataFechamento"] : ""; ?>" type="text" placeholder="">
            </div>


        </div>
    </div>
</div>



<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Localização</h5>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="mb-3 col-lg-3 col-md-3 col-sm-12">
                <label for="cep">CEP</label>
                <input class="form-control cep" id="cep" name="cep" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["cep"] : ""; ?>" type="text" placeholder="">
            </div>


            <div class="mb-3 col-lg-9 col-md-9 col-sm-12">
                <label for="endereco">Logradouro (Rua/Av/Beco)</label>
                <input class="form-control " id="endereco" name="endereco" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["endereco"] : ""; ?>" type="text" placeholder="">
            </div>
            <div class="row">
                <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                    <label for="numero">Número</label>
                    <input class="form-control " id="numero" name="numero" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["numero"] : ""; ?>" type="text" placeholder="">
                </div>

                <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                    <label for="complemento">Complemento</label>
                    <input class="form-control " id="complemento" name="complemento" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["complemento"] : ""; ?>" type="text" placeholder="">
                </div>

                <div class="mb-3 col-lg-6 col-md-6 col-sm-6">
                    <label for="bairro">Bairro</label>
                    <input class="form-control " id="bairro" name="bairro" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["bairro"] : ""; ?>" type="text" placeholder="">
                </div>



                <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                    <label for="cidade">Cidade</label>
                    <input class="form-control " id="cidade" name="cidade" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["cidade"] : ""; ?>" type="text" placeholder="">
                </div>

                <div class="mb-3 col-6">
                    <label for="estado">Estado</label>
                    <select class="form-control select2" data-bs-toggle="select2" name="estado" id="estado">
                        <option value="" disabled selected>Nenhum</option>
                        <option value="AC" <?php echo (isset($entidade) and $entidade["estado"] == 'AC') ? 'selected="selected"' : "" ?>>Acre</option>
                        <option value="AL" <?php echo (isset($entidade) and $entidade["estado"] == 'AL') ? 'selected="selected"' : "" ?>>Alagoas</option>
                        <option value="AP" <?php echo (isset($entidade) and $entidade["estado"] == 'AP') ? 'selected="selected"' : "" ?>>Amapá</option>
                        <option value="AM" <?php echo (isset($entidade) and $entidade["estado"] == 'AM') ? 'selected="selected"' : "" ?>>Amazonas</option>
                        <option value="BA" <?php echo (isset($entidade) and $entidade["estado"] == 'BA') ? 'selected="selected"' : "" ?>>Bahia</option>
                        <option value="CE" <?php echo (isset($entidade) and $entidade["estado"] == 'CE') ? 'selected="selected"' : "" ?>>Ceará</option>
                        <option value="DF" <?php echo (isset($entidade) and $entidade["estado"] == 'DF') ? 'selected="selected"' : "" ?>>Distrito Federal</option>
                        <option value="ES" <?php echo (isset($entidade) and $entidade["estado"] == 'ES') ? 'selected="selected"' : "" ?>>Espírito Santo</option>
                        <option value="GO" <?php echo (isset($entidade) and $entidade["estado"] == 'GO') ? 'selected="selected"' : "" ?>>Goiás</option>
                        <option value="MA" <?php echo (isset($entidade) and $entidade["estado"] == 'MA') ? 'selected="selected"' : "" ?>>Maranhão</option>
                        <option value="MT" <?php echo (isset($entidade) and $entidade["estado"] == 'MT') ? 'selected="selected"' : "" ?>>Mato Grosso</option>
                        <option value="MS" <?php echo (isset($entidade) and $entidade["estado"] == 'MS') ? 'selected="selected"' : "" ?>>Mato Grosso do Sul</option>
                        <option value="MG" <?php echo (isset($entidade) and $entidade["estado"] == 'MG') ? 'selected="selected"' : "" ?>>Minas Gerais</option>
                        <option value="PA" <?php echo (isset($entidade) and $entidade["estado"] == 'PA') ? 'selected="selected"' : "" ?>>Pará</option>
                        <option value="PB" <?php echo (isset($entidade) and $entidade["estado"] == 'PB') ? 'selected="selected"' : "" ?>>Paraíba</option>
                        <option value="PR" <?php echo (isset($entidade) and $entidade["estado"] == 'PR') ? 'selected="selected"' : "" ?>>Paraná</option>
                        <option value="PE" <?php echo (isset($entidade) and $entidade["estado"] == 'PE') ? 'selected="selected"' : "" ?>>Pernambuco</option>
                        <option value="PI" <?php echo (isset($entidade) and $entidade["estado"] == 'PI') ? 'selected="selected"' : "" ?>>Piauí</option>
                        <option value="RJ" <?php echo (isset($entidade) and $entidade["estado"] == 'RJ') ? 'selected="selected"' : "" ?>>Rio de Janeiro</option>
                        <option value="RN" <?php echo (isset($entidade) and $entidade["estado"] == 'RN') ? 'selected="selected"' : "" ?>>Rio Grande do Norte</option>
                        <option value="RS" <?php echo (isset($entidade) and $entidade["estado"] == 'RS') ? 'selected="selected"' : "" ?>>Rio Grande do Sul</option>
                        <option value="RO" <?php echo (isset($entidade) and $entidade["estado"] == 'RO') ? 'selected="selected"' : "" ?>>Rondônia</option>
                        <option value="RR" <?php echo (isset($entidade) and $entidade["estado"] == 'RR') ? 'selected="selected"' : "" ?>>Roraima</option>
                        <option value="SC" <?php echo (isset($entidade) and $entidade["estado"] == 'SC') ? 'selected="selected"' : "" ?>>Santa Catarina</option>
                        <option value="SP" <?php echo (isset($entidade) and $entidade["estado"] == 'SP') ? 'selected="selected"' : "" ?>>São Paulo</option>
                        <option value="SE" <?php echo (isset($entidade) and $entidade["estado"] == 'SE') ? 'selected="selected"' : "" ?>>Sergipe</option>
                        <option value="TO" <?php echo (isset($entidade) and $entidade["estado"] == 'TO') ? 'selected="selected"' : "" ?>>Tocantins</option>

                    </select>
                </div>

                <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                    <label for="pais">Pais</label>
                    <input class="form-control" id="pais" name="pais" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["pais"] : ""; ?>" type="text" placeholder="">
                </div>

                <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                    <label for="telefone">Celular/telefone</label>
                    <input class="form-control celular" id="telefone" name="telefone" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["telefone"] : ""; ?>" type="text" placeholder="">
                </div>


            </div>

        </div>
    </div>

</div>


<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Informações estatísticas da instituição</h5>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="qtd_capacidade_lotacao">Capacidade de Lotação</label>
                <input class="form-control " id="qtd_capacidade_lotacao" name="qtd_capacidade_lotacao" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["qtd_capacidade_lotacao"] : ""; ?>" type="text" placeholder="">
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="qtd_membros">Quantidade de Membros</label>
                <input class="form-control " id="qtd_membros" name="qtd_membros" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["qtd_membros"] : ""; ?>" type="text" placeholder="">
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="qtd_congregados">Quantidade de Congregados</label>
                <input class="form-control " id="qtd_congregados" name="qtd_congregados" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["qtd_congregados"] : ""; ?>" type="text" placeholder="">
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="qtd_lideranca">Quantidade de Lideranças</label>
                <input class="form-control " id="qtd_lideranca" name="qtd_lideranca" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["qtd_lideranca"] : ""; ?>" type="text" placeholder="">
            </div>


            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="qtd_gceu">Quantidade de GCEUs</label>
                <input class="form-control " id="qtd_gceu" name="qtd_gceu" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["qtd_gceu"] : ""; ?>" type="text" placeholder="">
            </div>


        </div>
    </div>

</div>


<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Operações</h5>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="mb-3">
                <div class="custom-control custom-switch">
                    <input class="custom-control-input" name="isAtivo" id="isAtivo" value="1" type="checkbox" <?php echo (isset($entidade) and '1' == $entidade["isAtivo"]) ? 'checked="checked"' : ""; ?>>
                    <label class="custom-control-label" for="isAtivo">Ativo?</label>
                </div>
            </div>


        </div>
    </div>

</div>



<script type="text/javascript">
    jQuery(document).ready(function() {

        jQuery("#cep").change(function() {
            var vCep = jQuery(this).val();


            if (vCep != "") {
                vCep = vCep.replace("-", "");
                vCep = vCep.replace(".", "");
                vCep = vCep.replace(".", "");
                vCep = vCep.replace(".", "");
                vCep = vCep.replace(",", "");
                vCep = vCep.replace("/", "");

                jQuery.getJSON('https://viacep.com.br/ws/' + vCep + '/json/', null, function(json, textStatus) {
                    //alert(json.logradouro);
                    if (json.logradouro != "") {
                        //preencher campos
                        jQuery("#endereco").val(json.logradouro + " " + json.complemento);
                        //jQuery("#complemento").val(json.complemento);
                        jQuery("#bairro").val(json.bairro);
                        jQuery("#cidade").val(json.localidade);
                        jQuery("#estado").val(json.uf);
                        jQuery('#estado').trigger('change');
                    }

                });
            }


        });



    });
</script>