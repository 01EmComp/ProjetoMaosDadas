<!DOCTYPE html>
<html>

<head>
    <title><?=NAME . " - " . $this->getTitle()?></title>
    <meta charset="utf-8">

    <!--Icone-->
    <link rel="icon" href="<?=DIRIMG?>/favicon.png">

    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="<?=DIRPAGE . 'vendor/twbs/bootstrap/dist/css/bootstrap.min.css'?>">

    <!--Local css-->
    <link rel="stylesheet" type="text/css" href="<?=DIRCSS?>styles.css">
    <link rel="stylesheet" type="text/css" href="<?=DIRCSS?>main.css">
    <link rel="stylesheet" type="text/css" href="<?=DIRCSS?>animate.css">

    <!--Meta tag de recursividade para dispositivos moveis-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Script do JQUERY-->
    <script src="<?=DIRPAGE . 'vendor/components/jquery/jquery.min.js'?>"></script>

    <!--Scripts Font Awesome-->
    <script src="<?=DIRPAGE . 'vendor/fortawesome/font-awesome/js/all.js'?>"></script>
    <script src="<?=DIRPAGE . 'vendor/fortawesome/font-awesome/js/regular.min.js'?>"></script>
    <script src="<?=DIRPAGE . 'vendor/fortawesome/font-awesome/js/solid.min.js'?>"></script>

    <?=$this->addHead()?>
</head>

