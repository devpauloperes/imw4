function loadCamera(){
	//Captura elemento de vídeo
	var video = document.querySelector("#webCamera");
		//As opções abaixo são necessárias para o funcionamento correto no iOS
		video.setAttribute('autoplay', '');
	    video.setAttribute('muted', '');
	    video.setAttribute('playsinline', '');
	    //--
	
	//Verifica se o navegador pode capturar mídia
	if (navigator.mediaDevices.getUserMedia) {
		navigator.mediaDevices.getUserMedia({audio: false, video: {facingMode: 'user'}})
		.then( function(stream) {
			//Definir o elemento vídeo a carregar o capturado pela webcam
			video.srcObject = stream;
		})
		.catch(function(error) {
			alert("Oooopps... Falhou :'(");
		});
	}
}

function takeSnapShot(urlPost){

	if (document.getElementById("codigo").value != "" || document.getElementById("empresaId").value)
	{
		//Captura elemento de vídeo
		var video = document.querySelector("#webCamera");
		
		//Criando um canvas que vai guardar a imagem temporariamente
		var canvas = document.createElement('canvas');
		canvas.width = video.videoWidth;
		canvas.height = video.videoHeight;
		var ctx = canvas.getContext('2d');
		
		//Desenhando e convertendo as dimensões
		ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
		
		//Criando o JPG
		var dataURI = canvas.toDataURL('image/jpeg'); //O resultado é um BASE64 de uma imagem.
		document.querySelector("#base_img").value = dataURI;

		//pegando o código
		var codigo=document.getElementById("codigo").value;

		//pegando o empresa
		var empresaId=document.getElementById("empresaId").value;

		 console.log(urlPost);
		 console.log(codigo);
		 console.log(empresaId);
		 console.log(dataURI);

		//sendSnapShot(dataURI, codigo, empresaId, urlPost); //Gerar Imagem e Salvar Caminho no Banco
	}
	else 
	{
		alert("PONTO NÃO REGISTRADO! Informe o CPF e a LOJA.");
		document.getElementById("codigo").focus();	
	}
}


function sendSnapShot(base64, codigo, empresaId, urlPost){
var request = new XMLHttpRequest();
//chamando o código para fazer upload
request.open('POST', urlPost, true);
request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
request.onload = function() {
        console.log(request.responseText);
        if (request.status >= 200 && request.status < 400) {
            //Colocar o caminho da imagem no SRC
            var data = JSON.parse(request.responseText);

            //verificar se houve erro
            if(data.error){
                alert(data.error);
                return false;
            }

            //Mostrar informações
            //document.querySelector("#imagemConvertida").setAttribute("src", data.img);
            //document.querySelector("#caminhoImagem a").setAttribute("href", data.img);
            //document.querySelector("#caminhoImagem a").innerHTML = data.img.split("/")[1];
            //console.log(data);
            if (data.retorno == "1")
            {
            	alert("Ponto Registrado com sucesso!");
            	document.getElementById("codigo").value = "";
            	document.getElementById("codigo").focus();
            }
            else
            {
            	alert("NÃO foi possivel registrar o ponto, PROMOTOR NÃO ENCONTRADO!");
            }

        } else {
            alert( "Erro ao salvar. Tipo:" + request.status );
        }
    };

    request.onerror = function() {
        alert("Erro ao salvar. Back-End inacessível.");
    }

    request.send("base_img="+base64 + "&codigo=" + codigo + "&empresaId=" + empresaId); // Enviar dados</code></pre>
}