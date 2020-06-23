function scrolToTop(onde) {
    $('html,body').animate({
        scrollTop: $(onde).offset().top
    }, 'slow');
}

var domain = document.domain;
var path = window.location.pathname;

//Cria dinamicamente onde se deve fazer as requisiçoes dinamicas
var urlRequisicao = window.location.origin + '/';

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
                if(value == resposta[i].idCidade){
                    element.prop('selected',true);
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

                if(value == resposta[i].idTipo){
                    element.prop('selected',true);
                }
                // Adiciona o novo elemento ao DOM:
                $('.categoria').append(element);
            })
        }
    });

}
