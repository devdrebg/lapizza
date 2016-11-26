<div class="container internal">
	<div class="row">
		<div class="col-md-12">
			<h1><?php echo $title; ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<?php echo form_open('login/redirect'); ?>
				<h2>Formulário de Contato</h2>
				<p>Preencha o formulário abaixo para entrar em contato conosco.</p>
				<div class="form-group">
					<label for="nome">Nome:</label>
					<input type="" id="nome" name="nome" required class="form-control">
				</div>
				<div class="form-group">
					<label for="email">E-mail:</label>
					<input type="email" id="email" name="email" required class="form-control">
				</div>
				<div class="form-group">
					<label for="tel">Telefone:</label>
					<input type="tel" id="tel" name="tel" required class="form-control">
				</div>
				<div class="form-group">
					<label for="pedido">Nº do Pedido</label>
					<input type="tel" id="pedido" name="pedido" required class="form-control">
				</div>
				<div class="form-group">
					<label for="mensagem">Mensagem:</label>
					<textarea id="mensagem" name="mensagem" required class="form-control"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">Enviar</button>
				</div>
			<?php echo form_close(); ?>
		</div>
		<div class="col-md-6">
			<h2>Contato</h2>

			<address><i class="fa fa-home"></i> Rua Fulano de Tal, 19 CEP: 00000-000 São Paulo - SP</address>
			<address><i class="fa fa-phone"> <a href="tel:(11) 9999-9999">(11) 9999-9999</a></i></address>
			<p><i class="fa fa-envelope"></i> <a href="mailto:contato@lapizza.com.br" title="Enviar um e-mail para contato@lapizza.com.br">contato@lapizza.com.br</a></p>

			<p><img src="<?php echo base_url() . 'img/contactus.jpg'; ?>" alt="<?php echo $title; ?>" class="img-responsive center-block"></p>
		</div>
	</div>
</div>
<div class="overlay" onClick="style.pointerEvents='none'"></div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.140895177607!2d-46.498921985569915!3d-23.49143408471762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce605d414e89c9%3A0x12419ef600b0b060!2sR.+Barra+de+Santa+Rosa%2C+845+-+Parque+Cisper%2C+S%C3%A3o+Paulo+-+SP%2C+03817-010!5e0!3m2!1spt-BR!2sbr!4v1480173118106" style="width: 100%; height: 400px;" frameborder="0" style="border:0" allowfullscreen></iframe>