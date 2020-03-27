var domain = document.domain;
$(document).ready(function(){
  $("#btnSubmitCadastroSchedules").click(function(event){
    event.preventDefault();
    var dados = $("#formCadastroSchedules").serializeArray();
    $.ajax({
      type: "POST",
      url: "http://"+domain+"/Projeto/horarios/cadastrar",
      data: dados,
      success: function(resposta){
        console.log(resposta);
        if (resposta == 1) {
          alert("Cadastrado com sucesso");
          $("#formCadastroSchedules").each( function(){
            this.reset();
          });
        }
        else{
          alert("Algo deu errado");
        }

      }
    });
  });
});

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