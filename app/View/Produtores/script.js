var domain = document.domain;
var path = window.location.pathname;
var pasta = path.split('/')[1];
//Cria dinamicamente onde se deve fazer as requisiçoes dinamicas
var urlRequisicao = window.location.origin + '/'+ pasta;

var urlImagens = urlRequisicao+"/public/img/produtores/";
function buscaProdutor(id){
    
    
    $.ajax({
        url: urlRequisicao + '/crudprodutores/selectProdutor/'+id,
        type: 'GET',
        success: (resposta) => {
            var produtor = resposta.data;

    console.log(produtor);
            //Cabecalho do modal
            $("#modalHead").append(produtor.nomeProdutor);
            $("#modalBody").append(
            '<div class="profile">'
            +'<img src="'
            +urlImagens+produtor.img
            +'"class="img-thumbnail">'
            +'</div>'
            +'<div class="text">'
            +'Também conhecido como: '
            +produtor.nomeSocial
            +'<br>'
            +'Descrição: '
            +produtor.descricao
            +'<br><br>'
            +'Outras informações:'
            +'<br>'
            +'Whatsapp: '
            +'<a href="https://api.whatsapp.com/send?phone='
            +produtor.whatsapp
            +'&text==Ol%C3%A1%2C%20tudo%20bem%3F%20Quero%20comprar%3A">'
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
            );



            $("#modalProdutor").modal('toggle');
        }
    });
}