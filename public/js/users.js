var domain = document.domain;
var pasta = "Projeto";
$(document).ready(function(){
	$("#btnCadastrar").click(function(event){
		event.preventDefault();
		$("#modalUser").modal('show');
		$("#loader").prop("hidden",false);
		var dados = $("#formUser").serializeArray();
		$.ajax({
			url:"http://"+domain+"/"+pasta+"/usuarios/cadastro",
			type:"POST",
			data:dados,
			success:function(resposta){
				console.log(resposta);
				$("#loader").prop("hidden",true);
				if (resposta == 1) {
					
					$("#formUser").each( function(){
						this.reset();
					});

					$("#modalSuccess").prop("hidden",false);
					$("#modalError").prop("hidden",true);
					
					$("#btnVoltar").click(function(){
						window.location.assign("http://"+domain+"/"+pasta+"");
					});
				}
				else{
					$("#modalError").prop("hidden",false);
				}
			}
		});
	});
});

$(document).ready(function(){
	$("#login").change(function(){
		var login = this.value;
		$("#message").html("Validando...");	
		if(login == ""){
			$("#message").html("Login não pode ser vazio");
			$("#message").css("color","#f00");
			$("#btnCadastrar").prop("disabled",true);
		}
		else{
			$.ajax({
				url:"http://"+domain+"/"+pasta+"/usuarios/verificaLogin",
				type:"POST",
				data:{"login":login},
				success:function(resposta){
					console.log(resposta);
					if (resposta == 1) {
						$("#message").css("color","#0f0");
						$("#message").html("Valido!!!");
						$("#btnCadastrar").prop("disabled",false);
					}
					else{
						$("#message").html("Login já está sendo usado.");
						$("#message").css("color","#f00");
						$("#btnCadastrar").prop("disabled",true);

					}
				}			
			});
		}
	});
})

$(document).ready(function(){

})