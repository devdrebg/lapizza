<div class="container">
	<div class="row internal">
		<div class="col-md-6">
			<h2 class="text-center">Quero me cadastrar!</h2>
		</div>
		<div class="col-md-6">
			<h2 class="text-center">Já sou cadastrado!</h2>
			<?php echo form_open('email/send'); ?>
				<div class="form-group">
					<input type="email" placeholder="E-mail ou Usuário" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="password" placeholder="Senha" class="form-control" required>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default tcc-button-submit">Submit</button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>