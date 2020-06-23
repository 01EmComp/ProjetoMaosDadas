var domain = document.domain;
var path = window.location.pathname;

//Cria dinamicamente onde se deve fazer as requisiçoes dinamicas
var urlRequisicao = window.location.origin;

function recaptchaCallback() {
  $("#btnSubmitLogin").attr('disabled', false);
  $("#alert").addClass("d-none");
  $("#alert").html("");
}
function expiredCalback() {
  $("#btnSubmitLogin").attr('disabled', true);
  $("#alert").removeClass("d-none");
  $("#alert").html("Captcha expirou!");
}

$(document).ready(function () {
  $('#g-recaptcha-response').attr("")
  $("#loginForm").submit(async function (event) {
    await event.preventDefault();

    var username = $("#username").val();

    $.ajax({
      url: urlRequisicao + '/session/login', //o arquivo para o qual deseja fazer a requisição
      type: 'POST', //metodo de envio
      data: {
        login: $('#username').val(), //input de onde deseja pegar a informação
        senha: $('#senha').val(), //input de onde deseja pegar a informação
        'g-recaptcha-response': $('#g-recaptcha-response').val() //input de onde deseja pegar a informação
      },
      beforeSend: function () {
        $("#login").addClass("d-none");
        $("#load").removeClass("d-none");
      },
      success: function (resposta) {
//        console.log(resposta);
        if (resposta.success) {
          window.location.assign('/perfil/');
        }
        else {
          grecaptcha.reset();
          $('#loginForm').trigger("reset");
          $("#load").addClass("d-none");
          $("#login").removeClass("d-none");
          $('#username').val(username);
          $("#alert").removeClass("d-none");
          $("#alert").html(resposta.msg);
        }
      }
    });
  });
});

$(function () {
  function rescaleCaptcha() {
    var width = $('.g-recaptcha').parent().width();
    var scale;
    if (width < 302) {
      scale = width / 302;
    } else {
      scale = 1.0;
    }

    $('.g-recaptcha').css('transform', 'scale(' + scale + ')');
    $('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
    $('.g-recaptcha').css('transform-origin', '0 0');
    $('.g-recaptcha').css('-webkit-transform-origin', '0 0');
  }

  rescaleCaptcha();
  $(window).resize(function () { rescaleCaptcha(); });

});