<body>
    <?=$this->addNav()?>
    <div>
        <?=$this->addHeader()?>
    </div>
    <div>
        <?=$this->addMain()?>

    </div>
    <div style="z-index:1060; height:350px" class="pesquisa-container animated zoomInUp d-flex d-none"
        id="pesquisaContainer">
        <div id="pesquisaChat" class="card card-form-pesquisa animated fadeIn d-none">
            <div class="card-header bg-success w-100 d-flex">
                <h5 class="mx-auto text-center">
                    Pesquisa - Mãos Dadas&emsp;
                    <button type="button mx-auto px-md-5" class="close" aria-label="Close">
                        <span aria-hidden="true" onclick="fechar()">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="card-body overflow-auto" style="background-color: #dedede; padding:0; height:200px">
                <span class="d-none" id="success">
                    <div class="w-100 d-flex justify-content-center">
                        <div class="w-100">
                            <i class="fa fa-check-circle animated fadeIn slow mx-auto"
                                style="color:#28a745; width:90px;height:90px; margin-bottom:6px; top:10px; left:33%; position:relative;"></i>
                            <h5 class="text-center">
                                Tudo certo.
                                Obrigado por responder nossa pesquisa!
                            </h5>
                        </div>
                    </div>
                </span>
                <div class="d-none my-auto" id="load">
                    <div class="w-100 d-flex justify-content-center loader">
                        <div class="mt-5">
                            <div class="spinner-border text-success" role="status">
                                <span class="sr-only">Carregando...</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="msg">
                    <span>
                        <i class="fa fa-user-circle"></i>
                    </span>
                    <p>
                        Por onde conheceu o Projeto Mãos Dadas.
                    </p>
                </div>
                <div class="msg options">
                    <span>
                        <i class="fa fa-user-circle"></i>
                    </span>
                    <p>
                        Escolha uma das opções abaixo:
                        <br>
                        <button data-option="instagram" class="btn btn-outline-success" data-toggle="tooltip"
                            data-placement="top" title="Clique para selecionar">
                            Instagram
                        </button>


                        <button data-option="facebook" class="btn btn-outline-success" data-toggle="tooltip"
                            data-placement="top" title="Clique para selecionar">
                            Facebook
                        </button>


                        <button data-option="carro-som" class="btn btn-outline-success" data-toggle="tooltip"
                            data-placement="top" title="Clique para selecionar">
                            Carro de som
                        </button>


                        <button data-option="radio" class="btn btn-outline-success" data-toggle="tooltip"
                            data-placement="top" title="Clique para selecionar">
                            Rádio
                        </button>


                        <button data-option="familia-amigos" class="btn btn-outline-success" data-toggle="tooltip"
                            data-placement="top" title="Clique para selecionar">
                            Família/amigos
                        </button>


                        <button data-option="outro" class="btn btn-outline-success" data-toggle="tooltip"
                            data-placement="top" title="Clique para selecionar">
                            Outro
                        </button>
                    </p>
                </div>
            </div>
            <div class="card-footer bg-white">
                <form id="formPesquisa" class="d-flex">
                    <input type="hidden" name="userIP" id="inputIpUser">
                    <input type="hidden" name="resposta" id="resposta">
                    <span id="optionSelected" class="outputOption"></span>
                    <button type="submit" form="formPesquisa" disabled="true" id="btnFormPesquisa" data-toggle="tooltip"
                        data-placement="top" title="Clique para enviar"
                        style="margin-left:0.2rem; text-decoration: none; border:none; background-color:#00000000;">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="#409453"
                                    d="M1.101 21.757L23.8 12.028 1.101 2.3l.011 7.912 13.623 1.816-13.623 1.817-.011 7.912z">
                                </path>
                            </svg>
                        </span>
                    </button>

                </form>
            </div>
        </div>
        <div class="pesquisa-image rounded-circle d-none" id="startChatBtn">
            <span id="notificacaoBadge"
                class="badge badge-danger rounded-circle position-absolute d-none notificacao">0</span>
            <img src="<?=DIRIMG?>icon.png" width="58">
        </div>
    </div>
    <div class="arrow-notify position-fixed d-none" id="arrowContainer">
        <i class="fa fa-arrow-down animated fadeInDown" id="arrow"></i>
    </div>
    <footer class="mt-5 d-none" id="myFooter">
        <div class="container">
            <div class="row" style="margin-bottom: 0;">
                <div class="col-sm-3">
                    <div class="row" style="margin-bottom: 0;">
                        <div class="col-sm-4">
                            <h2 class="logo">
                                <a href="http://emcomp.com.br" target="_BLANK">
                                    <img src="<?=DIRIMG?>logoknow.png" width="100" height="" />
                                </a>
                            </h2>
                        </div>
                        <div class="col-sm-4">
                            <h2 class="logo">
                                <a href="http://dacg.riopomba.ifsudestemg.edu.br/" target="_BLANK">
                                    <img src="<?=DIRIMG?>logodacg.png" width="100" height="" />
                                </a>
                            </h2>

                        </div>
                    </div>
                    <h2 class="logo">
                        <a href="http://emcomp.com.br" target="_BLANK">
                            <img src="https://emcomp.com.br/wp-content/uploads/2019/11/Logo-Emcomp-branca.png"
                                width="200" height="" />
                        </a>
                    </h2>
                </div>
                <div class="col-sm-3">
                    <h5>Inicio</h5>
                    <ul>
                        <li>
                            <a href="<?=DIRPAGE?>">
                                Cidades
                            </a>
                        </li>
                        <li>
                            <a target="_BLANK"
                                href="https://docs.google.com/forms/d/e/1FAIpQLSdbhwCwCqRhKw8SoCnrUfhF4DUtEpThjgbNc7d6CCP0SOCvmQ/viewform">
                                Cadastrar no sistema
                            </a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Sobre-nós</h5>
                    <ul>
                        <li>
                            <a href="<?=DIRPAGE?>sobre">Informações do Projeto</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <div class="social-networks">
                        <a target="_BLANK" href="https://www.facebook.com/projetorpmaosdadas">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a target="_BLANK" href="https://www.instagram.com/projetorpmaosdadas/">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2020 Copyright - EmComp</p>
        </div>

    </footer>
</body>
<?=$this->addFooter()?>
<script src="<?=DIRJS?>script.js"></script>
<!--JAVA-SCRIPT BOOTSTRAP-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>

</html>