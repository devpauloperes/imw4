<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Dados da Pessoa</h5>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-9">

                <div class="row">

                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                        <label for="tipoPessoa">Tipo de Pessoa*</label>
                        <select class="form-control select2" data-bs-toggle="select2" width="fit" onchange="viewTipoPessoa(this.value);" name="tipoPessoa" id="tipoPessoa" required="required">
                            <option value="" disabled selected>Selecione</option>
                            <?php foreach ($TipoPessoa as $item) : ?>
                                <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["tipoPessoa"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <input type="hidden" name="pessoaId" id="pessoaId" value="<?php echo (isset($entidade)) ? $entidade["pessoaId"] : ""; ?>" />

                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                        <label for="nome">Nome*</label>
                        <input class="form-control " id="nome" name="nome" maxlength="200" value="<?php echo (isset($entidade)) ? $entidade["nome"] : ""; ?>" type="text" placeholder="" required="required">
                    </div>

                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                        <label for="email">E-mail</label>
                        <input class="form-control " id="email" name="email" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["email"] : ""; ?>" type="text" placeholder="">
                    </div>

                    <div class="mb-3 col-lg-3 col-md-3 col-sm-6 pf">
                        <label for="dataNascimento">Data de Nascimento*</label>
                        <input class="form-control date" id="dataNascimento" name="dataNascimento" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["dataNascimento"] : ""; ?>" type="text" placeholder="" required>
                    </div>

                    <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                        <label for="cpf">CPF*</label>
                        <input class="form-control cpf" id="cpf" name="cpf" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["cpf"] : ""; ?>" type="text" placeholder="" required="required">
                    </div>

                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                        <label for="estadoCivil">Estado Civil*</label>
                        <select class="form-control select2" data-bs-toggle="select2" width="fit" onchange="viewEstadoCivil(this.value);" name="estadoCivil" id="estadoCivil" required="required">
                            <option value="" disabled selected>Selecione</option>
                            <?php foreach ($EstadoCivil as $item) : ?>
                                <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["estadoCivil"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12 divNomeConjuge">
                        <label for="nomeConjuge">Nome Conjuge</label>
                        <input class="form-control " id="nomeConjuge" name="nomeConjuge" maxlength="200" value="<?php echo (isset($entidade)) ? $entidade["nomeConjuge"] : ""; ?>" type="text" placeholder="">
                    </div>

                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                        <label for="nomePai">Nome do Pai</label>
                        <input class="form-control " id="nomePai" name="nomePai" maxlength="200" value="<?php echo (isset($entidade)) ? $entidade["nomePai"] : ""; ?>" type="text" placeholder="">
                    </div>

                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                        <label for="nomeMae">Nome da Mãe</label>
                        <input class="form-control " id="nomeMae" name="nomeMae" maxlength="200" value="<?php echo (isset($entidade)) ? $entidade["nomeMae"] : ""; ?>" type="text" placeholder="">
                    </div>

                    <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
                        <label for="foto">Foto</label>
                        <input class="form-control form-control-file" name="foto" id="foto" type="file" accept="image/gif, image/jpeg, image/png">
                    </div>


                    <div class="mb-3 col-lg-12 col-md-12 col-sm-12">
                        <label for="filhos">Filhos <br> <small>Atenção: Insira um filho por linha do campo abaixo</small></label>
                        <textarea class="form-control " name="filhos" id="filhos" rows="5"><?php echo (isset($entidade)) ? $entidade["filhos"] : ""; ?></textarea>
                    </div>
                </div>

            </div>

            <div class="col-3">
                <div class="text-center">
                    <?php if (isset($entidade) && ($entidade["foto"]) != "") : ?>
                        <a href="<?php echo base_url(); ?>/public/uploads/Pessoa/<?php echo $entidade["foto"]; ?>" target="_blank">
                            <img src="<?php echo base_url(); ?>/public/uploads/Pessoa/<?php echo $entidade["foto"]; ?>" class="rounded-circle img-responsive mt-2" width="180" height="180">
                        </a>
                    <?php else : ?>
                        <i class="align-middle me-2 fas fa-fw fa-user-circle" style="font-size: 180px;"></i>
                    <?php endif; ?>

                </div>
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
                <label for="cep">CEP*</label>
                <input class="form-control cep" id="cep" name="cep" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["cep"] : ""; ?>" type="text" placeholder="" required>
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
                    <input class="form-control" id="pais" name="pais" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["pais"] : "Brasil"; ?>" type="text" placeholder="" required>
                </div>

                <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                    <label for="telefone">Telefone</label>
                    <input class="form-control telefone" id="telefone" name="telefone" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["telefone"] : ""; ?>" type="text" placeholder="">
                </div>

                <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                    <label for="celular">Celular</label>
                    <input class="form-control celular" id="celular" name="celular" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["celular"] : ""; ?>" type="text" placeholder="">
                </div>


            </div>

        </div>
    </div>

</div>



<div class="card mb-3 cardMembro">
    <div class="card-header">
        <h5 class="mb-0">Dados do Membro</h5>
    </div>
    <div class="card-body">
        <div class="row">


            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="numeroRolPermanente">Número no rol Permanente*</label>
                <input class="form-control " id="numeroRolPermanente" name="numeroRolPermanente" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["numeroRolPermanente"] : ""; ?>" type="text" placeholder="" required>
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                <label for="anoConversao">Ano da Conversão*</label>
                <input class="form-control " id="anoConversao" name="anoConversao" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["anoConversao"] : ""; ?>" type="text" placeholder="" required>
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-6 pf">
                <label for="dataBatismo">Data do Batismo*</label>
                <input class="form-control date" id="dataBatismo" name="dataBatismo" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["dataBatismo"] : ""; ?>" type="text" placeholder="" required>
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-12">
                <label for="profissao">Profissão</label>
                <input class="form-control " id="profissao" name="profissao" maxlength="200" value="<?php echo (isset($entidade)) ? $entidade["profissao"] : ""; ?>" type="text" placeholder="">
            </div>

            <div class="mb-3 col-lg-3 col-md-3 col-sm-12">
                <label for="situacao">Situacao*</label>
                <select class="form-control select2" data-bs-toggle="select2" width="fit" name="situacao" id="situacao" required>
                    <option value="" disabled selected>Selecione</option>
                    <?php foreach ($Situacao as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["situacao"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
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

    viewEstadoCivil(jQuery("#estadoCivil").val());
    viewTipoPessoa(vTipo)(jQuery("#tipoPessoa").val());

    function viewEstadoCivil(vEstadoCivil) {
        if (vEstadoCivil == 2) { //2 = casado
            jQuery(".divNomeConjuge").show();
        } else {
            jQuery(".divNomeConjuge").hide();
        }
    }

    function viewTipoPessoa(vTipo) {
        if (vTipo == 1) { //1 = membro
            jQuery(".cardMembro").show();
        } else {
            jQuery(".cardMembro").hide();
        }
    }
</script>