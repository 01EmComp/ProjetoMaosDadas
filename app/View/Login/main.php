<div class="login" id="login">
	<div  id="loader" hidden></div>
	<div class="loginContainer" id="loginContainer">
		<form id="loginForm" onsubmit="">

			<br>
			<input type="text" name="username" id="username" placeholder="Username" required>
			<br>
			<input type="password" name="password" id="password" placeholder="Password" required>
			<br>
			<center>
				<div class="g-recaptcha" data-sitekey="6LfKZ74UAAAAAF2TXx7yJ_YDmI-76hHPkyPwX2dL" id="captcha"></div>
				<p hidden id="alert" style="color:#f00; font-size: 19px; font-family: arial; background-color: #000;">&emsp;</p>
			</center>
			<br>
			<button id="btnSubmitLogin">Login</button>
			<br>
			<a href="<?=DIRPAGE?>usuarios/cadastro">Cadastre-se</a>
		</form>
	</div>
</div>
<script type="text/javascript">
	window.onload = function() {
		var alert = document.getElementById("alert");
		var recaptcha = document.forms["loginForm"]["g-recaptcha-response"];
		recaptcha.required = true;
		recaptcha.oninvalid = function(e) {
    // fazer algo, no caso to dando um alert
    alert.hidden = false;
    alert.textContent = "Complete o captcha primeiro";
}
}
</script>
<!--Script local-->
<script type="text/javascript" src="<?=DIRJS?>login.js"></script>