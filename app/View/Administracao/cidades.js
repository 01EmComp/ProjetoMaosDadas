var domain = document.domain;
var path = window.location.pathname;

//Cria dinamicamente onde se deve fazer as requisiçoes dinamicas
var urlRequisicao = window.location.origin + '/';

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
            url: urlRequisicao+'crudcidades/cadastrar', //o arquivo para o qual deseja fazer a requisição
            type: 'POST', //metodo de envio
            
            data: form,
            contentType: false,
            processData: false,
            success: async (resposta) => {
                console.log(resposta);
                resposta = JSON.parse(resposta);
                if(resposta.success){
                    await alert(resposta.msg);
                    await loadSelects();
                    await $('#formCadastroCidades').trigger("reset");
                    await $("#btnCadastrarCidade").attr("disabled", false);
                }
                else{
                    await alert(resposta.msg);
                    await $("#btnCadastrarCidade").attr("disabled", false);
                }
            }
        });
        
    });
    
    $("#formSelecionaCidadeEditar").submit((e) => {
        e.preventDefault();
        var idCidade = $("#cidadeEditar").val();
        sessionStorage.setItem('idCidade',idCidade);
        $.ajax({
            url: urlRequisicao+"crudcidades/selectCidade/"+idCidade,
            type: "GET",
            success: (resposta) => {
                //console.log(resposta);
                if(resposta.success){
                    $("#EditarProdutor").attr("hidden",true);
                    $("#EditarCategoria").attr("hidden",true);
                    renderCidadeEditLayout(resposta.data);
                }else{
                    alert("Erro ao selecionar Cidade");
                }
            }
        })
    });
    
    
    
    $("#formSelecionaCidadeApagar").submit((e) => {
        e.preventDefault();
        
        
        var idCidade = $("#CidadeApagar").val();
        var nome = $("#CidadeApagar>option[value="+idCidade+"]").html();
        var certeza = confirm("Tem certeza que deseja apagar o Cidade: "+nome);
        if(!certeza){
            return;
        }
        $.ajax({
            url: urlRequisicao+"crudcidades/apagar/"+idCidade,
            type: "GET",
            success: async (resposta) => {
                console.log(resposta);
                if(resposta.success){
                    await loadSelects();
                    await $("#formSelecionaCidadeApagar").trigger("reset");
                    await $('#IdCidadeApagar').html('');
                    await alert("Cidade apagada com sucesso");
                    
                }else{
                    alert("Erro ao apagar cidade");
                }
            }
        });
    });
    
    
    
    $("#formEditarCidade").submit(async (event) => {
        
        await event.preventDefault();
        
        
        await $("#btnEditarCidade").attr("disabled", true);
        
        var form = new FormData();
        
        await form.append('img',$('#inputImgEditarCidade')[0].files[0]);
        var dados = $("#formEditarCidade").serializeArray();
        
        await $(dados).each( i => {
            form.append(dados[i].name, dados[i].value);
        });
        var idCidade = sessionStorage.getItem('idCidade');
        
        //console.log(idProdutor);
        await  $.ajax({
            url: urlRequisicao+'crudcidades/editar/'+idCidade, //o arquivo para o qual deseja fazer a requisição
            type: 'POST', //metodo de envio
            
            data: form,
            contentType: false,
            processData: false,
            success: async (resposta) => {
                //console.log(resposta);
                if(resposta.success){
                    await alert(resposta.msg);
                    await loadSelects();
                    await $("#modalEditaCidade").modal('show');
                    await $("#cardInicio").attr("hidden",false);
                    await $("#EditarCidade").attr("hidden",true);
                    await $("#formSelecionaCidadeEditar").trigger("reset");
                    await $("#formEditarCidade").attr("disabled",true);
                    await $("#formEditarCidade").trigger("reset");
                    await $("#btnEditarCidade").attr("disabled", false);
                }
                else{
                    await $("#btnEditarCidade").attr("disabled", false);
                    await alert(resposta.msg);
                }
            },
        });
        
    });
    
    
    
});



function renderCidadeEditLayout(cidade){
    
    $("#inputUfEditarCidade>option[value="+cidade.uf+"]").attr("selected",true);
    
    $("#inputNomeEditarCidade").val(cidade.nome);
    $("#inputCepEditarCidade").val(cidade.cep);
    $("#imgEditarCidade").attr("src",urlRequisicao+'public/img/cidades/'+cidade.img);
    
    $("#modalEditaCidade").modal('hide');
    $("#cardInicio").attr("hidden",true);
    $("#EditarCidade").attr("hidden",false);
    $("#formEditarCidade").attr("disabled",false);
}