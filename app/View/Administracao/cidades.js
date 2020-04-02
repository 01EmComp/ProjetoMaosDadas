var domain = document.domain;
var path = window.location.pathname;
var pasta = path.split('/')[1];
//Cria dinamicamente onde se deve fazer as requisiçoes dinamicas
var urlRequisicao = window.location.origin + '/'+ pasta;

$(document).ready(async () => {

    $("#formCadastroCidades").submit(async (event) => {
        
        await event.preventDefault();
        
        await $("#btnCadastrarCidade").attr("disabled", true);;
        
        var form = new FormData();
        
        await form.append('img',$('#img')[0].files[0]);
        var dados = $("#formCadastroCidades").serializeArray();
        
        await $(dados).each( i => {
            form.append(dados[i].name, dados[i].value);
        });
        
        
        await  $.ajax({
            url: urlRequisicao+'/crudcidades/cadastrar', //o arquivo para o qual deseja fazer a requisição
            type: 'POST', //metodo de envio
            
            data: form,
            contentType: false,
            processData: false,
            success: async (resposta) => {
                console.log(resposta);
                resposta = JSON.parse(resposta);
                if(resposta.success){
                    await alert(resposta.msg);
                    await $('#formCadastroCidades').trigger("reset");
                    await $("#modalCadastraCidades").modal('hide');
                    await $("#btnCadastrarCidade").attr("disabled", false);
                }
                else{
                    await alert(resposta.msg);
                    await $("#btnCadastrarCidade").attr("disabled", false);
                }
            }
        });
        
    });
});
