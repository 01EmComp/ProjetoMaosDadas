var domain = document.domain;
var path = window.location.pathname;

//Cria dinamicamente onde se deve fazer as requisiçoes dinamicas
var urlRequisicao = window.location.origin + '/';



$(document).ready(function() {
	$.ajax({
		type: "GET",
		url: "http://projetomaosdadas.emcomp.com.br/api/getcidades",
		dataType: "json",
		beforeSend: function(){
			$("#loader").show();
			console.log("começou");
		},
		success: function (result, status, xhr) {
			$.each(result, function (index, value) {
				
				$("#city").append('<div class="col-sm-4"><a href="'+urlRequisicao+'cidade/select/'+result[index].idCidade+'"><div class="card card-imagem img-hover-zoom animated fadeInUp slow border-0 shadow-lg bg-white mt-2 mb-2 mr-2" > <img class="card-img-top card-imagem" src="#" alt="Card image cap" id="imgcidade'+index+'"> <div class="carousel-caption d-md-block"> <h1 class="nomecidade animated fadeInDown slow delay-1s shadow">'+result[index].nome+'</h1> </div></div></a></div>');
				
				var urlimagem = "http://projetomaosdadas.emcomp.com.br/public/img/cidades/";
				$("#imgcidade"+index).attr("src", urlimagem+result[index].img);
			});
			
			$("#myFooter").removeClass('d-none');
			

		},
		error:function (result, status, xhr) {
			//console.log(result);
		},
		complete:function(data){
			$("#loader").hide();
		}
	});


});      