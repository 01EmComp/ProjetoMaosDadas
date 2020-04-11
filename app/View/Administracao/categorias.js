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
                    await loadSelects();
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
    
    
    
    $("#formSelecionaCategoriaEditar").submit((e) => {
        e.preventDefault();
        
        
        var idCategoria = $("#CategoriaEditar").val();
        
        sessionStorage.setItem('idCategoria',idCategoria);
        $.ajax({
            url: urlRequisicao+"crudcategorias/getCategoria/"+idCategoria,
            type: "GET",
            success: async (resposta) => {
                //console.log(resposta);
                if(resposta.success){

                   await $("#EditarProdutor").attr("hidden",true);
                   await $("#EditarCidade").attr("hidden",true);

                   await renderCategoriaEditLayout(resposta.data);
                }else{
                    alert("Erro ao selecionar Categoria");
                }
            }
        })
    });

    $("#formSelecionaCategoriaApagar").submit((e) => {
        e.preventDefault();
        
        
        var idCategoria = $("#CategoriaApagar").val();
        var nome = $("#CategoriaApagar>option[value="+idCategoria+"]").html();
        var certeza = confirm("Tem certeza que deseja apagar a categoria: "+nome);
        if(!certeza){
            return;
        }
        $.ajax({
            url: urlRequisicao+"crudcategorias/apagar/"+idCategoria,
            type: "GET",
            success: async (resposta) => {
                console.log(resposta);
                if(resposta.success){
                    loadSelects();
                    alert("Categoria apagada com sucesso");
                 
                }else{
                    alert("Erro ao apagar Categoria");
                }
            }
        });
    });
    

    
    $("#formEditarCategoria").submit(async (event) => {
        
        await event.preventDefault();
        
        
        await $("#btnEditarCategoria").attr("disabled", true);
        
        var form = new FormData();
        
        await form.append('img',$('#inputImgEditarCategoria')[0].files[0]);
        var dados = $("#formEditarCategoria").serializeArray();
        
        await $(dados).each( i => {
            form.append(dados[i].name, dados[i].value);
        });
        var idCategoria = sessionStorage.getItem('idCategoria');
        
        //console.log(idProdutor);
        await  $.ajax({
            url: urlRequisicao+'crudcategorias/editar/'+idCategoria, //o arquivo para o qual deseja fazer a requisição
            type: 'POST', //metodo de envio
            
            data: form,
            contentType: false,
            processData: false,
            success: async (resposta) => {
                console.log(resposta);
                if(resposta.success){
                    await alert(resposta.msg);
                    await loadSelects();
                    await $("#modalEditaCategoria").modal('show');
                    await $("#cardInicio").attr("hidden",false);
                    await $("#EditarCategoria").attr("hidden",true);
                    await $("#formSelecionaCategoriaEditar").trigger("reset");
                    await $("#formEditarCategoria").attr("disabled",true);
                    await $("#formEditarCategoria").trigger("reset");
                    await $("#btnEditarCategoria").attr("disabled", false);
                }
                else{
                    await $("#btnEditarCategoria").attr("disabled", false);
                    await alert(resposta.msg);
                }
            },
        });
        
    });
    
    
});

function renderCategoriaEditLayout(categoria){
    $("#inputNomeEditarCategoria").val(categoria.nome);
    $("#inputKeywordsEditarCategoria").val(categoria.descricao);
    $("#imgEditarCategoria").attr("src",urlRequisicao+'public/img/produtores/'+categoria.img);
    
    $("#modalEditaCategoria").modal('hide');
    $("#cardInicio").attr("hidden",true);
    $("#EditarCategoria").attr("hidden",false);
    $("#formEditarCategoria").attr("disabled",false);
}

