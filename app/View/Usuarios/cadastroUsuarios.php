<div class="mx-auto" style="width: 50%;">
	<div class="card">
		<div class="card-header">
			Cadastro
		</div>
		<div class="card-body">
			<form id="formUser">
				<table class="table table-striped">
					<tr>
						<td>
							<label for="nome">
								Nome
							</label>
						</td>
						<td>
							<input type="text" name="nome" id="nome" class="form-control" autofocus required>
						</td>
					</tr>
					<tr>
						<td>
							<label for="email">
								E-mail
							</label>
						</td>
						<td>
							<input type="mail" name="email" id="email" class="form-control" required>
						</td>
					</tr>
					<tr>
						<td>
							<label for="login">
								Login
							</label>
						</td>
						<td>
							<input type="text" name="login" id="login" class="form-control" required>
							<p id="message" style="font-size: 12px;"></p>
						</td>
					</tr>
					<tr>
						<td>
							<label for="passwd">
								Senha
							</label>
						</td>
						<td>
							<input type="password" name="passwd" id="passwd" class="form-control" required>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div class="card-footer">
			<button disabled id="btnCadastrar" class="btn btn-outline-success btn-block">
				Cadastrar
			</button>
		</div>
	</div>
</div>
<div id="modalUser" class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			</div>
			<div class="modal-body">
				<div id="loader" hidden></div>
				<div id="modalSuccess" hidden>
					Usuario cadastrado com sucesso!!! <br>
					Volte e faça login.
				</div>
				<div id="modalError" hidden>
					Algo deu errado!!!, tente novamente.
				</div>
			</div>
			<div class="modal-footer">
				<button id="btnVoltar" class="btn btn-outline-primary btn-block">
					Voltar
				</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=DIRJS?>users.js"></script>