var domain = document.domain;
var path = window.location.pathname;

//Cria dinamicamente onde se deve fazer as requisiçoes dinamicas
var urlRequisicao = window.location.origin + '/';

$(document).ready(async function(){
    await  $.ajax({
        url: urlRequisicao+'crudprodutores/getCidades', //o arquivo para o qual deseja fazer a requisição
        type: 'POST', //metodo de envio
        success: function(resposta) {
            //console.log(resposta);
            $('.cidade').html('');
            // Itera sobre todos os    elementos de data:
            $('.cidade').append('<option disabled selected>Cidade</option>');
            $(resposta).each(i => {
                // Cria um novo elemento
                let element = $("<option>");
                element.val(resposta[i].idCidade);
                // Define o conteúdo de
                element.html(resposta[i].nome);
                // Adiciona o novo elemento ao DOM:
                $('.cidade').append(element);
            });
             
        }
    });  
    await  $.ajax({
        url: urlRequisicao+'crudprodutores/getTipos', //o arquivo para o qual deseja fazer a requisição
        type: 'POST', //metodo de envio

        success: function(resposta) {
           // console.log(resposta);
           $('.categoria').html('');

           $('.categoria').append('<option disabled selected>Categoria</option>');

            // Itera sobre todos os elementos de data:
            $(resposta).each(i => {
                // Cria um novo elemento
                let element = $("<option>");
                element.val(resposta[i].idTipo);
                // Define o conteúdo de
                element.html(resposta[i].nome);
                // Adiciona o novo elemento ao DOM:
                $('.categoria').append(element);
            })
        }
    });  
});
