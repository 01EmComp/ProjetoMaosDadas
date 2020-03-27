var domain = document.domain;
$(document).ready(function() {
  $("#btnSubmitLogin").click(function(event) {
   event.preventDefault();
   var captcha = $("#g-recaptcha-response").val();
   $("#loginContainer").hide();
   $("#loader").show();
   var usr = $('#username').val();
   console.log(usr);
   $.ajax({
            url:'http://'+domain+'/Projeto/login/verify', //o arquivo para o qual deseja fazer a requisição
            type: "POST", //metodo de envio
            data: {
            username:$('#username').val(), //input de onde deseja pegar a informação
            password:$('#password').val(), //input de onde deseja pegar a informação
            'g-recaptcha-response':$('#g-recaptcha-response').val() //input de onde deseja pegar a informação
          },
          success: function(resposta) {
            if (resposta) {
              window.location.assign('home');
            }
            else{
              grecaptcha.reset();
              $('#loginForm').trigger("reset");
              $("#loginContainer").show();
              $("#loader").hide();
              $('#username').val(usr);
              $("#alert").show();
              $("#alert").text("Usuarios ou senha incorretos");
            }
          }
        });
 });	
});

