<!DOCTYPE html>
<html>

<head>
    <title><?= NAME . " - " . $this->getTitle() ?></title>
    <meta name="google-site-verification" content="zsRbfjh3WGrFJv9kOfwYlR1vuU-Djc1VOaDerBEaoJM" />
    <meta charset="utf-8">

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/solid.min.js" crossorigin="anonymous"></script>



    <!--Icone-->
    <link rel="icon" href="<?= DIRIMG ?>/favicon.png">
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="<?= DIRPAGE . 'vendor/twbs/bootstrap/dist/css/bootstrap.min.css' ?>">
    <!--Local css-->
    <link rel="stylesheet" type="text/css" href="<?= DIRCSS ?>styles.css">
    <link rel="stylesheet" type="text/css" href="<?= DIRCSS ?>main.css">
    <link rel="stylesheet" type="text/css" href="<?= DIRCSS ?>animate.css">
    <!--Meta tag de recursividade para dispositivos moveis-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Script do JQUERY-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <?= $this->addHead() ?>
</head>

<body>
    <?= $this->addNav() ?>
    <div>
        <?= $this->addHeader() ?>
    </div>
    <div class="body">
        <?= $this->addMain() ?>
    </div>
    <div>
        <?= $this->addFooter() ?>
    </div>
    <br>

    <footer class="mt-5 d-none" id="myFooter">
        <div class="container">
            <div class="row" style="margin-bottom: 0;">
                <div class="col-sm-3">
                    <div class="row" style="margin-bottom: 0;">
                        <div class="col-sm-4">
                            <h2 class="logo">
                                <a href="http://emcomp.com.br" target="_BLANK">
                                    <img src="<?= DIRIMG ?>logoknow.png" width="100" height="" />
                                </a>
                            </h2>
                        </div>
                        <div class="col-sm-4">
                            <h2 class="logo">
                                <a href="http://dacg.riopomba.ifsudestemg.edu.br/" target="_BLANK">
                                    <img src="<?= DIRIMG ?>logodacg.png" width="100" height="" />
                                </a>
                            </h2>

                        </div>
                    </div>
                    <h2 class="logo">
                        <a href="http://emcomp.com.br" target="_BLANK">
                            <img src="https://emcomp.com.br/wp-content/uploads/2019/11/Logo-Emcomp-branca.png" width="200" height="" />
                        </a>
                    </h2>
                </div>
                <div class="col-sm-3">
                    <h5>Inicio</h5>
                    <ul>
                        <li>
                            <a href="<?= DIRPAGE ?>">
                                Cidades
                            </a>
                        </li>
                        <li>
                            <a target="_BLANK" href="https://docs.google.com/forms/d/e/1FAIpQLSdbhwCwCqRhKw8SoCnrUfhF4DUtEpThjgbNc7d6CCP0SOCvmQ/viewform">
                                Cadastrar no sistema
                            </a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Sobre-nós</h5>
                    <ul>
                        <li>
                            <a href="">Informações do Projeto</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <div class="social-networks">
                        <a target="_BLANK" href="https://www.facebook.com/projetorpmaosdadas"><i class="fab fa-facebook"></i></a>
                        <a target="_BLANK" href="https://www.instagram.com/projetorpmaosdadas/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2020 Copyright - EmComp</p>
        </div>

    </footer>
</body>
<script src="<?= DIRJS ?>script.js"></script>
<!--JAVA-SCRIPT BOOTSTRAP-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>