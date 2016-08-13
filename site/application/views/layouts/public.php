<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="<?php echo base_url() . 'css/bootstrap.min.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url() . 'fonts/font-awesome/css/font-awesome.min.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url() . 'css/public.css'; ?>">
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<h1 class="logo"><a href="" title=""><img src="<?php echo base_url() . 'img/logo.png'; ?>" alt="" class="img-responsive center-block"></a></h1>
					</div>
					<div class="col-md-3 col-md-offset-3">
						<div class="navbar-header"> 
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#menu-header">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

						<ul id="menu-header" class="nav navbar-nav collapse navbar-collapse bs-navbar-collapse">
							<li><a href="#">Home</a></li>
							<li>
								<a href="#" id="menu-products" data-toggle="dropdown">Produtos <span class="caret"></span></a>

								<ul class="dropdown-menu" role="menu" aria-labelledby="menu-products">
									<li><a href="#">Categoria A</a></li>
									<li><a href="#">Categoria B</a></li>
									<li><a href="#">Categoria C</a></li>
									<li><a href="#">Categoria D</a></li>
									<li><a href="#">Categoria E</a></li>
								</ul>		
							</li>
							<li><a href="#">Contato</a></li>
					    </ul>
					</div>
					<div class="col-md-4">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#"><span class="glyphicon glyphicon-user"></span> Cadastre-se</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					    </ul>
					</div>
				</div>
			</div>
		</header>

		<main>
			<?php echo $contents ?>
		</main>

		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h2>Sobre a La Pizza</h2>
						<ul class="menu-footer">
							<li><a href="#">Quem somos</a></li>
							<li><a href="#">Termos e condições de uso</a></li>
							<li><a href="#">Privacidade</a></li>
							<li><a href="#">Como pedir</a></li>
							<li><a href="#">Fale conosco</a></li>
						</ul>
					</div>
					<div class="col-md-4">
						<h2>Siga-nos nas redes sociais</h2>
						<p class="social-footer">
							<a href="#" class="facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
							<a href="#" class="twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
							<a href="#" class="google-plus"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
							<a href="#" class="youtube"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
							<a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#" class="pinterest"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
						</p>
					</div>
					<div class="col-md-4">
						<h2>Contato</h2>

						<address><i class="fa fa-home"></i> Rua Fulano de Tal, 19 CEP: 00000-000 São Paulo</address>
						<address><i class="fa fa-phone"> <a href="tel:(11) 9999-9999">(11) 9999-9999</a></i></address>
						<p><i class="fa fa-envelope"></i> <a href="mailto:contato@lapizza.com.br" title="Enviar um e-mail para contato@lapizza.com.br">contato@lapizza.com.br</a></p>
					</div>
				</div>
			</div>
			<div class="bg-copy">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center">© Copyright 2016 - La Pizza - Todos os direitos reservados pizzaria La Pizza</p>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<script src="<?php echo base_url() . 'js/jquery-1.12.4.min.js'; ?>"></script>
		<script src="<?php echo base_url() . 'js/bootstrap.min.js'; ?>"></script>
		<script src="<?php echo base_url() . 'js/public.js'; ?>"></script>
	</body>
</html>