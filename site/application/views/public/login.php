<div class="container">
	<div class="row internal">
		<div class="col-md-4 col-md-offset-1">
			<h2 class="text-center">Acessar conta</h2>
			<?php echo form_open('user/login'); ?>
				<div class="form-group">
					<input type="email" name="userlogin[user]" placeholder="E-mail ou Usuário" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="password" name="userlogin[password]" placeholder="Senha" class="form-control" required>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default tcc-button-submit">Entrar</button>
				</div>
			<?php echo form_close(); ?>
		</div>
		<div class="col-md-4 col-md-offset-2">
			<h2 class="text-center">Novo cadastro</h2>
			<?php echo form_open('user/create'); ?>
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
					<input type="email" name="usercreate[user]" placeholder="E-mail" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="password" placeholder="Senha" class="form-control" required>
				</div>
				<div class="checkbox">
					<p class="text-center"><label><input type="checkbox" value="">Aceito os <a href="#terms-and-conditions">termos e condições</a> de uso</label></p>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default tcc-button-submit">Cadastrar</button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>