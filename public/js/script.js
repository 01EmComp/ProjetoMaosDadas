var domain = document.domain;
var path = window.location.pathname;

//Cria dinamicamente onde se deve fazer as requisiçoes dinamicas
var urlRequisicao = window.location.origin + '/';



//Script da pesquisa --- inicio 

$(document).ready(function () {
    if (localStorage.getItem('respondeu-pesquisa') == null || localStorage.getItem('respondeu-pesquisa') == "false") {
        $("#pesquisaContainer").ready(function () {
            getIp();

            localStorage.setItem('respondeu-pesquisa', false);

            $("#pesquisaContainer").removeClass("d-none");
            $("#startChatBtn").removeClass("d-none");
          setTimeout(()=>{  $("#arrowContainer").removeClass("d-none"); },800)
            setTimeout(() => {
                notificacao();
                $("#arrow").removeClass("animated fadeInDown");
                $("#arrow").toggleClass("animated pulse infinite");
            }, 2000);
            $("#startChatBtn").click(function () {
                $(this).addClass("d-none");
                if ($("#pesquisaChat").hasClass("d-none")) {
                    $("#pesquisaChat").removeClass("d-none");
                    $("#arrowContainer").addClass("d-none");
                    $(function () {
                        $('[data-toggle="tooltip"]').tooltip()
                    })

                } else {
                    $("#pesquisaChat").addClass("d-none");
                }
            });

            $("[data-option]").click(function (event) {

                if (!$(event.currentTarget).hasClass('active')) {
                    $("[data-option]").each(function () {
                        $(this).removeClass('active');
                    });
                    $(event.currentTarget).addClass('active');
                    var opcao = event.currentTarget.dataset.option;
                    $("#resposta").val(opcao);
                    $("#optionSelected").html($(event.currentTarget).html());
                    $("#btnFormPesquisa").prop("disabled", false);

                }
            });



            $("#formPesquisa").submit(async function (event) {
                await event.preventDefault();


                var dados = $("#formPesquisa").serializeArray();

                // console.log(dados);
                await $.ajax({
                    url: urlRequisicao + 'api/adcionarDadosPesquisa',
                    type: 'post',
                    method: 'post',
                    data: dados,
                    beforeSend: function () {

                        $(".msg").each(function () {
                            $(this).addClass("d-none");
                        });
                        $("#load").removeClass("d-none");

                    },
                    success: (resposta) => {
                        setTimeout(() => {
                            $("#load").addClass("d-none");
                            $("#success").removeClass("d-none");

                            setTimeout(() => {
                                $("#pesquisaChat").addClass("d-none");

                                $('[data-toggle="tooltip"]').tooltip('hide')

                                localStorage.setItem('respondeu-pesquisa', true);
                            }, 2000);
                        }, 1000);
                    }
                })
            });
        });
    }
});



function fechar() {
    $("#pesquisaChat").addClass("d-none");
    $("#startChatBtn").removeClass("d-none");
}

//Script da pesquisa --- fim 


function notificacao() {
    $("#notificacaoBadge").removeClass('d-none');
    $("#notificacaoBadge").html(2);
}



function getIp() {
    $.getJSON('http://ip-api.com/json?callback=?', function (data) {
        $("#inputIpUser").val(data.query);

    });
}



function scrolToTop(onde) {
    $('html,body').animate({
        scrollTop: $(onde).offset().top
    }, 'slow');
}

function getPhpSessionID() {
    return /PHPSESSID=([^;]+)/i.test(document.cookie) ? RegExp.$1 : false;
}


async function loadSelects() {
    await $.ajax({
        url: urlRequisicao + 'api/getCidades', //o arquivo para o qual deseja fazer a requisição
        type: 'POST', //metodo de envio
        success: function (resposta) {
            //console.log(resposta);
            $('.cidade').html('');
            // Itera sobre todos os    elementos de data:
            $('.cidade').append('<option disabled selected>Cidade</option>');
            var value = localStorage.getItem('cidade');
            $(resposta).each(i => {
                // Cria um novo elemento
                let element = $("<option>");
                element.val(resposta[i].idCidade);
                // Define o conteúdo de
                element.html(resposta[i].nome);
                if (value == resposta[i].idCidade) {
                    element.prop('selected', true);
                }
                // Adiciona o novo elemento ao DOM:
                $('.cidade').append(element);
            });

        }
    });
    await $.ajax({
        url: urlRequisicao + 'api/getTipos', //o arquivo para o qual deseja fazer a requisição
        type: 'POST', //metodo de envio

        success: function (resposta) {
            //console.log(resposta);
            $('.categoria').html('');

            $('.categoria').append('<option disabled selected>Categoria</option>');

            var value = localStorage.getItem('categoriaNegocio');
            // Itera sobre todos os elementos de data:
            $(resposta).each(i => {
                // Cria um novo elemento
                let element = $("<option>");
                element.val(resposta[i].idTipo);
                // Define o conteúdo de
                element.html(resposta[i].nome);

                if (value == resposta[i].idTipo) {
                    element.prop('selected', true);
                }
                // Adiciona o novo elemento ao DOM:
                $('.categoria').append(element);
            })
        }
    });

}