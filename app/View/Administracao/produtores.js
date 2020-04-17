var domain = document.domain;
var path = window.location.pathname;

//Cria dinamicamente onde se deve fazer as requisiçoes dinamicas
var urlRequisicao = window.location.origin + '/';

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
            url: urlRequisicao+'crudprodutores/cadastrar', //o arquivo para o qual deseja fazer a requisição
            type: 'POST', //metodo de envio
            
            data: form,
            contentType: false,
            processData: false,
            success: async (resposta) => {
                console.log(resposta);
                if(resposta.success){
                    await alert(resposta.msg);
                    await loadSelects();
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
    
    
    $("#cidadeProdutorEditar").change((e) =>  {
        var idCidade = $("#cidadeProdutorEditar").val();
        sessionStorage.setItem('idCidade',idCidade);
        $.ajax({
            url: urlRequisicao + "crudprodutores/getProdutores/"+idCidade,
            type: "GET",
            success: (resposta) => {
                console.log(resposta);
                $('#IdProdutorEditar').html('');
                $(resposta).each(i => {
                    // Cria um novo elemento
                    let element = $("<option>");
                    element.val(resposta[i].idProdutor);
                    // Define o conteúdo de
                    element.html(resposta[i].nome);
                    // Adiciona o novo elemento ao DOM:
                    $('#IdProdutorEditar').append(element);
                });
            }
        });
    });
    
    $("#cidadeProdutorApagar").change((e) =>  {
        var idCidade = $("#cidadeProdutorApagar").val();
        
        $.ajax({
            url: urlRequisicao + "crudprodutores/getProdutores/"+idCidade,
            type: "GET",
            success: (resposta) => {
                //console.log(resposta);
                $('#IdProdutorApagar').html('');
                $(resposta).each(i => {
                    // Cria um novo elemento
                    let element = $("<option>");
                    element.val(resposta[i].idProdutor);
                    // Define o conteúdo de
                    element.html(resposta[i].nome);
                    // Adiciona o novo elemento ao DOM:
                    $('#IdProdutorApagar').append(element);
                });
            }
        });
    });
    
    $("#formSelecionaProdutorEditar").submit((e) => {
        e.preventDefault();
        
        var idProdutor = $("#IdProdutorEditar").val();
        
        $.ajax({
            url: urlRequisicao+"crudprodutores/selectProdutor/"+idProdutor,
            type: "GET",
            success: (resposta) => {
                //console.log(resposta);
                if(resposta.success){
                    //loadSelects();
                    $("#EditarCidade").attr("hidden",true);
                    $("#EditarCategoria").attr("hidden",true);
                    renderProdutorEditLayout(resposta.data);
                }else{
                    alert("Erro ao selecionar produtor");
                }
            }
        })
    });
    
    
    
    $("#formSelecionaProdutorApagar").submit((e) => {
        e.preventDefault();
        
        
        var idProdutor = $("#IdProdutorApagar").val();
        var nome = $("#IdProdutorApagar>option[value="+idProdutor+"]").html();
        var certeza = confirm("Tem certeza que deseja apagar o produtor: "+nome);
        if(!certeza){
            return;
        }
        $.ajax({
            url: urlRequisicao+"crudprodutores/apagar/"+idProdutor,
            type: "GET",
            success: async (resposta) => {
                console.log(resposta);
                if(resposta.success){
                    await loadSelects();
                    await $("#formSelecionaProdutorApagar").trigger("reset");
                    await $('#IdProdutorApagar').html('');
                    await alert("Produtor apagada com sucesso");
                    
                }else{
                    alert("Erro ao apagar produtor");
                }
            }
        });
    });
    
    
    
    $("#formEditarProdutor").submit(async (event) => {
        
        await event.preventDefault();
        
        await $("#btnEditarProdutor").attr("disabled", true);
        
        var form = new FormData();
        
        await form.append('img',$('#inputImgEditarProdutor')[0].files[0]);
        var dados = $("#formEditarProdutor").serializeArray();
        
        await $(dados).each( i => {
            form.append(dados[i].name, dados[i].value);
        });
        var idProdutor = sessionStorage.getItem('produtor');
        
        // console.log(idProdutor);
        await  $.ajax({
            url: urlRequisicao+'crudprodutores/editar/'+idProdutor, //o arquivo para o qual deseja fazer a requisição
            type: 'POST', //metodo de envio
            
            data: form,
            contentType: false,
            processData: false,
            success: async (resposta) => {
                if(resposta.success){
                    loadSelects();
                    await alert(resposta.msg);
                    await $("#modalEditaProdutor").modal('show');
                    await $("#cardInicio").attr("hidden",false);
                    await $("#EditarProdutor").attr("hidden",true);
                    await $("#formSelecionaProdutorEditar").trigger("reset");
                    await $("#formEditarProdutor").attr("disabled",true);
                    await $("#formEditarProdutor").trigger("reset");
                    await $("#btnEditarProdutor").attr("disabled", false);
                }
                else{
                    await $("#btnEditarProdutor").attr("disabled", false);
                    await alert(resposta.msg);
                }
            },
        });
        
    });
    
    
});







async function renderProdutorEditLayout(produtor){
    console.log(produtor);
    sessionStorage.setItem("produtor",produtor.idProdutor);
    idCidade = sessionStorage.getItem('idCidade');
    await $("#inputCidadeEditarProdutor>option[value="+idCidade+"]").attr("selected",true);
    await $("#inputCategoriaEditarProdutor>option[value="+produtor.idTipo+"]").attr("selected",true);
    
    await $("#inputNomeEditarProdutor").val(produtor.nomeProdutor);
    await  $("#inputNomeSocialEditarProdutor").val(produtor.nomeSocial);
    await $("#inputWhatsappEditarProdutor").val(produtor.whatsapp);
    await $("#inputEnderecoEditarProdutor").val(produtor.endereco);
    await $("#inputFormPagamentoEditarProdutor").val(produtor.formaPagamento);
    await $("#inputFormaEntregaEditarProdutor").val(produtor.formaEntrega);
    await $("#inputKeywordsEditarProdutor").val(produtor.keyWords);
    await $("#inputDescricaoEditarProdutor").val(produtor.descricao);
    await $("#imgProdutorEditar").attr('src',urlRequisicao+'public/img/produtores/'+produtor.img);
    
    $("#modalEditaProdutor").modal('hide');
    $("#cardInicio").attr("hidden",true);
    $("#EditarProdutor").attr("hidden",false);
    $("#formEditarProdutor").attr("disabled",false);
}



