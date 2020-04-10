var domain = document.domain;
var path = window.location.pathname;

//Cria dinamicamente onde se deve fazer as requisiçoes dinamicas
var urlRequisicao = window.location.origin + '/';

$(document).ready(() => {

    $("#formCadastroCategorias").submit(async (event) => {
        
        await event.preventDefault();
        
        await $("#btnCadastrarCategorias").attr("disabled", true);;
        
        var form = new FormData();
        
        await form.append('img',$('#imgCategorias')[0].files[0]);
        var dados = $("#formCadastroCategorias").serializeArray();
        
        await $(dados).each( i => {
            form.append(dados[i].name, dados[i].value);
        });
        
        
        await  $.ajax({
            url: urlRequisicao+'crudcategorias/cadastrar', //o arquivo para o qual deseja fazer a requisição
            type: 'POST', //metodo de envio
            
            data: form,
            contentType: false,
            processData: false,
            success: async (resposta) =>{
                console.log(resposta);
                if(resposta.success){
                    await alert(resposta.msg);
                    await $('#formCadastroCategorias').trigger("reset");
                    await $("#btnCadastrarCategorias").attr("disabled", false);
                }
                else{
                    await alert(resposta.msg);
                    await $("#btnCadastrarCategorias").attr("disabled", false);
                }
            }
        });
        
    });
});
