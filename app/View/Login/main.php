<div class="login" id="login">
	<div  id="loader" hidden></div>
	<div class="loginContainer" id="loginContainer">
		<form id="loginForm" onsubmit="">

			<br>
			<input type="text" name="username" id="username" placeholder="Login" required>
			<br>
			<input type="password" name="password" id="senha" placeholder="Senha" required>
			<br>
			<center>
				<div class="g-recaptcha" data-sitekey="6LfKZ74UAAAAAF2TXx7yJ_YDmI-76hHPkyPwX2dL	" id="captcha"></div>
				<p hidden id="alert" data-callback="recaptchaCallback" style="color:#f00; font-size: 19px; font-family: arial; background-color: #000;">&emsp;</p>
			</center>
			<br>
			<button id="btnSubmitLogin">Login</button>
			<br>
			<a href="<?=DIRPAGE?>usuarios/cadastro">Cadastre-se</a>
		</form>
	</div>
</div>

<!--Script local-->
<script type="text/javascript" src="<?=DIRPAGE?>app/View/Login/script.js"></script>