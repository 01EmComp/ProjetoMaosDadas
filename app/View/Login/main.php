<div class="login" id="login">
	<div class="card  mx-auto center" id="cardLogin">
		<h5 class="card-title text-center" style="padding-top:8px;">
			Login
		</h5>
		<div class="card-body" style="padding-bottom:0;">
			<form class="form-group" id="loginForm" style="margin-bottom:0;">
				<br>
				<input autofocus class="form-control" type="text" name="username" id="username" placeholder="Login" required>
				<br>
				<input class="form-control" type="password" name="password" id="senha" placeholder="Senha" required>
				<br>
				<div class="mx-auto">
					<div class="g-recaptcha"data-expired-callback="expiredCalback"
					data-callback="recaptchaCallback" data-sitekey="<?= PubKey ?>" id="captcha"></div>
					<p id="alert" class="alert alert-danger d-none"></p>
				</div>
				<br>
			</form>
		</div>
		<div class="card-footer">
			<div class="center mx-auto px-md-2">
				<button type="submit" form="loginForm" disabled id="btnSubmitLogin" class="btn btn-outline-success btn-block">Login</button>
			</div>
		</div>
	</div>
</div>

<center>
<div class="lds-ring d-none" id="load">
	<div></div>
	<div></div>
	<div></div>
</div>
</center>

<!--Script local-->
<script type="text/javascript" src="<?= DIRPAGE ?>app/View/Login/script.js"></script>
<!--Script do reCATPTCHA da google-->
<script src='https://www.google.com/recaptcha/api.js'></script>