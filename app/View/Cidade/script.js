var domain = document.domain;
var path = window.location.pathname;

//Cria dinamicamente onde se deve fazer as requisiçoes dinamicas
var urlRequisicao = window.location.origin + '/';

$(document).ready(function() {
    
    var idCidade = $("#city").val();
    var idCategoria = 0;
    
    $.ajax({
        method: "GET",
        url: "http://projetomaosdadas.emcomp.com.br/api/getTipos/",
        dataType: "json",
        beforeSend: function() {
            $("#loader").show();
        },
        success: function(result, status, xhr) {
            $("#minhaLista").append('<li class="list-group-item list-group-item-action active teste-categoria border-0" idTipo="0">Todos<i class="fas fa-list-ul float-right"></i></li>');
            
            $.each(result, function(index, value) {
                
                $("#minhaLista").append(
                    '<li class="list-group-item list-group-item-action teste-categoria border-0" idTipo="' + value.idTipo + '">' 
                    + '<span id="cat-'+value.idTipo+'">'+value.nome+'</span>'
                    + '<i class="fas fa-'+value.icon+' float-right "></i>'
                    +'</li>'
                    );
                });
            },
            error: function(xhr, status, errorMessage) {
                console.log("DEU RUIM");
            },
            complete: function(data) {
                $("#loader").hide();
            }
        });
        
        function listarProdutores(idCidade, idTipo) {
            if (idTipo == 0) {
                $.ajax({
                    type: "GET",
                    url: "http://projetomaosdadas.emcomp.com.br/api/selectprodutores/"+idCidade,
                    dataType: "json",
                    beforeSend: function() {
                        $("#load").removeClass('d-none');
                        $("#loader").show();
                    },
                    success: async function(result, status, xhr) {
                        // console.log(result[0].nomeCidade);
                        await renderCardsProdutores(result.data);
                        
                        $("#myFooter").removeClass('d-none');
                        
                    },
                    error: function(result, status, xhr) {
                        //console.log(result);
                    },
                    complete: function(data) {
                        $("#loader").hide();
                    }
                });
            } else {
                
                $.ajax({
                    type: "GET",
                    url: "http://projetomaosdadas.emcomp.com.br/filtro/produtores/" + idCidade + "/" + idTipo,
                    dataType: "json",
                    beforeSend: function() {
                        $("#load").removeClass('d-none');
                    },
                    success: async function(result, status, xhr) {
                        if(result.success){
                            if(result.data.length >0){
                            await renderCardsProdutores(result.data,idCidade);
                            $('html,body').animate({
                                scrollTop: $('body').offset().top
                            }, 'slow');
                        }else{
                            $("#load").addClass('d-none');
                            $("#cards").html('<div class="col-12 text-center alerta"><h1 class="tamanho"><i class="fas fa-exclamation-triangle"></i></h1><h5>Não há informaçãos cadastradas </h5></div>')
                        }
                    }else{
                    $("#load").addClass('d-none');
                    $("#cards").html('<div class="col-12 text-center alerta"><h1 class="tamanho"><i class="fas fa-exclamation-triangle"></i></h1><h5>Não há informaçãos cadastradas </h5></div>')
                }
                    },
                    error: function(result, status, xhr) {
                        //console.log("estou aqui");
                    },
                    complete: function(data) {
                        $("#loader").hide();
                    }
                });
                
            }
        }
        
        listarProdutores(idCidade, idCategoria);
        
        
        
        
        $("body").on("click", ".teste-categoria", function() {
            $("#cards").empty();
            
            var idTipo = $(this).attr("idTipo");
            $(".teste-categoria").removeClass("active");
            $(this).addClass("active");
            $("#load").removeClass('d-none');
            $("#loader").show();
            $("#categoria").html($("#cat-"+idTipo).html());       
            listarProdutores(idCidade, idTipo);
            menuHide();
            
        });
        
        
        $("body").on("click", ".teste", function() {
            var idProdutor = $(this).attr("idProdutor");
            
            var urlid = "http://projetomaosdadas.emcomp.com.br/api/selectprodutor/" + idProdutor;
            $.ajax({
                method: "GET",
                url: urlid,
                dataType: "json",
                beforeSend: function() {
                    $("#conteudo").addClass('d-none');
                    
                },
                success: function(result, status, xhr) {
                    if (result.success) {
                        renderModalProdutores(result);
                    }
                    console.log(result);
                },
                error: function(xhr, status, errorMessage) {
                    console.log("DEU RUIM");
                },
                complete: function(data) {
                    $("#loader").hide();
                }
            });
        });
        
        $("body").on("click", ".produtores", function(e) {
            var prod  = e.currentTarget;
            var idProdutor =  $(prod).attr('data');      
            
            var urlid = "http://projetomaosdadas.emcomp.com.br/api/selectprodutor/" + idProdutor;
            $.ajax({
                method: "GET",
                url: urlid,
                dataType: "json",
                beforeSend: function() {
                    $("#conteudo").addClass('d-none');
                    $("#loader").show();
                },
                success: function(result, status, xhr) {
                    if (result.success) {
                        renderModalProdutores(result);
                        $("#exampleModalCenter").modal('show');
                    }
                    ///console.log(result);
                },
                error: function(xhr, status, errorMessage) {
                    console.log("DEU RUIM");
                },
                complete: function(data) {
                    $("#loader").hide();
                }
            });
            
        });
        
        $.ajax({
            method: "GET",
            url: "http://projetomaosdadas.emcomp.com.br/api/getcidades",
            dataType: "json",
            beforeSend: function() {
                $("#loader").show();
            },
            success: function(result, status, xhr) {
                $.each(result, function (index, value) {
                    $("#listarCidade").append('<a class="dropdown-item lista-cidades" href="#" id="'+result[index].idCidade+'">'+result[index].nome+'</a>');
                });
            },
            error: function(xhr, status, errorMessage) {
                console.log("DEU RUIM");
            },
            complete: function(data) {
                $("#loader").hide();
            }
        });
        
        
        
        $("body").on("click", ".lista-cidades", function() {
            $("#cards").empty();
            var idTipo = 0;
            var idCidade = $(this).attr("id");
            listarProdutores(idCidade, idTipo);
            menuHide();
        });
        ///Menu controless///
        $("body").on("click", "#listToggle", () => {
            if($("#minhaLista").hasClass("show")){
                menuHide();
            }else{
                menuShow();
                $('html,body').animate({
                    scrollTop: $("#topo").offset().top
                }, 'slow');
            }
        });
        
        
    });

    function changeMenu(e){
        console.table(e);
        if($("#topo").top > 175){
            $("#listToggle").html("");
        }
    }

    $("body").off("scrool", changeMenu);
        $("body").on("scrool", changeMenu);
    
    function start(){
        if($(window).width()>1024){
            var md = 4;
            menuShow();
        }
        else{
            var md = 6;
        }
        return md;
    }
    
    function menuShow(){
        $("#minhaLista").addClass('show');
        $("#listToggle").removeClass('active');
        $("#list").attr('style','box-shadown:0 0 4px #000;');
        $("#btnMenuIcon").toggleClass('fa-angle-down fa-angle-up');
    }
    function menuHide(){
            $("#minhaLista").removeClass("show");
            $("#listToggle").addClass('active');
            $("#btnMenuIcon").toggleClass('fa-angle-up fa-angle-down');
    }

    function renderCardsProdutores(result){
        var md  = start();
        $.each(result, function(index, value) {
            $("#load").addClass('d-none');
            $("#home").html('<a href="'+urlRequisicao+'">Home</a>');
            $("#nomeCidade").html(value.nomeCidade)
            $("#cards").append(
                '<div class="col-md-'+md+'" >'
                +'<div class="card card-tamanho animated fadeIn slow border-0 bg-white mt-2 mb-2 mr-2" style="box-shadow:0 0 4px #000" >'
                +'<div class="img-hover-btightness"> '
                +'<img data="'+value.idProdutor+'" class="card-img-top card-img-tamanho produtores" src="'+urlRequisicao+'public/img/produtores/supermercado.png" alt="Card image cap" id="imagens' + index + '">'
                +'</div>'
                +'<div class="card-body d-none d-flex flex-column" id="cardb' + index + '"> '
                +'<div class="row"> '
                +'<div class="col-7"  style="margin:0; padding:2px;"> '
                +'<h6 class="card-subtitle mb-2 text-muted" id="categoria' + index + '"></h6> '
                +'</div>'
                +'<div class="col-5"  style="margin:0; padding:2px;"> '
                +'<h6 class="card-subtitle mb-2 text-muted" id="localizacao">'
                +'<i class="fas fa-map-marker-alt"></i> '
                + value.nomeCidade
                +'</h6> '
                +'</div>'
                +'</div>'
                +'<h5 class="card-title" id="nome">' 
                + value.nomeProdutor 
                + '</h5>'
                +'<div class="row">'
                +'<div class="col-7" style="margin:0; padding:2px;">'
                +'<a target="_BLANK" href="#" class="btn btn-outline-success btn-block" id="link' + index + '">'
                +'<i class="fab fa-whatsapp"></i> WhastApp'
                +'</a> '
                +'</div>'
                +'<div class="col-5" style="margin:0; padding:2px;">'
                +'<button type="button" class="btn btn-outline-dark btn-block teste" data-toggle="modal" data-target="#exampleModalCenter" id="info' + index + '" idProdutor="' + value.idProdutor + '">'
                +'<i class="fas fa-info"></i> Ler Mais'
                +'</button>'
                +'</div>'
                +'</div>'
                +'</div>'
                +'</div>'
                +'</div>'
                );
                
                $("#cardb" + index).removeClass('d-none');
                
                //$("#info"+index).attr("idProdutor",result[index].idProdutor);
                if (value.img) {
                    var urlimagem = "http://projetomaosdadas.emcomp.com.br/public/img/produtores/";
                    $("#imagens" + index).attr("src", urlimagem + value.img);
                }
                var url = "https://api.whatsapp.com/send?phone=";
                var mensagem = '&text=Olá! Acessei seu contato através do "Projeto Rio Pomba e região de mãos dadas".  Pode me atender?';
                var linkCompleto = url + value.whatsapp + mensagem;
                $("#link" + index).attr("href", linkCompleto);
                
                
                $("#categoria" + index).append('<i class="fas fa-'+value.icon+'"></i> '+value.nomeTipo);
                
                
            });
            
        }
        
        function renderModalProdutores(result){
            $("#conteudo").removeClass('d-none');
            $("#nomeTitulo").html(result.data.nomeProdutor);
            $("#conteudo").html(
                '<div class="row"> '
                +'<div class="col-1"> '
                +'<i class="fas fa-user-circle"></i> '
                +'</div>'
                +'<div class="col-10">'
                +' <p>' + result.data.nomeSocial + '</p>'
                +'</div>'
                +'</div>'
                +'<div class="row"> '
                +'<div class="col-1"> '
                +'<i class="fas fa-info-circle"></i> '
                +'</div>'
                +'<div class="col-10"> '
                +'<p>' + result.data.descricao + '</p>'
                +'</div>'
                +'</div>'
                +'<div class="row">'
                +'<div class="col-1">'
                +'<i class="fas fa-hand-holding-usd"></i> '
                +'</div>'
                +'<div class="col-10"> '
                +'<p>' + result.data.formaPagamento + '</p>'
                +'</div>'
                +'</div>'
                +'<div class="row"> '
                +'<div class="col-1"> '
                +'<i class="fas fa-truck"></i> '
                +'</div>'
                +'<div class="col-10">'
                +'<p>' + result.data.formaEntrega + '</p>'
                +' </div>'
                +'</div>'
                +'<div class="row"> '
                +'<div class="col-1"> '
                +'<i class="fas fa-map-marker-alt"></i> '
                +'</div>'
                +'<div class="col-10">'
                +'<p>' +result.data.endereco+', '+result.data.nomeCidade+'</p>'
                +'</div>'
                +'</div>'
                );
            }
            