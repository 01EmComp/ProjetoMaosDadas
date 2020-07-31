var domain = document.domain;
var path = window.location.pathname;

//Cria dinamicamente onde se deve fazer as requisiçoes dinamicas
var urlRequisicao = window.location.origin + '/';
var urlimagem = "http://projetomaosdadas.emcomp.com.br/public/img/cidades/";


$(document).ready(async function () {
	await $.ajax({
		type: "GET",
		url: urlRequisicao + "api/selectCidades",
		dataType: "json",
		beforeSend: function () {
			$("#loader").show();
			//console.log("começou");
		},
		success: async function (result, status, xhr) {
			let cidades = result.data;
			//console.log(cidades);

			await $(cidades).each((i) => {
				//console.log(cidades[i]);
				$("#city").append(
					'<div data-cidade="' + cidades[i].idCidade + '" class="col-sm-4" style="cursor:pointer">'
					+ '<di class="card card-imagem img-hover-zoom animated fadeInUp slow border-0 shadow-lg bg-white mt-2 mb-2 mr-2" >'
					+ '<img class="card-img-top card-imagem" src="' + urlimagem + cidades[i].img + '" alt="Card image cap" id="imgcidade">'
					+ '<div class="carousel-caption d-md-block">'
					+ '<h1 class="nomecidade animated fadeInDown slow delay-1s shadow">' + cidades[i].nome + '</h1>'
					+ '</div>'
					+ '</div>'
					+ '</div>'
				);

			});

			$("#myFooter").removeClass('d-none');


		},
		error: function (result, status, xhr) {
			//console.log(result);
		},
		complete: function (data) {
			$("#loader").hide();
		}
	});


	await $("[data-cidade]").ready(async () => {
		await $("[data-cidade]").click(function (e) {
			var opt = e.currentTarget.dataset.cidade;
			sessionStorage.setItem('cidadeSelecionada',opt);
			window.location.assign(urlRequisicao+'cidade');
		});
	});

});
