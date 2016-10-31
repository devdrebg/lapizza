<div class="container">
	<div class="row internal">
		<div class="col-md-4 col-md-offset-4">
			<h2 class="text-center">Acessar Painel Administrativo</h2>
			<?php echo form_open('login/redirectadmin'); ?>
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