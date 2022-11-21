<div class="card">
   <div class="card-body">

      <h3> Dados do Clérigo </h3>

      <div class="row">

         <div class="col-9">
            <div class="row">

               <div class="mb-3 col-lg-3 col-md-4 col-sm-12">
                  <label for="tipoClerigoId">Tipo do Clerigo*</label>
                  <select class="form-control select2" data-bs-toggle="select2" width="fit" onchange="viewTipoPessoa(this.value);" name="tipoClerigoId" id="tipoClerigoId" required="required">
                     <option value="" disabled selected>Selecione</option>
                     <?php foreach ($clerigo_tipo_clerigo as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["tipoClerigoId"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>

               <div class="mb-3 col-lg-9 col-md-9 col-sm-12">
                  <label for="nome">Nome Completo*</label>
                  <input class="form-control " id="nome" name="nome" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["nome"] : ""; ?>" type="text" placeholder="" required="required">
               </div>


               <div class="mb-3 col-3">
                  <label for="dataConsagracao">Data da Consagração</label>
                  <input class="form-control date" id="dataConsagracao" name="dataConsagracao" maxlength="" value="<?php echo (isset($entidade) && isset($entidade["dataConsagracao"])) ? date("d/m/Y", strtotime($entidade["dataConsagracao"])) : ""; ?>" type="text" placeholder="">
               </div>

               <div class="mb-3 col-3 cardMinistro">
                  <label for="dataOrdenacao">Data da Ordenação</label>
                  <input class="form-control date" id="dataOrdenacao" name="dataOrdenacao" maxlength="" value="<?php echo (isset($entidade) && isset($entidade["dataOrdenacao"])) ? date("d/m/Y", strtotime($entidade["dataOrdenacao"])) : ""; ?>" type="text" placeholder="">
               </div>



               <div class="mb-3 col-3">
                  <label for="dataNascimento">Data de Nascimento*</label>
                  <input class="form-control date" id="dataNascimento" name="dataNascimento" maxlength="" value="<?php echo (isset($entidade) && isset($entidade["dataNascimento"])) ? date("d/m/Y", strtotime($entidade["dataNascimento"])) : ""; ?>" type="text" placeholder="" required="required">
               </div>

               <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
                  <label for="nacionalidade">Nacionalidade</label>
                  <input class="form-control " id="nacionalidade" name="nacionalidade" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["nacionalidade"] : ""; ?>" type="text" placeholder="">
               </div>

               <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                  <label for="email">E-mail</label>
                  <input class="form-control " id="email" name="email" maxlength="200" value="<?php echo (isset($entidade)) ? $entidade["email"] : ""; ?>" type="text" placeholder="">
               </div>




               <div class="mb-3 col-lg-3 col-md-4 col-sm-12">
                  <label for="escolaridadeId">Escolaridade</label>
                  <select class="form-control select2" data-bs-toggle="select2" width="fit" name="escolaridadeId" id="escolaridadeId">
                     <option value="" disabled selected>Selecione</option>
                     <?php foreach ($escolaridade as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["escolaridadeId"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>


               <div class="mb-3  col-lg-3 col-md-4 col-sm-12">
                  <label for="sexo">Sexo</label>
                  <select class="form-control select2" data-bs-toggle="select2" width="fit" name="sexo" id="sexo">
                     <option value="" disabled selected>Selecione</option>
                     <option value="M" <?php echo (isset($entidade) and $entidade["sexo"] == 'M') ? 'selected="selected"' : "" ?>>Masculino</option>
                     <option value="F" <?php echo (isset($entidade) and $entidade["sexo"] == 'F') ? 'selected="selected"' : "" ?>>Feminino</option>

                  </select>
               </div>





               <div class="mb-3 col-lg-3 col-md-4 col-sm-12">
                  <label for="racaId">Raça</label>
                  <select class="form-control select2" data-bs-toggle="select2" width="fit" name="racaId" id="racaId">
                     <option value="" disabled selected>Selecione</option>
                     <?php foreach ($raca as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["racaId"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>





               <div class="mb-3  col-lg-3 col-md-3 col-sm-12">
                  <label for="estadoCivil">Estado Civíl</label>
                  <select class="form-control select2" data-bs-toggle="select2" width="fit" onchange="viewEstadoCivil(this.value);" name="estadoCivil" id="estadoCivil">
                     <option value="" disabled selected>Selecione</option>
                     <option value="S" <?php echo (isset($entidade) and $entidade["estadoCivil"] == 'S') ? 'selected="selected"' : "" ?>>Solteiro</option>
                     <option value="C" <?php echo (isset($entidade) and $entidade["estadoCivil"] == 'C') ? 'selected="selected"' : "" ?>>Casado</option>
                     <option value="V" <?php echo (isset($entidade) and $entidade["estadoCivil"] == 'V') ? 'selected="selected"' : "" ?>>Viuvo</option>
                     <option value="D" <?php echo (isset($entidade) and $entidade["estadoCivil"] == 'D') ? 'selected="selected"' : "" ?>>Divorciado</option>
                     <option value="U" <?php echo (isset($entidade) and $entidade["estadoCivil"] == 'U') ? 'selected="selected"' : "" ?>>União Estavel</option>

                  </select>
               </div>



               <div class="mb-3 col-lg-6 col-md-6 col-sm-12 divConjuge">
                  <label for="nomeConjuge">Nome do Conjuge</label>
                  <input class="form-control " id="nomeConjuge" name="nomeConjuge" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["nomeConjuge"] : ""; ?>" type="text" placeholder="">
               </div>

               <div class="mb-3 col-lg-3 col-md-3 col-sm-6 divConjuge">
                  <label for="conjugeCPF">CPF do Conjuge</label>
                  <input class="form-control cpf" id="conjugeCPF" name="conjugeCPF" maxlength="11" value="<?php echo (isset($entidade)) ? $entidade["conjugeCPF"] : ""; ?>" type="text" placeholder="">
               </div>

               <div class="mb-3 col-lg-3 col-md-3 col-sm-6 divConjuge">
                  <label for="conjugeRg">RG do Conjuge</label>
                  <input class="form-control " id="conjugeRg" name="conjugeRg" maxlength="50" value="<?php echo (isset($entidade)) ? $entidade["conjugeRg"] : ""; ?>" type="text" placeholder="">
               </div>

               <div class="mb-3 col-3 divConjuge">
                  <label for="conjugeRgDataEmissao">Data de Emissão do RG</label>
                  <input class="form-control " id="conjugeRgDataEmissao" name="conjugeRgDataEmissao" maxlength="" value="<?php echo (isset($entidade) && isset($entidade["conjugeRgDataEmissao"])) ? date("d/m/Y", strtotime($entidade["conjugeRgDataEmissao"])) : ""; ?>" type="date" placeholder="">
               </div>

               <div class="mb-3  col-lg-3 col-md-4 col-sm-12 divConjuge">
                  <label for="conjugeRegimeBens">Regime de Bens</label>
                  <select class="form-control select2" data-bs-toggle="select2" width="fit" name="conjugeRegimeBens" id="conjugeRegimeBens">
                     <option value="" disabled selected>Selecione</option>
                     <option value="P" <?php echo (isset($entidade) and $entidade["conjugeRegimeBens"] == 'P') ? 'selected="selected"' : "" ?>>Comunhão parcial de bens</option>
                     <option value="U" <?php echo (isset($entidade) and $entidade["conjugeRegimeBens"] == 'U') ? 'selected="selected"' : "" ?>>Comunhão universal de bens</option>
                     <option value="S" <?php echo (isset($entidade) and $entidade["conjugeRegimeBens"] == 'S') ? 'selected="selected"' : "" ?>>Separação de bens</option>
                     <option value="F" <?php echo (isset($entidade) and $entidade["conjugeRegimeBens"] == 'F') ? 'selected="selected"' : "" ?>>Participação final nos aquestos</option>

                  </select>
               </div>



               <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                  <label for="nomePai">Nome do Pai</label>
                  <input class="form-control " id="nomePai" name="nomePai" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["nomePai"] : ""; ?>" type="text" placeholder="">
               </div>

               <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                  <label for="nomeMae">Nome da Mãe</label>
                  <input class="form-control " id="nomeMae" name="nomeMae" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["nomeMae"] : ""; ?>" type="text" placeholder="">
               </div>

               <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
                  <label for="foto">Foto</label> <br>
                  <input class="form-control-file" name="foto" id="foto" type="file">
               </div>

               <div class="mb-3">

                  <div class="custom-control custom-switch">
                     <input class="custom-control-input" name="isFilhos" id="isFilhos" value="1" type="checkbox" <?php echo (isset($entidade) and '1' == $entidade["isFilhos"]) ? 'checked="checked"' : ""; ?>>
                     <label class="custom-control-label" for="isFilhos">Tem Filhos</label>
                  </div>
               </div>



               <div class="mb-3">

                  <div class="custom-control custom-switch">
                     <input class="custom-control-input" name="isPne" id="isPne" value="1" type="checkbox" <?php echo (isset($entidade) and '1' == $entidade["isPne"]) ? 'checked="checked"' : ""; ?>>
                     <label class="custom-control-label" for="isPne">Portador de Necessidade Especial?</label>
                  </div>
               </div>


               <!-- 
                <div class="mb-3">

                    <div class="custom-control custom-switch">
                        <input class="custom-control-input" name="isAtivo" id="isAtivo" value="1" type="checkbox" <?php echo (isset($entidade) and '1' == $entidade["isAtivo"]) ? 'checked="checked"' : ""; ?>>
                        <label class="custom-control-label" for="isAtivo">Ativo?</label>
                    </div>
                </div>


                <div class="mb-3 col-3">
                    <label for="dataInativo">Data da Inativação</label>
                    <input class="form-control " id="dataInativo" name="dataInativo" maxlength="" value="<?php echo (isset($entidade) && isset($entidade["dataInativo"])) ? date("d/m/Y", strtotime($entidade["dataInativo"])) : ""; ?>" type="date" placeholder="">
                </div> -->

            </div>
         </div>

         <div class="col-3">
            <div class="text-center">
               <?php if (isset($entidade) && ($entidade["foto"]) != "") : ?>
                  <a href="<?php echo base_url(); ?>/public/uploads/Clerigo/<?php echo $entidade["foto"]; ?>" target="_blank">
                     <img src="<?php echo base_url(); ?>/public/uploads/Clerigo/<?php echo $entidade["foto"]; ?>" class="rounded-circle img-responsive mt-2" width="180" height="180">
                  </a>
               <?php else : ?>
                  <i class="align-middle me-2 fas fa-fw fa-user-circle" style="font-size: 180px;"></i>
               <?php endif; ?>

            </div>
         </div>
      </div>
   </div>
</div>
<div class="card">
   <div class="card-body">

      <h3> Documentos </h3>

      <div class="row">

         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="cpf">CPF</label>
            <input class="form-control cpf" id="cpf" name="cpf" maxlength="11" value="<?php echo (isset($entidade)) ? $entidade["cpf"] : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="rg">RG</label>
            <input class="form-control " id="rg" name="rg" maxlength="30" value="<?php echo (isset($entidade)) ? $entidade["rg"] : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-3">
            <label for="dataEmissaoRg">Data de Emissão</label>
            <input class="form-control date " id="dataEmissaoRg" name="dataEmissaoRg" maxlength="" value="<?php echo (isset($entidade) && isset($entidade["dataEmissaoRg"])) ? date("d/m/Y", strtotime($entidade["dataEmissaoRg"])) : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="ctps">CTPS</label>
            <input class="form-control " id="ctps" name="ctps" maxlength="50" value="<?php echo (isset($entidade)) ? $entidade["ctps"] : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-3">
            <label for="dataEmissaoCtps">Data de Emissão da CTPS</label>
            <input class="form-control date" id="dataEmissaoCtps" name="dataEmissaoCtps" maxlength="" value="<?php echo (isset($entidade) && isset($entidade["dataEmissaoCtps"])) ? date("d/m/Y", strtotime($entidade["dataEmissaoCtps"])) : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="pis">PIS</label>
            <input class="form-control " id="pis" name="pis" maxlength="50" value="<?php echo (isset($entidade)) ? $entidade["pis"] : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="tituloEleitoral">Titulo de Eleitor</label>
            <input class="form-control " id="tituloEleitoral" name="tituloEleitoral" maxlength="50" value="<?php echo (isset($entidade)) ? $entidade["tituloEleitoral"] : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="tituloEleitoralZona">Zona</label>
            <input class="form-control " id="tituloEleitoralZona" name="tituloEleitoralZona" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["tituloEleitoralZona"] : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="tituloEleitoralSecao">Seção</label>
            <input class="form-control " id="tituloEleitoralSecao" name="tituloEleitoralSecao" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["tituloEleitoralSecao"] : ""; ?>" type="text" placeholder="">
         </div>

      </div>
   </div>
</div>
<div class="card">
   <div class="card-body">

      <h3> Endereço </h3>

      <div class="row">

         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="cep">CEP</label>
            <input class="form-control cep" id="cep" name="cep" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["cep"] : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
            <label for="endereco">Endereço</label>
            <input class="form-control " id="endereco" name="endereco" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["endereco"] : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="numero">Número</label>
            <input class="form-control " id="numero" name="numero" maxlength="20" value="<?php echo (isset($entidade)) ? $entidade["numero"] : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="complemento">Complemento</label>
            <input class="form-control " id="complemento" name="complemento" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["complemento"] : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="bairro">Bairro</label>
            <input class="form-control " id="bairro" name="bairro" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["bairro"] : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3 col-lg-3 col-md-3 col-sm-6">
            <label for="cidade">Cidade</label>
            <input class="form-control " id="cidade" name="cidade" maxlength="255" value="<?php echo (isset($entidade)) ? $entidade["cidade"] : ""; ?>" type="text" placeholder="">
         </div>

         <div class="mb-3  col-lg-3 col-md-4 col-sm-12">
            <label for="estado">Estado</label>
            <select class="form-control select2" data-bs-toggle="select2" width="fit" name="estado" id="estado">
               <option value="" disabled selected>Selecione</option>
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

         <div class="mb-3  col-lg-3 col-md-4 col-sm-12">
            <label for="pais">Pais</label>
            <select class="form-control select2" data-bs-toggle="select2" width="fit" name="pais" id="pais">
               <option value="" disabled selected>Selecione</option>
               <option value="BR" <?php echo (isset($entidade) and $entidade["pais"] == 'BR') ? 'selected="selected"' : "" ?>>Brasil</option>
               <option value="AF" <?php echo (isset($entidade) and $entidade["pais"] == 'AF') ? 'selected="selected"' : "" ?>>Afeganistão</option>
               <option value="ZA" <?php echo (isset($entidade) and $entidade["pais"] == 'ZA') ? 'selected="selected"' : "" ?>>Africa do Sul</option>
               <option value="AL" <?php echo (isset($entidade) and $entidade["pais"] == 'AL') ? 'selected="selected"' : "" ?>>Albânia</option>
               <option value="DE" <?php echo (isset($entidade) and $entidade["pais"] == 'DE') ? 'selected="selected"' : "" ?>>Alemanha</option>
               <option value="AD" <?php echo (isset($entidade) and $entidade["pais"] == 'AD') ? 'selected="selected"' : "" ?>>Andorra</option>
               <option value="AO" <?php echo (isset($entidade) and $entidade["pais"] == 'AO') ? 'selected="selected"' : "" ?>>Angola</option>
               <option value="AI" <?php echo (isset($entidade) and $entidade["pais"] == 'AI') ? 'selected="selected"' : "" ?>>Anguilla</option>
               <option value="AQ" <?php echo (isset($entidade) and $entidade["pais"] == 'AQ') ? 'selected="selected"' : "" ?>>Antartica</option>
               <option value="AG" <?php echo (isset($entidade) and $entidade["pais"] == 'AG') ? 'selected="selected"' : "" ?>>Antígua e Barbuda</option>
               <option value="AN" <?php echo (isset($entidade) and $entidade["pais"] == 'AN') ? 'selected="selected"' : "" ?>>Antilhas Holandesas</option>
               <option value="SA" <?php echo (isset($entidade) and $entidade["pais"] == 'SA') ? 'selected="selected"' : "" ?>>Arábia Saudita</option>
               <option value="DZ" <?php echo (isset($entidade) and $entidade["pais"] == 'DZ') ? 'selected="selected"' : "" ?>>Argélia</option>
               <option value="AR" <?php echo (isset($entidade) and $entidade["pais"] == 'AR') ? 'selected="selected"' : "" ?>>Argentina</option>
               <option value="AM" <?php echo (isset($entidade) and $entidade["pais"] == 'AM') ? 'selected="selected"' : "" ?>>Armênia</option>
               <option value="AW" <?php echo (isset($entidade) and $entidade["pais"] == 'AW') ? 'selected="selected"' : "" ?>>Aruba</option>
               <option value="AU" <?php echo (isset($entidade) and $entidade["pais"] == 'AU') ? 'selected="selected"' : "" ?>>Austrália</option>
               <option value="AT" <?php echo (isset($entidade) and $entidade["pais"] == 'AT') ? 'selected="selected"' : "" ?>>Áustria</option>
               <option value="AZ" <?php echo (isset($entidade) and $entidade["pais"] == 'AZ') ? 'selected="selected"' : "" ?>>Azerbaidjão</option>
               <option value="BS" <?php echo (isset($entidade) and $entidade["pais"] == 'BS') ? 'selected="selected"' : "" ?>>Bahamas</option>
               <option value="BD" <?php echo (isset($entidade) and $entidade["pais"] == 'BD') ? 'selected="selected"' : "" ?>>Bangladesh</option>
               <option value="BB" <?php echo (isset($entidade) and $entidade["pais"] == 'BB') ? 'selected="selected"' : "" ?>>Barbados</option>
               <option value="BH" <?php echo (isset($entidade) and $entidade["pais"] == 'BH') ? 'selected="selected"' : "" ?>>Bareine</option>
               <option value="BY" <?php echo (isset($entidade) and $entidade["pais"] == 'BY') ? 'selected="selected"' : "" ?>>Belarus</option>
               <option value="BE" <?php echo (isset($entidade) and $entidade["pais"] == 'BE') ? 'selected="selected"' : "" ?>>Bélgica</option>
               <option value="BZ" <?php echo (isset($entidade) and $entidade["pais"] == 'BZ') ? 'selected="selected"' : "" ?>>Belize</option>
               <option value="BX" <?php echo (isset($entidade) and $entidade["pais"] == 'BX') ? 'selected="selected"' : "" ?>>Benelux</option>
               <option value="BJ" <?php echo (isset($entidade) and $entidade["pais"] == 'BJ') ? 'selected="selected"' : "" ?>>Benin</option>
               <option value="BM" <?php echo (isset($entidade) and $entidade["pais"] == 'BM') ? 'selected="selected"' : "" ?>>Bermudas</option>
               <option value="BO" <?php echo (isset($entidade) and $entidade["pais"] == 'BO') ? 'selected="selected"' : "" ?>>Bolívia</option>
               <option value="BA" <?php echo (isset($entidade) and $entidade["pais"] == 'BA') ? 'selected="selected"' : "" ?>>Bósnia e Herzegóvina</option>
               <option value="BW" <?php echo (isset($entidade) and $entidade["pais"] == 'BW') ? 'selected="selected"' : "" ?>>Botswana</option>
               <option value="BN" <?php echo (isset($entidade) and $entidade["pais"] == 'BN') ? 'selected="selected"' : "" ?>>Brunei Darussalam</option>
               <option value="BG" <?php echo (isset($entidade) and $entidade["pais"] == 'BG') ? 'selected="selected"' : "" ?>>Bulgária</option>
               <option value="BF" <?php echo (isset($entidade) and $entidade["pais"] == 'BF') ? 'selected="selected"' : "" ?>>Burkina Faso</option>
               <option value="BI" <?php echo (isset($entidade) and $entidade["pais"] == 'BI') ? 'selected="selected"' : "" ?>>Burundi</option>
               <option value="BT" <?php echo (isset($entidade) and $entidade["pais"] == 'BT') ? 'selected="selected"' : "" ?>>Butão</option>
               <option value="CV" <?php echo (isset($entidade) and $entidade["pais"] == 'CV') ? 'selected="selected"' : "" ?>>Cabo Verde</option>
               <option value="CM" <?php echo (isset($entidade) and $entidade["pais"] == 'CM') ? 'selected="selected"' : "" ?>>Camarões</option>
               <option value="KH" <?php echo (isset($entidade) and $entidade["pais"] == 'KH') ? 'selected="selected"' : "" ?>>Camboja</option>
               <option value="CA" <?php echo (isset($entidade) and $entidade["pais"] == 'CA') ? 'selected="selected"' : "" ?>>Canadá</option>
               <option value="QA" <?php echo (isset($entidade) and $entidade["pais"] == 'QA') ? 'selected="selected"' : "" ?>>Catar</option>
               <option value="KZ" <?php echo (isset($entidade) and $entidade["pais"] == 'KZ') ? 'selected="selected"' : "" ?>>Cazaquistão</option>
               <option value="TD" <?php echo (isset($entidade) and $entidade["pais"] == 'TD') ? 'selected="selected"' : "" ?>>Chade</option>
               <option value="CL" <?php echo (isset($entidade) and $entidade["pais"] == 'CL') ? 'selected="selected"' : "" ?>>Chile</option>
               <option value="CN" <?php echo (isset($entidade) and $entidade["pais"] == 'CN') ? 'selected="selected"' : "" ?>>China</option>
               <option value="CY" <?php echo (isset($entidade) and $entidade["pais"] == 'CY') ? 'selected="selected"' : "" ?>>Chipre</option>
               <option value="CO" <?php echo (isset($entidade) and $entidade["pais"] == 'CO') ? 'selected="selected"' : "" ?>>Colômbia</option>
               <option value="KM" <?php echo (isset($entidade) and $entidade["pais"] == 'KM') ? 'selected="selected"' : "" ?>>Comores</option>
               <option value="CG" <?php echo (isset($entidade) and $entidade["pais"] == 'CG') ? 'selected="selected"' : "" ?>>Congo</option>
               <option value="CI" <?php echo (isset($entidade) and $entidade["pais"] == 'CI') ? 'selected="selected"' : "" ?>>Costa do Marfim</option>
               <option value="CR" <?php echo (isset($entidade) and $entidade["pais"] == 'CR') ? 'selected="selected"' : "" ?>>Costa Rica</option>
               <option value="HR" <?php echo (isset($entidade) and $entidade["pais"] == 'HR') ? 'selected="selected"' : "" ?>>Croácia</option>
               <option value="CU" <?php echo (isset($entidade) and $entidade["pais"] == 'CU') ? 'selected="selected"' : "" ?>>Cuba</option>
               <option value="DK" <?php echo (isset($entidade) and $entidade["pais"] == 'DK') ? 'selected="selected"' : "" ?>>Dinamarca</option>
               <option value="DJ" <?php echo (isset($entidade) and $entidade["pais"] == 'DJ') ? 'selected="selected"' : "" ?>>Djibuti</option>
               <option value="DM" <?php echo (isset($entidade) and $entidade["pais"] == 'DM') ? 'selected="selected"' : "" ?>>Dominica</option>
               <option value="EG" <?php echo (isset($entidade) and $entidade["pais"] == 'EG') ? 'selected="selected"' : "" ?>>Egito</option>
               <option value="SV" <?php echo (isset($entidade) and $entidade["pais"] == 'SV') ? 'selected="selected"' : "" ?>>El Salvador</option>
               <option value="AE" <?php echo (isset($entidade) and $entidade["pais"] == 'AE') ? 'selected="selected"' : "" ?>>Emirados Árabes Unidos</option>
               <option value="EC" <?php echo (isset($entidade) and $entidade["pais"] == 'EC') ? 'selected="selected"' : "" ?>>Equador</option>
               <option value="ER" <?php echo (isset($entidade) and $entidade["pais"] == 'ER') ? 'selected="selected"' : "" ?>>Eritréia</option>
               <option value="EM" <?php echo (isset($entidade) and $entidade["pais"] == 'EM') ? 'selected="selected"' : "" ?>>Escritório para Harmonização no Mercado Interno</option>
               <option value="SK" <?php echo (isset($entidade) and $entidade["pais"] == 'SK') ? 'selected="selected"' : "" ?>>Eslováquia</option>
               <option value="SI" <?php echo (isset($entidade) and $entidade["pais"] == 'SI') ? 'selected="selected"' : "" ?>>Eslovenia</option>
               <option value="ES" <?php echo (isset($entidade) and $entidade["pais"] == 'ES') ? 'selected="selected"' : "" ?>>Espanha</option>
               <option value="US" <?php echo (isset($entidade) and $entidade["pais"] == 'US') ? 'selected="selected"' : "" ?>>Estados Unidos da América</option>
               <option value="EE" <?php echo (isset($entidade) and $entidade["pais"] == 'EE') ? 'selected="selected"' : "" ?>>Estônia</option>
               <option value="ET" <?php echo (isset($entidade) and $entidade["pais"] == 'ET') ? 'selected="selected"' : "" ?>>Etiópia</option>
               <option value="RU" <?php echo (isset($entidade) and $entidade["pais"] == 'RU') ? 'selected="selected"' : "" ?>>Federação Russa</option>
               <option value="FJ" <?php echo (isset($entidade) and $entidade["pais"] == 'FJ') ? 'selected="selected"' : "" ?>>Fiji</option>
               <option value="PH" <?php echo (isset($entidade) and $entidade["pais"] == 'PH') ? 'selected="selected"' : "" ?>>Filipinas</option>
               <option value="FI" <?php echo (isset($entidade) and $entidade["pais"] == 'FI') ? 'selected="selected"' : "" ?>>Finlândia</option>
               <option value="FR" <?php echo (isset($entidade) and $entidade["pais"] == 'FR') ? 'selected="selected"' : "" ?>>França</option>
               <option value="GA" <?php echo (isset($entidade) and $entidade["pais"] == 'GA') ? 'selected="selected"' : "" ?>>Gabão</option>
               <option value="GM" <?php echo (isset($entidade) and $entidade["pais"] == 'GM') ? 'selected="selected"' : "" ?>>Gambia</option>
               <option value="GH" <?php echo (isset($entidade) and $entidade["pais"] == 'GH') ? 'selected="selected"' : "" ?>>Gana</option>
               <option value="GE" <?php echo (isset($entidade) and $entidade["pais"] == 'GE') ? 'selected="selected"' : "" ?>>Geórgia</option>
               <option value="GS" <?php echo (isset($entidade) and $entidade["pais"] == 'GS') ? 'selected="selected"' : "" ?>>Geórgia do Sul e Ilhas Sandwich do Sul</option>
               <option value="GI" <?php echo (isset($entidade) and $entidade["pais"] == 'GI') ? 'selected="selected"' : "" ?>>Gibraltar</option>
               <option value="GD" <?php echo (isset($entidade) and $entidade["pais"] == 'GD') ? 'selected="selected"' : "" ?>>Granada</option>
               <option value="GR" <?php echo (isset($entidade) and $entidade["pais"] == 'GR') ? 'selected="selected"' : "" ?>>Grécia</option>
               <option value="GL" <?php echo (isset($entidade) and $entidade["pais"] == 'GL') ? 'selected="selected"' : "" ?>>Groenlândia</option>
               <option value="GP" <?php echo (isset($entidade) and $entidade["pais"] == 'GP') ? 'selected="selected"' : "" ?>>Guadalupe</option>
               <option value="GU" <?php echo (isset($entidade) and $entidade["pais"] == 'GU') ? 'selected="selected"' : "" ?>>Guam</option>
               <option value="GT" <?php echo (isset($entidade) and $entidade["pais"] == 'GT') ? 'selected="selected"' : "" ?>>Guatemala</option>
               <option value="GY" <?php echo (isset($entidade) and $entidade["pais"] == 'GY') ? 'selected="selected"' : "" ?>>Guiana</option>
               <option value="GN" <?php echo (isset($entidade) and $entidade["pais"] == 'GN') ? 'selected="selected"' : "" ?>>Guine</option>
               <option value="GW" <?php echo (isset($entidade) and $entidade["pais"] == 'GW') ? 'selected="selected"' : "" ?>>Guiné Bissau</option>
               <option value="GQ" <?php echo (isset($entidade) and $entidade["pais"] == 'GQ') ? 'selected="selected"' : "" ?>>Guine Equatorial</option>
               <option value="HT" <?php echo (isset($entidade) and $entidade["pais"] == 'HT') ? 'selected="selected"' : "" ?>>Haiti</option>
               <option value="NL" <?php echo (isset($entidade) and $entidade["pais"] == 'NL') ? 'selected="selected"' : "" ?>>Holanda</option>
               <option value="HN" <?php echo (isset($entidade) and $entidade["pais"] == 'HN') ? 'selected="selected"' : "" ?>>Honduras</option>
               <option value="HK" <?php echo (isset($entidade) and $entidade["pais"] == 'HK') ? 'selected="selected"' : "" ?>>Hong-Kong</option>
               <option value="HU" <?php echo (isset($entidade) and $entidade["pais"] == 'HU') ? 'selected="selected"' : "" ?>>Hungria</option>
               <option value="YE" <?php echo (isset($entidade) and $entidade["pais"] == 'YE') ? 'selected="selected"' : "" ?>>Iêmen</option>
               <option value="BV" <?php echo (isset($entidade) and $entidade["pais"] == 'BV') ? 'selected="selected"' : "" ?>>Ilha Bouvet</option>
               <option value="IM" <?php echo (isset($entidade) and $entidade["pais"] == 'IM') ? 'selected="selected"' : "" ?>>Ilha do Homem</option>
               <option value="CX" <?php echo (isset($entidade) and $entidade["pais"] == 'CX') ? 'selected="selected"' : "" ?>>Ilha Natal</option>
               <option value="NF" <?php echo (isset($entidade) and $entidade["pais"] == 'NF') ? 'selected="selected"' : "" ?>>Ilha Norfalk</option>
               <option value="KY" <?php echo (isset($entidade) and $entidade["pais"] == 'KY') ? 'selected="selected"' : "" ?>>Ilhas Cayman</option>
               <option value="CC" <?php echo (isset($entidade) and $entidade["pais"] == 'CC') ? 'selected="selected"' : "" ?>>Ilhas Cocos</option>
               <option value="CK" <?php echo (isset($entidade) and $entidade["pais"] == 'CK') ? 'selected="selected"' : "" ?>>Ilhas Cook</option>
               <option value="GG" <?php echo (isset($entidade) and $entidade["pais"] == 'GG') ? 'selected="selected"' : "" ?>>Ilhas do Canal</option>
               <option value="FO" <?php echo (isset($entidade) and $entidade["pais"] == 'FO') ? 'selected="selected"' : "" ?>>Ilhas Faroe</option>
               <option value="HM" <?php echo (isset($entidade) and $entidade["pais"] == 'HM') ? 'selected="selected"' : "" ?>>Ilhas Heard e McDonald</option>
               <option value="FK" <?php echo (isset($entidade) and $entidade["pais"] == 'FK') ? 'selected="selected"' : "" ?>>Ilhas Malvinas</option>
               <option value="MP" <?php echo (isset($entidade) and $entidade["pais"] == 'MP') ? 'selected="selected"' : "" ?>>Ilhas Marianas do Norte</option>
               <option value="MH" <?php echo (isset($entidade) and $entidade["pais"] == 'MH') ? 'selected="selected"' : "" ?>>Ilhas Marshall</option>
               <option value="UM" <?php echo (isset($entidade) and $entidade["pais"] == 'UM') ? 'selected="selected"' : "" ?>>Ilhas Menores</option>
               <option value="SB" <?php echo (isset($entidade) and $entidade["pais"] == 'SB') ? 'selected="selected"' : "" ?>>Ilhas Salomão</option>
               <option value="TC" <?php echo (isset($entidade) and $entidade["pais"] == 'TC') ? 'selected="selected"' : "" ?>>Ilhas Turks e Caicos</option>
               <option value="VG" <?php echo (isset($entidade) and $entidade["pais"] == 'VG') ? 'selected="selected"' : "" ?>>Ilhas Virgens (Britânicas)</option>
               <option value="VI" <?php echo (isset($entidade) and $entidade["pais"] == 'VI') ? 'selected="selected"' : "" ?>>Ilhas Virgens (U.S.)</option>
               <option value="WF" <?php echo (isset($entidade) and $entidade["pais"] == 'WF') ? 'selected="selected"' : "" ?>>Ilhas Wallis e Futura</option>
               <option value="IN" <?php echo (isset($entidade) and $entidade["pais"] == 'IN') ? 'selected="selected"' : "" ?>>India</option>
               <option value="ID" <?php echo (isset($entidade) and $entidade["pais"] == 'ID') ? 'selected="selected"' : "" ?>>Indonésia</option>
               <option value="IR" <?php echo (isset($entidade) and $entidade["pais"] == 'IR') ? 'selected="selected"' : "" ?>>Irã</option>
               <option value="IQ" <?php echo (isset($entidade) and $entidade["pais"] == 'IQ') ? 'selected="selected"' : "" ?>>Iraque</option>
               <option value="IE" <?php echo (isset($entidade) and $entidade["pais"] == 'IE') ? 'selected="selected"' : "" ?>>Irlanda</option>
               <option value="IS" <?php echo (isset($entidade) and $entidade["pais"] == 'IS') ? 'selected="selected"' : "" ?>>Islândia</option>
               <option value="IL" <?php echo (isset($entidade) and $entidade["pais"] == 'IL') ? 'selected="selected"' : "" ?>>Israel</option>
               <option value="IT" <?php echo (isset($entidade) and $entidade["pais"] == 'IT') ? 'selected="selected"' : "" ?>>Itália</option>
               <option value="JM" <?php echo (isset($entidade) and $entidade["pais"] == 'JM') ? 'selected="selected"' : "" ?>>Jamaica</option>
               <option value="JP" <?php echo (isset($entidade) and $entidade["pais"] == 'JP') ? 'selected="selected"' : "" ?>>Japão</option>
               <option value="JE" <?php echo (isset($entidade) and $entidade["pais"] == 'JE') ? 'selected="selected"' : "" ?>>Jersey</option>
               <option value="JO" <?php echo (isset($entidade) and $entidade["pais"] == 'JO') ? 'selected="selected"' : "" ?>>Jordânia</option>
               <option value="KI" <?php echo (isset($entidade) and $entidade["pais"] == 'KI') ? 'selected="selected"' : "" ?>>Kiribati</option>
               <option value="KW" <?php echo (isset($entidade) and $entidade["pais"] == 'KW') ? 'selected="selected"' : "" ?>>Kuwait</option>
               <option value="LA" <?php echo (isset($entidade) and $entidade["pais"] == 'LA') ? 'selected="selected"' : "" ?>>Laos</option>
               <option value="LS" <?php echo (isset($entidade) and $entidade["pais"] == 'LS') ? 'selected="selected"' : "" ?>>Lesoto</option>
               <option value="LV" <?php echo (isset($entidade) and $entidade["pais"] == 'LV') ? 'selected="selected"' : "" ?>>Letônia</option>
               <option value="LB" <?php echo (isset($entidade) and $entidade["pais"] == 'LB') ? 'selected="selected"' : "" ?>>Líbano</option>
               <option value="LR" <?php echo (isset($entidade) and $entidade["pais"] == 'LR') ? 'selected="selected"' : "" ?>>Libéria</option>
               <option value="LY" <?php echo (isset($entidade) and $entidade["pais"] == 'LY') ? 'selected="selected"' : "" ?>>Líbia</option>
               <option value="LI" <?php echo (isset($entidade) and $entidade["pais"] == 'LI') ? 'selected="selected"' : "" ?>>Liechtenstein</option>
               <option value="LT" <?php echo (isset($entidade) and $entidade["pais"] == 'LT') ? 'selected="selected"' : "" ?>>Lituânia</option>
               <option value="LU" <?php echo (isset($entidade) and $entidade["pais"] == 'LU') ? 'selected="selected"' : "" ?>>Luxemburgo</option>
               <option value="MO" <?php echo (isset($entidade) and $entidade["pais"] == 'MO') ? 'selected="selected"' : "" ?>>Macau</option>
               <option value="MG" <?php echo (isset($entidade) and $entidade["pais"] == 'MG') ? 'selected="selected"' : "" ?>>Madagascar</option>
               <option value="MY" <?php echo (isset($entidade) and $entidade["pais"] == 'MY') ? 'selected="selected"' : "" ?>>Malásia</option>
               <option value="MW" <?php echo (isset($entidade) and $entidade["pais"] == 'MW') ? 'selected="selected"' : "" ?>>Malawi</option>
               <option value="MV" <?php echo (isset($entidade) and $entidade["pais"] == 'MV') ? 'selected="selected"' : "" ?>>Maldivas</option>
               <option value="ML" <?php echo (isset($entidade) and $entidade["pais"] == 'ML') ? 'selected="selected"' : "" ?>>Mali</option>
               <option value="MT" <?php echo (isset($entidade) and $entidade["pais"] == 'MT') ? 'selected="selected"' : "" ?>>Malta</option>
               <option value="MA" <?php echo (isset($entidade) and $entidade["pais"] == 'MA') ? 'selected="selected"' : "" ?>>Marrocos</option>
               <option value="MQ" <?php echo (isset($entidade) and $entidade["pais"] == 'MQ') ? 'selected="selected"' : "" ?>>Martinica</option>
               <option value="MU" <?php echo (isset($entidade) and $entidade["pais"] == 'MU') ? 'selected="selected"' : "" ?>>Maurício</option>
               <option value="MR" <?php echo (isset($entidade) and $entidade["pais"] == 'MR') ? 'selected="selected"' : "" ?>>Mauritânia</option>
               <option value="MX" <?php echo (isset($entidade) and $entidade["pais"] == 'MX') ? 'selected="selected"' : "" ?>>México</option>
               <option value="MM" <?php echo (isset($entidade) and $entidade["pais"] == 'MM') ? 'selected="selected"' : "" ?>>Mianmá</option>
               <option value="FM" <?php echo (isset($entidade) and $entidade["pais"] == 'FM') ? 'selected="selected"' : "" ?>>Micronésia</option>
               <option value="MZ" <?php echo (isset($entidade) and $entidade["pais"] == 'MZ') ? 'selected="selected"' : "" ?>>Moçambique</option>
               <option value="MC" <?php echo (isset($entidade) and $entidade["pais"] == 'MC') ? 'selected="selected"' : "" ?>>Mônaco</option>
               <option value="MN" <?php echo (isset($entidade) and $entidade["pais"] == 'MN') ? 'selected="selected"' : "" ?>>Mongólia</option>
               <option value="MS" <?php echo (isset($entidade) and $entidade["pais"] == 'MS') ? 'selected="selected"' : "" ?>>Mont Serrat</option>
               <option value="ME" <?php echo (isset($entidade) and $entidade["pais"] == 'ME') ? 'selected="selected"' : "" ?>>Montenegro</option>
               <option value="NA" <?php echo (isset($entidade) and $entidade["pais"] == 'NA') ? 'selected="selected"' : "" ?>>Namíbia</option>
               <option value="NR" <?php echo (isset($entidade) and $entidade["pais"] == 'NR') ? 'selected="selected"' : "" ?>>Nauru</option>
               <option value="NP" <?php echo (isset($entidade) and $entidade["pais"] == 'NP') ? 'selected="selected"' : "" ?>>Nepal</option>
               <option value="NI" <?php echo (isset($entidade) and $entidade["pais"] == 'NI') ? 'selected="selected"' : "" ?>>Nicarágua</option>
               <option value="NE" <?php echo (isset($entidade) and $entidade["pais"] == 'NE') ? 'selected="selected"' : "" ?>>Níger</option>
               <option value="NG" <?php echo (isset($entidade) and $entidade["pais"] == 'NG') ? 'selected="selected"' : "" ?>>Nigéria</option>
               <option value="NO" <?php echo (isset($entidade) and $entidade["pais"] == 'NO') ? 'selected="selected"' : "" ?>>Noruega</option>
               <option value="NC" <?php echo (isset($entidade) and $entidade["pais"] == 'NC') ? 'selected="selected"' : "" ?>>Nova Caledônia</option>
               <option value="NZ" <?php echo (isset($entidade) and $entidade["pais"] == 'NZ') ? 'selected="selected"' : "" ?>>Nova Zelândia</option>
               <option value="OM" <?php echo (isset($entidade) and $entidade["pais"] == 'OM') ? 'selected="selected"' : "" ?>>Omã</option>
               <option value="OA" <?php echo (isset($entidade) and $entidade["pais"] == 'OA') ? 'selected="selected"' : "" ?>>Organização Africana de Propriedade Intelectual (OAPI)</option>
               <option value="WO" <?php echo (isset($entidade) and $entidade["pais"] == 'WO') ? 'selected="selected"' : "" ?>>Organização Mundial de Propriedade Intelectual – OMPI (WIPO)</option>
               <option value="AP" <?php echo (isset($entidade) and $entidade["pais"] == 'AP') ? 'selected="selected"' : "" ?>>Organização Regional de Propriedade Industrial Africana</option>
               <option value="PW" <?php echo (isset($entidade) and $entidade["pais"] == 'PW') ? 'selected="selected"' : "" ?>>Palau</option>
               <option value="PA" <?php echo (isset($entidade) and $entidade["pais"] == 'PA') ? 'selected="selected"' : "" ?>>Panamá</option>
               <option value="PG" <?php echo (isset($entidade) and $entidade["pais"] == 'PG') ? 'selected="selected"' : "" ?>>Papua Nova Guiné</option>
               <option value="PK" <?php echo (isset($entidade) and $entidade["pais"] == 'PK') ? 'selected="selected"' : "" ?>>Paquistão</option>
               <option value="PY" <?php echo (isset($entidade) and $entidade["pais"] == 'PY') ? 'selected="selected"' : "" ?>>Paraguai</option>
               <option value="PE" <?php echo (isset($entidade) and $entidade["pais"] == 'PE') ? 'selected="selected"' : "" ?>>Peru</option>
               <option value="PN" <?php echo (isset($entidade) and $entidade["pais"] == 'PN') ? 'selected="selected"' : "" ?>>Pitcairn</option>
               <option value="PF" <?php echo (isset($entidade) and $entidade["pais"] == 'PF') ? 'selected="selected"' : "" ?>>Polinésia Francesa</option>
               <option value="PL" <?php echo (isset($entidade) and $entidade["pais"] == 'PL') ? 'selected="selected"' : "" ?>>Polônia</option>
               <option value="PR" <?php echo (isset($entidade) and $entidade["pais"] == 'PR') ? 'selected="selected"' : "" ?>>Porto Rico</option>
               <option value="PT" <?php echo (isset($entidade) and $entidade["pais"] == 'PT') ? 'selected="selected"' : "" ?>>Portugal</option>
               <option value="KE" <?php echo (isset($entidade) and $entidade["pais"] == 'KE') ? 'selected="selected"' : "" ?>>Quênia</option>
               <option value="KG" <?php echo (isset($entidade) and $entidade["pais"] == 'KG') ? 'selected="selected"' : "" ?>>Quirguistão</option>
               <option value="GB" <?php echo (isset($entidade) and $entidade["pais"] == 'GB') ? 'selected="selected"' : "" ?>>Reino Unido</option>
               <option value="CF" <?php echo (isset($entidade) and $entidade["pais"] == 'CF') ? 'selected="selected"' : "" ?>>República Centro Africana</option>
               <option value="KR" <?php echo (isset($entidade) and $entidade["pais"] == 'KR') ? 'selected="selected"' : "" ?>>República da Coréia</option>
               <option value="MK" <?php echo (isset($entidade) and $entidade["pais"] == 'MK') ? 'selected="selected"' : "" ?>>República da Macedonia</option>
               <option value="MD" <?php echo (isset($entidade) and $entidade["pais"] == 'MD') ? 'selected="selected"' : "" ?>>República da Moldova</option>
               <option value="CD" <?php echo (isset($entidade) and $entidade["pais"] == 'CD') ? 'selected="selected"' : "" ?>>República Dem. Do Congo</option>
               <option value="DO" <?php echo (isset($entidade) and $entidade["pais"] == 'DO') ? 'selected="selected"' : "" ?>>República Dominicana</option>
               <option value="KP" <?php echo (isset($entidade) and $entidade["pais"] == 'KP') ? 'selected="selected"' : "" ?>>República Pop. Dem. da Coreia</option>
               <option value="CZ" <?php echo (isset($entidade) and $entidade["pais"] == 'CZ') ? 'selected="selected"' : "" ?>>República Tcheca</option>
               <option value="TZ" <?php echo (isset($entidade) and $entidade["pais"] == 'TZ') ? 'selected="selected"' : "" ?>>República Unida da Tanzânia</option>
               <option value="RE" <?php echo (isset($entidade) and $entidade["pais"] == 'RE') ? 'selected="selected"' : "" ?>>Reunião</option>
               <option value="RO" <?php echo (isset($entidade) and $entidade["pais"] == 'RO') ? 'selected="selected"' : "" ?>>Romênia</option>
               <option value="RW" <?php echo (isset($entidade) and $entidade["pais"] == 'RW') ? 'selected="selected"' : "" ?>>Ruanda</option>
               <option value="EH" <?php echo (isset($entidade) and $entidade["pais"] == 'EH') ? 'selected="selected"' : "" ?>>Saara Ocidental</option>
               <option value="PM" <?php echo (isset($entidade) and $entidade["pais"] == 'PM') ? 'selected="selected"' : "" ?>>Saint Pierre e Miquelon</option>
               <option value="AS" <?php echo (isset($entidade) and $entidade["pais"] == 'AS') ? 'selected="selected"' : "" ?>>Samoa Americana</option>
               <option value="WS" <?php echo (isset($entidade) and $entidade["pais"] == 'WS') ? 'selected="selected"' : "" ?>>Samoa Ocidental</option>
               <option value="SH" <?php echo (isset($entidade) and $entidade["pais"] == 'SH') ? 'selected="selected"' : "" ?>>Santa Helena</option>
               <option value="LC" <?php echo (isset($entidade) and $entidade["pais"] == 'LC') ? 'selected="selected"' : "" ?>>Santa Lúcia</option>
               <option value="KN" <?php echo (isset($entidade) and $entidade["pais"] == 'KN') ? 'selected="selected"' : "" ?>>São Cristovão e Nevis</option>
               <option value="SM" <?php echo (isset($entidade) and $entidade["pais"] == 'SM') ? 'selected="selected"' : "" ?>>São Marino</option>
               <option value="ST" <?php echo (isset($entidade) and $entidade["pais"] == 'ST') ? 'selected="selected"' : "" ?>>São Tomé e Príncipe</option>
               <option value="VC" <?php echo (isset($entidade) and $entidade["pais"] == 'VC') ? 'selected="selected"' : "" ?>>São Vicente e Granadinas</option>
               <option value="SN" <?php echo (isset($entidade) and $entidade["pais"] == 'SN') ? 'selected="selected"' : "" ?>>Senegal</option>
               <option value="SL" <?php echo (isset($entidade) and $entidade["pais"] == 'SL') ? 'selected="selected"' : "" ?>>Serra Leoa</option>
               <option value="RS" <?php echo (isset($entidade) and $entidade["pais"] == 'RS') ? 'selected="selected"' : "" ?>>Sérvia</option>
               <option value="SC" <?php echo (isset($entidade) and $entidade["pais"] == 'SC') ? 'selected="selected"' : "" ?>>Seychelles</option>
               <option value="SG" <?php echo (isset($entidade) and $entidade["pais"] == 'SG') ? 'selected="selected"' : "" ?>>Singapura</option>
               <option value="SY" <?php echo (isset($entidade) and $entidade["pais"] == 'SY') ? 'selected="selected"' : "" ?>>Síria</option>
               <option value="SO" <?php echo (isset($entidade) and $entidade["pais"] == 'SO') ? 'selected="selected"' : "" ?>>Somália</option>
               <option value="LK" <?php echo (isset($entidade) and $entidade["pais"] == 'LK') ? 'selected="selected"' : "" ?>>Sri Lanka</option>
               <option value="SZ" <?php echo (isset($entidade) and $entidade["pais"] == 'SZ') ? 'selected="selected"' : "" ?>>Suazilândia</option>
               <option value="SD" <?php echo (isset($entidade) and $entidade["pais"] == 'SD') ? 'selected="selected"' : "" ?>>Sudão</option>
               <option value="SE" <?php echo (isset($entidade) and $entidade["pais"] == 'SE') ? 'selected="selected"' : "" ?>>Suécia</option>
               <option value="CH" <?php echo (isset($entidade) and $entidade["pais"] == 'CH') ? 'selected="selected"' : "" ?>>Suíça</option>
               <option value="SR" <?php echo (isset($entidade) and $entidade["pais"] == 'SR') ? 'selected="selected"' : "" ?>>Suriname</option>
               <option value="SJ" <?php echo (isset($entidade) and $entidade["pais"] == 'SJ') ? 'selected="selected"' : "" ?>>Svalbard e Jan Mayen</option>
               <option value="TJ" <?php echo (isset($entidade) and $entidade["pais"] == 'TJ') ? 'selected="selected"' : "" ?>>Tadjiquistão</option>
               <option value="TH" <?php echo (isset($entidade) and $entidade["pais"] == 'TH') ? 'selected="selected"' : "" ?>>Tailândia</option>
               <option value="TW" <?php echo (isset($entidade) and $entidade["pais"] == 'TW') ? 'selected="selected"' : "" ?>>Taiwan</option>
               <option value="TF" <?php echo (isset($entidade) and $entidade["pais"] == 'TF') ? 'selected="selected"' : "" ?>>Terras Austrais Francesas</option>
               <option value="IO" <?php echo (isset($entidade) and $entidade["pais"] == 'IO') ? 'selected="selected"' : "" ?>>Territ.Britan.Oceano Índico</option>
               <option value="PS" <?php echo (isset($entidade) and $entidade["pais"] == 'PS') ? 'selected="selected"' : "" ?>>Território Ocupado Palestino</option>
               <option value="TL" <?php echo (isset($entidade) and $entidade["pais"] == 'TL') ? 'selected="selected"' : "" ?>>Timor-Leste</option>
               <option value="TG" <?php echo (isset($entidade) and $entidade["pais"] == 'TG') ? 'selected="selected"' : "" ?>>Togo</option>
               <option value="TK" <?php echo (isset($entidade) and $entidade["pais"] == 'TK') ? 'selected="selected"' : "" ?>>Tokelau</option>
               <option value="TO" <?php echo (isset($entidade) and $entidade["pais"] == 'TO') ? 'selected="selected"' : "" ?>>Tonga</option>
               <option value="TT" <?php echo (isset($entidade) and $entidade["pais"] == 'TT') ? 'selected="selected"' : "" ?>>Trinidad e Tobago</option>
               <option value="TN" <?php echo (isset($entidade) and $entidade["pais"] == 'TN') ? 'selected="selected"' : "" ?>>Tunísia</option>
               <option value="TM" <?php echo (isset($entidade) and $entidade["pais"] == 'TM') ? 'selected="selected"' : "" ?>>Turcomenistão</option>
               <option value="TR" <?php echo (isset($entidade) and $entidade["pais"] == 'TR') ? 'selected="selected"' : "" ?>>Turquia</option>
               <option value="TV" <?php echo (isset($entidade) and $entidade["pais"] == 'TV') ? 'selected="selected"' : "" ?>>Tuvalu</option>
               <option value="UA" <?php echo (isset($entidade) and $entidade["pais"] == 'UA') ? 'selected="selected"' : "" ?>>Ucrânia</option>
               <option value="UG" <?php echo (isset($entidade) and $entidade["pais"] == 'UG') ? 'selected="selected"' : "" ?>>Uganda</option>
               <option value="UY" <?php echo (isset($entidade) and $entidade["pais"] == 'UY') ? 'selected="selected"' : "" ?>>Uruguai</option>
               <option value="UZ" <?php echo (isset($entidade) and $entidade["pais"] == 'UZ') ? 'selected="selected"' : "" ?>>Uzbequistão</option>
               <option value="VU" <?php echo (isset($entidade) and $entidade["pais"] == 'VU') ? 'selected="selected"' : "" ?>>Vanuatu</option>
               <option value="VA" <?php echo (isset($entidade) and $entidade["pais"] == 'VA') ? 'selected="selected"' : "" ?>>Vaticano</option>
               <option value="VE" <?php echo (isset($entidade) and $entidade["pais"] == 'VE') ? 'selected="selected"' : "" ?>>Venezuela</option>
               <option value="VN" <?php echo (isset($entidade) and $entidade["pais"] == 'VN') ? 'selected="selected"' : "" ?>>Vietnã</option>
               <option value="YU" <?php echo (isset($entidade) and $entidade["pais"] == 'YU') ? 'selected="selected"' : "" ?>>Yugoslávia</option>
               <option value="ZR" <?php echo (isset($entidade) and $entidade["pais"] == 'ZR') ? 'selected="selected"' : "" ?>>Zaire</option>
               <option value="ZM" <?php echo (isset($entidade) and $entidade["pais"] == 'ZM') ? 'selected="selected"' : "" ?>>Zâmbia</option>
               <option value="ZW" <?php echo (isset($entidade) and $entidade["pais"] == 'ZW') ? 'selected="selected"' : "" ?>>Zimbábue</option>

            </select>
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
<div class="card">
   <div class="card-body">

      <h3> Documentos Digitalizados </h3>

      <div class="row">


         <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
            <label for="arquivoCtps">CTPS <?php echo (isset($entidade) && $entidade["arquivoCtps"] != "") ? '<a href="' . base_url() . '/public/uploads/Pessoa/' . $entidade["arquivoCtps"] . ' target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
            <input class="form-control-file" name="arquivoCtps" id="arquivoCtps" type="file">
         </div>


         <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
            <label for="arquivoPis">PIS <?php echo (isset($entidade) && $entidade["arquivoPis"] != "") ? '<a href="' . base_url() . '/public/uploads/Pessoa/' . $entidade["arquivoPis"] . ' target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
            <input class="form-control-file" name="arquivoPis" id="arquivoPis" type="file">
         </div>


         <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
            <label for="arquivoRg">RG <?php echo (isset($entidade) && $entidade["arquivoRg"] != "") ? '<a href="' . base_url() . '/public/uploads/Pessoa/' . $entidade["arquivoRg"] . ' target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
            <input class="form-control-file" name="arquivoRg" id="arquivoRg" type="file">
         </div>


         <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
            <label for="arquivoCpf">CPF <?php echo (isset($entidade) && $entidade["arquivoCpf"] != "") ? '<a href="' . base_url() . '/public/uploads/Pessoa/' . $entidade["arquivoCpf"] . ' target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
            <input class="form-control-file" name="arquivoCpf" id="arquivoCpf" type="file">
         </div>


         <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
            <label for="arquivoTituloEleitor">Titulo de Eleitor <?php echo (isset($entidade) && $entidade["arquivoTituloEleitor"] != "") ? '<a href="' . base_url() . '/public/uploads/Pessoa/' . $entidade["arquivoTituloEleitor"] . ' target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
            <input class="form-control-file" name="arquivoTituloEleitor" id="arquivoTituloEleitor" type="file">
         </div>

         <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
            <label for="arquivoCertidaoNascimentoCasamento">Certidão de Nascimento ou Casamento <?php echo (isset($entidade) && $entidade["arquivoCertidaoNascimentoCasamento"] != "") ? '<a href="' . base_url() . '/public/uploads/Pessoa/' . $entidade["arquivoCertidaoNascimentoCasamento"] . ' target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
            <input class="form-control-file" name="arquivoCertidaoNascimentoCasamento" id="arquivoCertidaoNascimentoCasamento" type="file">
         </div>

         <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
            <label for="arquivoComprovanteResidencia">Comprovante de Residência <?php echo (isset($entidade) && $entidade["arquivoComprovanteResidencia"] != "") ? '<a href="' . base_url() . '/public/uploads/Pessoa/' . $entidade["arquivoComprovanteResidencia"] . ' target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
            <input class="form-control-file" name="arquivoComprovanteResidencia" id="arquivoComprovanteResidencia" type="file">
         </div>

         <div class="mb-3  col-lg-6 col-md-6 col-sm-12">
            <label for="arquivoExtratoPrevidenciario">Extrato da Previdência <?php echo (isset($entidade) && $entidade["arquivoExtratoPrevidenciario"] != "") ? '<a href="' . base_url() . '/public/uploads/Pessoa/' . $entidade["arquivoExtratoPrevidenciario"] . ' target="_blank">Baixar documento enviado</a>'  : ""; ?> <small></small></label> <br>
            <input class="form-control-file" name="arquivoExtratoPrevidenciario" id="arquivoExtratoPrevidenciario" type="file">
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

      jQuery("#cpf").change(function() {
         var vCpf = $(this).val();

         vCpf = vCpf.replace("-", "");
         vCpf = vCpf.replace(".", "");
         vCpf = vCpf.replace(".", "");

         if (verificaCPF(vCpf)) {
            isCpf = true;
         } else {
            isCpf = false;
            alert("CPF inválido, por favor verifique!");
         }

      });

      jQuery("#btnSalvar").click(function() {
         return validaFormulario();
      });



   });

   viewEstadoCivil(jQuery("#estadoCivil").val());
   viewTipoPessoa(jQuery("#tipoPessoa").val());

   function viewEstadoCivil(vEstadoCivil) {
      if (vEstadoCivil == 'C' || vEstadoCivil == 'U') { //2 = casado
         jQuery(".divConjuge").show();
      } else {
         jQuery(".divConjuge").hide();
      }
   }



   function viewTipoPessoa(vTipo) {
      if (vTipo == 3) { //3 = ministro
         jQuery(".cardMinistro").show();
      } else {
         jQuery(".cardMinistro").hide();
      }
   }



   function verificaCPF(strCPF) {
      var Soma;
      var Resto;
      Soma = 0;

      strCPF = strCPF.replace("-", "");
      strCPF = strCPF.replace(".", "");
      strCPF = strCPF.replace(".", "");

      strCPF = pad(strCPF, 11);

      if (strCPF == "00000000000") return false;

      for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
      Resto = (Soma * 10) % 11;

      if ((Resto == 10) || (Resto == 11)) Resto = 0;
      if (Resto != parseInt(strCPF.substring(9, 10))) return false;

      Soma = 0;
      for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
      Resto = (Soma * 10) % 11;

      if ((Resto == 10) || (Resto == 11)) Resto = 0;
      if (Resto != parseInt(strCPF.substring(10, 11))) return false;
      return true;
   }

   function pad(str, length) {
      const resto = length - String(str).length;
      return '0'.repeat(resto > 0 ? resto : '0') + str;
   }

   function validaFormulario() {
      var vCPF = jQuery("#cpf").val();
      var vSituacao = jQuery("#situacao").val();
      var vTipoPessoa = jQuery("#tipoPessoa").val();
      var vTipoDocumento = jQuery("#tipoDocumento").val();
      var vLgpd = jQuery("#isAceitouLgpd").val();

      var retorno = true;

      if (vLgpd == 1) {
         /* 
         nomeConjuge - > somente se tive selecionado casado
          */

         if (jQuery("#tipoDocumento") == "") {
            alert("O campo tipo de documento não pode ficar vazio, por favor preencha!");
            jQuery("#tipoDocumento").focus();
            return false;
         }

         if (jQuery("#dataNascimento") == "") {
            alert("O campo Data de Nascimento não pode ficar vazio, por favor preencha!");
            jQuery("#dataNascimento").focus();
            return false;
         }

         if (jQuery("#estadoCivil") == "") {
            alert("O campo Estado Civil não pode ficar vazio, por favor preencha!");
            jQuery("#estadoCivil").focus();
            return false;
         }

         if (jQuery("#profissaoId") == "") {
            alert("O campo Profissão não pode ficar vazio, por favor selecione!");
            jQuery("#profissaoId").focus();
            return false;
         }

         if (jQuery("#cep") == "") {
            alert("O campo CEP não pode ficar vazio, por favor preencha!");
            jQuery("#cep").focus();
            return false;
         }

         if (jQuery("#escolaridadeId") == "") {
            alert("O campo Escolaridade não pode ficar vazio, por favor preencha!");
            jQuery("#escolaridadeId").focus();
            return false;
         }

         if (vTipoDocumento == 1) {

            if (!verificaCPF(vCPF)) {
               alert("CPF inválido, favor corrigir!");
               jQuery("#cpf").focus();
               return false;
            }
         }

         if (vTipoDocumento == 2 || vTipoDocumento == 3 || vTipoDocumento == 4) {

            if (vCPF == "") {
               alert("O campo Documento deve ser preenchido");
               jQuery("#cpf").focus();
               return false;
            }
         }

         if (vSituacao == "" && vTipoPessoa == 1) {
            alert("Preencha o campo Situação do Membro");
            jQuery("#situacao").focus();
         }


      }

      return true;

   }
</script>