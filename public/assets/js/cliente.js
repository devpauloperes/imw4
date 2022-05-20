isCpf = true;

$(document).ready(function() {
	$("#cpf").change(function() {
		var vCpf = $(this).val();

		vCpf = vCpf.replace("-", "");
		vCpf = vCpf.replace(".", "");
		vCpf = vCpf.replace(".", "");

		if (verificaCPF(vCpf))
		{
			isCpf = true;
		} else {
			isCpf = false;
			alert("CPF inválido, por favor verifique!");
		}
	});

	$("#cep").change(function(){
		var vCep = $(this).val();
	

		if (vCep != "")
		{
			vCep = vCep.replace("-", "");
			vCep = vCep.replace(".", "");
			vCep = vCep.replace(".", "");
			vCep = vCep.replace(".", "");
			vCep = vCep.replace(",", "");
			vCep = vCep.replace("/", "");

			$.getJSON('https://viacep.com.br/ws/' + vCep +'/json/', null, function(json, textStatus) 
				{
					//alert(json.logradouro);
					if (json.logradouro != "")
					{
						//preencher campos
						$("#endereco").val(json.logradouro + " " + json.complemento);
						//$("#complemento").val(json.complemento);
						$("#bairro").val(json.bairro);
						$("#cidade").val(json.localidade);
						$("#estado").val(json.uf);
						//$('select').material_select();
					} 
						
				});
		}


	});

});


function verificaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
    strCPF = pad(strCPF, 11); 
    
	if (strCPF == "00000000000") return false;
    
	for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
	Resto = (Soma * 10) % 11;
	
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
	
	Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
	
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
    return true;
}

function verificaSenha() {
	var senha1 = $("#senha1").val();
	var senha2 = $("#senha2").val();

	if (senha1 != senha2)
	{
		alert("As Senhas sao diferentes");
		return false;
	}

	if (isCpf == false)
	{
		alert("O CPF esta invalido");
		return false;
	}

	return true;

}

function pad(str, length) {
  const resto = length - String(str).length;
  return '0'.repeat(resto > 0 ? resto : '0') + str;
}