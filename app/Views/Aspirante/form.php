<div class="card mb-3">
    
    <div class="card-body">
        <div class="row">

        <h3>Você esta enviado para o <?php echo $_GET["ano"]; ?>º Ano</h3>

        <p>Você pode enviar em partes, não é necessário enviar todos os documentos de uma vez. Se sua internet não for boa, faça isso mesmo, envie em partes. <br> Dê preferencia para envio de documentos em PDF.</p>

        <hr>

        <input id="aspiranteId" name="aspiranteId" 
		      		type="hidden" value="<?php echo (isset($entidade)) ? $entidade["aspiranteId"]: "" ; ?>" />    
			
			<input type="hidden" name="ano" value="<?php echo $_GET["ano"]; ?>" >
			
			

			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoEBD">Declaração da superintendente da EBD Art. 131, III</label>
                <br /> <input class="form-control-file" name="arquivoEBD" id="arquivoEBD" type="file" >
             </div> <hr>
			
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoDizimo">Declaração da junta diaconal de que é dizimista fiel Art. 131, IV</label>
                <br /> <input class="form-control-file" name="arquivoDizimo" id="arquivoDizimo" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoRecomendacaoPastor">Recomendação do pastor como presidente do conselho local, a respeito da moral, discrição, exemplo de vida, santidade e dons de serviço pastoral Art. 131, V</label>
                <br /> <input class="form-control-file" name="arquivoRecomendacaoPastor" id="arquivoRecomendacaoPastor" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoDeclaracaoConviccaoChamado">Declaração de convicção da chamada para o ministério Art. 131, VI</label>
                <br /> <input class="form-control-file" name="arquivoDeclaracaoConviccaoChamado" id="arquivoDeclaracaoConviccaoChamado" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoMembro4anos">Recomendação do conselho local que é membro por no mínimo 4 anos consecutivos da IMW, sendo dois anos na igreja atual Art. 131, VII</label>
                <br /> <input class="form-control-file" name="arquivoMembro4anos" id="arquivoMembro4anos" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoAprovacaoProbatorioConselhoLocal">Declaração do conselho local, que o candidato foi aprovado no período probatório. Art 130, v</label>
                <br /> <input class="form-control-file" name="arquivoAprovacaoProbatorioConselhoLocal" id="arquivoAprovacaoProbatorioConselhoLocal" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoConclusaoTeologia">Xerox do diploma, certificado ou declaração de conclusão do curso teológico e histórico Art. 131, VIII</label>
                <br /> <input class="form-control-file" name="arquivoConclusaoTeologia" id="arquivoConclusaoTeologia" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoConclusaoTeologiaHistorico">Xerox do diploma do histórico Art. 131, VIII</label>
                <br /> <input class="form-control-file" name="arquivoConclusaoTeologiaHistorico" id="arquivoConclusaoTeologiaHistorico" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoComplementacaoTeologica">Complementação Teológica para adequação ao padrão teológico</label>
                <br /> <input class="form-control-file" name="arquivoComplementacaoTeologica" id="arquivoComplementacaoTeologica" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoNascimentoCasamento">Certidão de nascimento ou casamento autenticada Art. 131, X, a</label>
                <br /> <input class="form-control-file" name="arquivoNascimentoCasamento" id="arquivoNascimentoCasamento" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoSPC">Certidão negativa SPC Art. 131, X, b</label>
                <br /> <input class="form-control-file" name="arquivoSPC" id="arquivoSPC" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoSerasa">Certidão negativa SERASA Art. 131, X, b</label>
                <br /> <input class="form-control-file" name="arquivoSerasa" id="arquivoSerasa" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoInss">Comprovante de filiação e regularização do INSS Art. 131, XI</label>
                <br /> <input class="form-control-file" name="arquivoInss" id="arquivoInss" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoSubmissaoRegimeItinerante">Declaração do candidato de submissão ao regime itinerante e à autoridade eclesiástica Art. 131, XII</label>
                <br /> <input class="form-control-file" name="arquivoSubmissaoRegimeItinerante" id="arquivoSubmissaoRegimeItinerante" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoProcessoJudicial">Declaração por escrito da existência ou não de processo criminal, por calúnia, difamação ou injúria e a solução judicial Art. 131, XIII</label>
                <br /> <input class="form-control-file" name="arquivoProcessoJudicial" id="arquivoProcessoJudicial" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoAposentado">Declaração que não é aposentado por velhice ou invalidez Art. 131, XIV</label>
                <br /> <input class="form-control-file" name="arquivoAposentado" id="arquivoAposentado" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoDoenca">Laudo psicológico que não é portador de doenças nervosas, mentais ou clínicas Art. 131, XV</label>
                <br /> <input class="form-control-file" name="arquivoDoenca" id="arquivoDoenca" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoPsicotecnico">Exame psicotécnico Art. 131, XVI</label>
                <br /> <input class="form-control-file" name="arquivoPsicotecnico" id="arquivoPsicotecnico" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoEsposaNoiva">Declaração da noiva ou esposa da aceitação do regime itinerante e a autoridade eclesiástica Art. 131, § 5º</label>
                <br /> <input class="form-control-file" name="arquivoEsposaNoiva" id="arquivoEsposaNoiva" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoRG">RG</label>
                <br /> <input class="form-control-file" name="arquivoRG" id="arquivoRG" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoCPF">CPF</label>
                <br /> <input class="form-control-file" name="arquivoCPF" id="arquivoCPF" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoTituloEleitor"> Título de Eleitor</label>
                <br /> <input class="form-control-file" name="arquivoTituloEleitor" id="arquivoTituloEleitor" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoCetificadoEscolar">Certificado de conclusão do ensino médio ou superior</label>
                <br /> <input class="form-control-file" name="arquivoCetificadoEscolar" id="arquivoCetificadoEscolar" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoFotoPessoal">Foto 3x4</label>
                <br /> <input class="form-control-file" name="arquivoFotoPessoal" id="arquivoFotoPessoal" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoFotoFamiliar">Foto da família do candidato</label>
                <br /> <input class="form-control-file" name="arquivoFotoFamiliar" id="arquivoFotoFamiliar" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoQuitacaoIWE">Declaração de quitação de débitos junto a tesouraria do IWE</label>
                <br /> <input class="form-control-file" name="arquivoQuitacaoIWE" id="arquivoQuitacaoIWE" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoEndereco">Comprovante de endereço</label>
                <br /> <input class="form-control-file" name="arquivoEndereco" id="arquivoEndereco" type="file" >
             </div> <hr>
				    
			
			<div class="mb-3  col-lg-12 col-md-12 col-sm-12">
                <label for="arquivoEntrevistaMinisterial">Entrevista na Comissão Ministerial (feita no local da apresentação)</label>
                <br /> <input class="form-control-file" name="arquivoEntrevistaMinisterial" id="arquivoEntrevistaMinisterial" type="file" >
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
