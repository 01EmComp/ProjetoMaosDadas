var domain = document.domain;
var pasta = "Projeto";
function reload(argument) {
	$(document).ready(function(){
		$.ajax({
			url:"http://"+domain+"/"+pasta+"/home/reload",
			type:"POST",
			data:'0',
			success:function(resposta){
				//console.log(resposta);
				$("#tbody").html(resposta);
			}
		});
	});
}
/*#######Funções de edição - Inicio######*/
function select(id) {
	$.ajax({
		url:"http://"+domain+"/"+pasta+"/horarios/editar/"+id,
		type:"POST",
		data:{id},
		success: function(resposta) {
			//console.log(resposta);
		//tranforma o resultado da busca(json) em um array
		if (resposta != "") {
			var campos = $.parseJSON(resposta);
			//console.log(campos);
			$("#nome").val(campos["name"]);
			$("#desc").val(campos["description"]);
			$("#h-inicial").val(campos["initial_time"]);
			$("#h-final").val(campos["final_time"]);
			$("#d-inicial").val(campos["initial_date"]);
			$("#d-final").val(campos["final_date"]);
			$("#idSchedule").val(id);
			$("#modalEdit").modal('show');
		}
		else{
			alert("Algo deu errado!!!");
		}
	}
});
}

$(document).ready(function(){
	$("#btnEditSave").click(function(event){
		event.preventDefault();
		var dados = $("#formEdit").serializeArray();
		$.ajax({
			url:"http://"+domain+"/"+pasta+"/horarios/editar/0",
			type:"POST",
			data:dados,
			success: function(resposta){
				console.log(resposta);
				if (resposta == 1) {
					alert("Editado com sucesso");
					$("#formEdit").each( function(){
						this.reset();
					});
					$("#modalEdit").modal('hide');
					reload();
				}
				else{
					alert("Algo deu errado ao editar!!!");
				}
			}
		});
	});
});
/*#######Funções de edição - Fim######*/


/*#######Função de Deleção - Inicio######*/
function deletar(id){
	$("#modalDelete").modal('show');
	/*###################################################
	o .off() é para evitar a duplição do evento, se o usuario apagasse
	mais de um horario de uma vez, a função aconteceria a quantidade
	de vezes que ele clicou no #btnConfirmDelete, pois armazenava
	os eventos anteriores que ja foram executados, com o off
	garante que todos os eventos anteriores serão apagados.
	######################################################*/
	$("#btnConfirmDelete").off('click').click(function(event){
		//event.stopImmediatePropagation();
		//event.preventDefault();
		$.ajax({
			url:"http://"+domain+"/"+pasta+"/horarios/deletar",
			type:"POST",
			data:{
				'id':id
			},
			success:function(resposta){
				//console.log(resposta);
				if (resposta == 1) {
					alert("Deletado com sucesso");
					$("#modalDelete").modal('hide');
					reload();
				}
				else{
					alert("Algo deu errado ao deletar!!!");
				}
			}
		});
	});
}
/*#######Função de Deleção - Fim######*/

/*#######Função de Detalhamento - Inicio######*/
function detalhar(id){
	$.ajax({
		url:"http://"+domain+"/"+pasta+"/horarios/detalhar/"+id,
		type:"POST",
		data:{id},
		success: function(resposta) {
			console.log(resposta);
		//tranforma o resultado da busca(json) em um array
		if (resposta != "") {
			var campos = $.parseJSON(resposta);
			//console.log(campos);
			$("#nomeVer").html(campos["name"]);
			$("#descVer").html(campos["description"]);
			$("#h-inicialVer").html(campos["initial_time"]);
			$("#h-finalVer").html(campos["final_time"]);
			$("#d-inicialVer").html(campos["initial_date"]);
			$("#d-finalVer").html(campos["final_date"]);
			$("#idScheduleVer").html(id);
			$("#modalDetalhes").modal('show');
			$("#btnEditar").click(function(){
				select(id);
				$("#modalDetalhes").modal('hide');
			});
			$("#btnApagar").click(function(){
				deletar(id);
				$("#modalDetalhes").modal('hide');
			});
		}
		else{
			alert("Algo deu errado!!!");
		}
	}
});
}

$(document).ready(function(){
	$("#sair").mouseover(function(){
		$("#navbar").removeClass("bg-dark");
		$("#navbar").addClass("bg-danger");
	});
	$("#sair").mouseout(function(){
		$("#navbar").removeClass("bg-danger");
		$("#navbar").addClass("bg-dark");
	})
});