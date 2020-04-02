var domain = document.domain;
var path = window.location.pathname;
var pasta = path.split('/')[1];
//Cria dinamicamente onde se deve fazer as requisiçoes dinamicas
var urlRequisicao = window.location.origin + '/'+ pasta;

$(document).ready(async () => {
    
    $("#formCadastroProdutores").submit(async (event) => {
        
        await event.preventDefault();
        
        await $("#btnCadastrarProdutor").attr("disabled", true);;
        
        var form = new FormData();
        
        await form.append('img',$('#imgProdutor')[0].files[0]);
        var dados = $("#formCadastroProdutores").serializeArray();
        
        await $(dados).each( i => {
            form.append(dados[i].name, dados[i].value);
        });
        console.log(form);
        
        //console.log(form);
        await  $.ajax({
            url: urlRequisicao+'/crudprodutores/cadastrar', //o arquivo para o qual deseja fazer a requisição
            type: 'POST', //metodo de envio
            
            data: form,
            contentType: false,
            processData: false,
            success: async (resposta) => {
                console.log(resposta);
                resposta = JSON.parse(resposta);
                if(resposta.success){
                    await alert(resposta.msg);
                    await $('#formCadastroProdutores').trigger("reset");
                    await $("#formCadastroProdutores").modal('hide');
                    await $("#btnCadastrarProdutor").attr("disabled", false);
                }
                else{
                    await alert(resposta.msg);
                    await $("#btnCadastrarProdutor").attr("disabled", false);
                }
            },
        });
        
    });
});
