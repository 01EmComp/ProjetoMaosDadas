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
                //console.log(resposta);
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
    
    $("#formSelecionaProdutorEditar").submit((e) => {
        e.preventDefault();
        var idProdutor = $("#IdProdutorEditar").val();

        $.ajax({
            url: urlRequisicao+"crudprodutores/selectProdutor/"+idProdutor,
            type: "GET",
            success: (resposta) => {
                //console.log(resposta);
                if(resposta.success){
                    renderProdutorEditLayout(resposta.data);
                }else{
                    alert("Erro ao selecionar produtor");
                }
            }
        })
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

        console.log(idProdutor);
        await  $.ajax({
            url: urlRequisicao+'crudprodutores/editar/'+idProdutor, //o arquivo para o qual deseja fazer a requisição
            type: 'POST', //metodo de envio
            
            data: form,
            contentType: false,
            processData: false,
            success: async (resposta) => {
                if(resposta.success){
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







function renderProdutorEditLayout(produtor){
    console.log(produtor);
    sessionStorage.setItem("produtor",produtor.idProdutor);
    idCidade = sessionStorage.getItem('idCidade');
    $("#inputCidadeEditarProdutor>option[value="+idCidade+"]").attr("selected",true);
    $("#inputCategoriaEditarProdutor>option[value="+produtor.idTipo+"]").attr("selected",true);

    $("#inputNomeEditarProdutor").val(produtor.nomeProdutor);
    $("#inputNomeSocialEditarProdutor").val(produtor.nomeSocial);
    $("#inputWhatsappEditarProdutor").val(produtor.whatsapp);
    $("#inputEnderecoEditarProdutor").val(produtor.endereco);
    $("#inputFormPagamentoEditarProdutor").val(produtor.formaPagamento);
    $("#inputFormaEntregaEditarProdutor").val(produtor.formaEntrega);
    $("#inputKeywordsEditarProdutor").val(produtor.keyWords);
    $("#inputDescricaoEditarProdutor").val(produtor.descricao);
    $("#imgProdutorEditar").attr('src',urlRequisicao+'public/img/produtores/'+produtor.img);
    
    $("#modalEditaProdutor").modal('hide');
    $("#cardInicio").attr("hidden",true);
    $("#EditarProdutor").attr("hidden",false);
    $("#formEditarProdutor").attr("disabled",false);
}



