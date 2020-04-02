var domain = document.domain;
var path = window.location.pathname;
var pasta = path.split('/')[1];
//Cria dinamicamente onde se deve fazer as requisiçoes dinamicas
var urlRequisicao = window.location.origin + '/'+ pasta;


$(document).ready(function() {
  
  $("#loginForm").submit( async function(event) {
    await event.preventDefault();
    
    var googleResponse = jQuery('#g-recaptcha-response').val();
    if (!googleResponse) {
      var a = document.getElementById('alert');
      a.hidden = false;
      a.innerText = "Marque o captcha primeiro";
      
      return;
    }
    
    await $("#loginContainer").hide();
    await $("#loader").show();
    
    var username = $("#username").val();

    $.ajax({
      url: urlRequisicao+'/session/login', //o arquivo para o qual deseja fazer a requisição
      type: 'POST', //metodo de envio
      data: {
        login:$('#username').val(), //input de onde deseja pegar a informação
        senha:$('#senha').val(), //input de onde deseja pegar a informação
        'g-recaptcha-response':$('#g-recaptcha-response').val() //input de onde deseja pegar a informação
      },
      success: function(resposta) {
        console.log(resposta);
        resposta = JSON.parse(resposta);

        if (resposta.success) {
          window.location.assign('administracao');
        }
        else{
          grecaptcha.reset();
          $('#loginForm').trigger("reset");
          $("#loginContainer").show();
          $("#loader").hide();
          $('#username').val(username);
          $("#alert").show();
          $("#alert").text("Usuarios ou senha incorretos");
        }
      }
    });
  });	
});
