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
	
	<div class="footer">
		<p class="text">
			Copyright &copy; Projeto Mãos Dadas 2020 - Desenvolvido por: EmComp
		</p>
	</div>
</body>
<!--Script do reCATPTCHA da google-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<!--JAVA-SCRIPT BOOTSTRAP-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>