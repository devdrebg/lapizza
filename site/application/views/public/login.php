<div class="container internal">
	<div class="row">
		<div class="col-md-4 col-md-offset-1">
			<h2 class="text-center">Acessar conta</h2>
			<?php echo form_open('login/redirect'); ?>
				<div class="form-group">
					<input type="email" name="login[email]" placeholder="E-mail" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="password" name="login[password]" placeholder="Senha" class="form-control" required>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default tcc-button-submit">Entrar</button>
				</div>
				<div class="form-group">
					<p class="text-center">
						<a href="#" data-toggle="modal" data-target="#forggot-password">Esqueci minha senha</a>
					</p>
				</div>
			<?php echo form_close(); ?>
			<div class="validate">
				<?php echo validation_errors(); ?>
			</div>
		</div>
		<div class="col-md-4 col-md-offset-2">
			<h2 class="text-center">Novo cadastro</h2>
			<?php echo form_open('login/signin'); ?>
				<div class="form-group">
					<input type="text" name="usercreate[name]" placeholder="Nome Completo" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="text" name="usercreate[user]" placeholder="Usuário" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="tel" name="usercreate[phone]" placeholder="Telefone ou Celular" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="email" name="usercreate[email]" placeholder="E-mail" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="password" name="usercreate[senha]" placeholder="Senha" class="form-control" required>
				</div>
				<div class="checkbox">
					<p class="text-center"><label><input type="checkbox" value="1" required>Aceito os <a href="#terms-and-conditions" data-toggle="modal" data-target="#terms-and-conditions">termos e condições</a> de uso</label></p>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default tcc-button-submit">Cadastrar</button>
				</div>
			<?php echo form_close(); ?>
			<?php if (isset($message)) : ?>
				<p><?php echo $message; ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>

<div id="forggot-password" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="text-center">Esqueci minha senha</h2>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<?php echo form_open('user/forggotpassword'); ?>
							<div class="form-group">	
								<p>Digite seu endereço de e-mail a seguir para que possamos enviar um e-mail de recuperação de senha.</p>
							</div>
							<div class="form-group">	
								<input type="email" name="userforggotpassword[email]" placeholder="E-mail" class="form-control" required>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-default tcc-button-submit">Cadastrar</button>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>