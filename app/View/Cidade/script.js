var domain = document.domain;
var path = window.location.pathname;

//Cria dinamicamente onde se deve fazer as requisiçoes dinamicas
var urlRequisicao = window.location.origin + '';

var urlImagens = urlRequisicao+"/public/img/";

var msg = 'Ol%C3%A1!%20%20Acessei%20seu%20contato%20atrav%C3%A9s%20do%20%22Projeto%20Rio%20Pomba%20e%20regi%C3%A3o%20de%20m%C3%A3os%20dadas%22.%20%20Pode%20me%20atender%3F';
function buscaProdutor(id){
    $.ajax({
        url: urlRequisicao + '/api/selectProdutor/'+id,
        type: 'GET',
        success: (resposta) => {
            var produtor = resposta.data;
            //console.log(produtor);
            $("#modalHead").html("");
            $("#modalBody").html("");
            $("#modalFoot").html("");

            $("#modalHead").append(produtor.nomeProdutor);
            $("#modalBody").append(
                '<div class="profile">'
                +'<img src="'
                +urlImagens+'produtores/'+produtor.img
                +'"class="img-thumbnail">'
                +'</div>'
                +'<div class="text">'
                +'Também conhecido como: '
                +produtor.nomeSocial
                +'<br>'
                +'Descrição: '
                +produtor.descricao
                +'<br><br>'
                +'<b>Outras informações</b>'
                +'<br>'
                +'Whatsapp: '
                +'<a href="https://api.whatsapp.com/send?phone='
                +produtor.whatsapp
                +'&text='+msg+'" target="_blank">'
                +produtor.whatsapp
                +'</a><br>'
                +'Forma(s) de pagamento: '
                +produtor.formaPagamento
                +'<br>'
                +'Formas entrega: '
                +produtor.formaEntrega
                +'<br>'
                +'Endereço: '
                +produtor.endereco
                +', '
                +produtor.nomeCidade
                +'<div class="alert alert-info">Valores a ser consutados com o vendedor<div>'
                );

                $("#modalFoot").append(
                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>'
               +'<a class="btn" style="width:50%" href="https://api.whatsapp.com/send?phone='
               +produtor.whatsapp
               +'&text='+msg+'" target="_blank">'
                  +'<img style="width:100%; height:100%" src="'+urlImagens+'wpp.png" alt="">'
                +'</a>')
                $("#modalProdutor").modal('toggle');

            }
        });
    }
    
    $(document).ready(() =>{
        $(".item").click( (e) => {
            var a = e.currentTarget;
            //console.log($(a).attr("data"));
            var tipoCidade = JSON.parse($(a).attr("data").replace(/\//g,""));
            if(tipoCidade.tipo == "todos"){
                var filtro = "/filtro/todosProdutores/";
            }
            else{
                var filtro = "/filtro/produtores/";
            }
            //console.log($(tipoCidade));
            $.ajax({
                url: urlRequisicao + filtro + tipoCidade.cidade+"/"+tipoCidade.tipo,
                success: (resposta)=>{
                   //console.log(resposta);
                    //resposta = JSON.parse(resposta);
                    if(resposta.success){
                        var produtores = resposta.data;
                        // console.log(resposta);
                        renderProdutoresContainer(produtores);  
                    }
                    else{
                        alert("Erro ao filtar");
                    }
                }
            })
            
        });
    });
    
    function renderProdutoresContainer(produtores){
        $("#produtoresContainer").html("");  
        $(produtores).each(i => {
            if(produtores[i].descricao.length > 66){
                var produtorDescricao = produtores[i].descricao.substr(0,63) + "...";
            }else{
                var produtorDescricao = produtores[i].descricao;
            }
            $("#produtoresContainer").append(    
                '<div class="col-lg-4 col-md-6 mb-4 cardProd"'
                +'data="tipo:'+produtores[i].idTipo+',cidade:'+produtores[i].idCidade+'">'
                +'<div class="card-produtor" onclick="buscaProdutor('+produtores[i].idProdutor+')">'
                +'<div class="card h-100">'
                +'<div class="img-container">'
                +'<span>'
                +'<img class="card-img-top" src="'+urlImagens+'produtores/'+produtores[i].img+'"'
                +'alt="'+produtores[i].descricao+'" style="z-indez:0;"/>'
                +'</span>'
                +'<p class="img-text">'
                +produtores[i].descricao
                +'</p>'
                +'</div>'
                +'</div>'
                +'<div class="card-body">'
                +'<h5 class="card-title">'		
                +produtores[i].nomeProdutor
                +'</h5>'
                +'<p>'
                +produtorDescricao
                +'</p>'
                +'</div>'
                +'<a class="list-group-item" href="https://api.whatsapp.com/send?phone='
                +produtores[i].whatsapp
                +'&text='+msg+'" target="_blank">'
                +'<div class="card-footer">'
                +'<img class="card-img-top" src="'+urlImagens+'wpp.png" alt="">'
                +'</div>'
                +'</a>'
                +'</div>'
                +'</div>'
                );
            });
        }