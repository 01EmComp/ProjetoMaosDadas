<!DOCTYPE html>
<html>
<head>
	<title><?=NAME." - ".$this->getTitle()?></title>
	<meta charset="utf-8">
	<!--Favicon.ico-->
	<link rel="shortcut icon" href="<?=DIRIMG?>favicon.ico" style="width:100%;heght:100%;"/>
	<!--Bootstrap-->
	<link rel="stylesheet" type="text/css" href="<?=DIRPAGE.'vendor/twbs/bootstrap/dist/css/bootstrap.min.css'?>">
	<!--Local css-->
	<link rel="stylesheet" type="text/css" href="<?=DIRCSS?>styles.css">
	<link rel="stylesheet" type="text/css" href="<?=DIRCSS?>main.css">
	<link rel="stylesheet" type="text/css" href="<?=DIRCSS?>animate.css">
	<!--Meta tag de recursividade para dispositivos moveis-->
	<meta name="viewport" content="width=device-width">
	<!--Script do JQUERY-->
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<?=$this->addHead()?>
</head>
<body>
	<?=$this->addNav()?>
	<div>
		<?=$this->addHeader()?>
	</div>
	<div class="body">
		<?=$this->addMain()?>
	</div>
	<div>
		<?=$this->addFooter()?>
	</div>
	<br>
	
    <footer class="mt-5 d-none"id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2 class="logo"><a href="http://emcomp.com.br"><img src="https://emcomp.com.br/wp-content/uploads/2019/11/Logo-Emcomp-branca.png" width="200" height=""/></a></h2>
                </div>
                <div class="col-sm-3">
                    <h5>Inicio</h5>
                    <ul>
                        <li><a href="viewListarCidades.php">Cidades</a></li>
                        <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSdbhwCwCqRhKw8SoCnrUfhF4DUtEpThjgbNc7d6CCP0SOCvmQ/viewform">Cadastrar no sistema</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Sobre-nós</h5>
                    <ul>
                        <li><a href="">Informações do Projeto</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <div class="social-networks">
                        <a href="https://www.facebook.com/EmComp/" ><i class="fab fa-facebook"></i></a>
                        <a href="instagram.com/emcomp/" ><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2020 Copyright - EmComp</p>
        </div>
    </footer>
</body>
<!--Script do reCATPTCHA da google-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<!--JAVA-SCRIPT BOOTSTRAP-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>