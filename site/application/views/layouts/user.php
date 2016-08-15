<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta name="theme-color" value="#BC2026">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
						<h1 class="logo"><a href="<?php echo base_url(); ?>" title=""><img src="<?php echo base_url() . 'img/logo.png'; ?>" alt="" class="img-responsive center-block"></a></h1>
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
							<li><a href="<?php echo base_url(); ?>">Home</a></li>
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
							<li><a href="<?php echo base_url() . 'contactus'; ?>">Contato</a></li>
					    </ul>
					</div>
					<div class="col-md-4">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#" id="menu-account" data-toggle="dropdown">Minha Conta <span class="caret"></span></a>

								<ul class="dropdown-menu" role="menu" aria-labelledby="menu-account">
									<li><a href="#">Meus pedidos</a></li>
									<li><a href="#">Minha conta</a></li>
									<li><a href="#">Meus endereços</a></li>
									<li><a href="<?php echo base_url() . 'login/logout'; ?>"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
								</ul>	
							</li>
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
							<li><a href="<?php echo base_url() . 'about'; ?>">Quem somos</a></li>
							<li><a href="#" data-toggle="modal" data-target="#terms-and-conditions">Termos e condições de uso</a></li>
							<li><a href="#" data-toggle="modal" data-target="#privacity">Privacidade</a></li>
							<li><a href="<?php echo base_url() . 'howworks'; ?>">Como pedir</a></li>
							<li><a href="<?php echo base_url() . 'contactus'; ?>">Fale conosco</a></li>
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

		<div id="terms-and-conditions" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2 class="text-center">Termos e condições de uso</h2>
					</div>
					<div class="modal-body">
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc velit dui, aliquam id mollis in, maximus quis nisi. Vestibulum ut massa feugiat; pretium risus a, scelerisque lectus! Fusce a ipsum sit amet libero ornare sollicitudin sit amet sed lectus? Nullam vitae luctus eros, a viverra ipsum? Fusce quis fermentum libero. Fusce placerat mi eu varius imperdiet? Ut rutrum ante id aliquam bibendum! Proin mattis, orci eget viverra consequat, libero felis sagittis tellus; sed porttitor dolor ante vel arcu. Etiam tincidunt; ipsum a tristique hendrerit; odio magna varius odio, quis tincidunt quam tortor non nunc. Phasellus auctor erat metus, ut egestas mi mollis at. Etiam rhoncus ligula pharetra, egestas leo et, finibus ligula. Mauris ac nisl est. Proin sed gravida lectus.
						</p>

						<p>
						Mauris iaculis, sem eu consectetur mollis, quam eros interdum dolor, ac blandit nulla sapien vel orci. Duis sed placerat magna. Duis eleifend consectetur ipsum, id mollis nulla commodo at. Aenean congue tempor luctus! Quisque id purus nisl. Vestibulum et metus tincidunt, molestie nulla vel, fermentum massa? In dictum risus id ex vehicula semper. Vivamus elementum nisi nunc; sed varius ipsum tempor quis. Nulla luctus sapien congue velit ultricies lobortis. Maecenas lacinia, odio ut consequat lobortis, urna neque euismod risus, quis sagittis lacus turpis eget eros. Fusce ipsum nulla, facilisis nec lorem auctor, feugiat ullamcorper turpis.
						</p>

						<p>
						Vivamus dictum, neque non venenatis pulvinar, elit turpis lobortis metus, quis eleifend ipsum erat vitae neque. Praesent dignissim est vitae tortor auctor ultricies? Nam gravida porta ex sit amet commodo. Praesent sodales, odio ut suscipit dictum; metus nisl blandit velit, pulvinar eleifend augue neque ac justo. Vivamus facilisis, arcu nec iaculis maximus, enim libero consectetur neque; vel commodo lacus ipsum non odio! Aenean ultricies magna at semper luctus. Vestibulum nisi dui, elementum id feugiat et, interdum eu arcu. Suspendisse arcu turpis, mollis ac metus vel, hendrerit dapibus tortor! Aliquam erat volutpat.
						</p>
					</div>
				</div>
			</div>
		</div>

		<div id="privacity" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2 class="text-center">Privacidade</h2>
					</div>
					<div class="modal-body">
						<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc velit dui, aliquam id mollis in, maximus quis nisi. Vestibulum ut massa feugiat; pretium risus a, scelerisque lectus! Fusce a ipsum sit amet libero ornare sollicitudin sit amet sed lectus? Nullam vitae luctus eros, a viverra ipsum? Fusce quis fermentum libero. Fusce placerat mi eu varius imperdiet? Ut rutrum ante id aliquam bibendum! Proin mattis, orci eget viverra consequat, libero felis sagittis tellus; sed porttitor dolor ante vel arcu. Etiam tincidunt; ipsum a tristique hendrerit; odio magna varius odio, quis tincidunt quam tortor non nunc. Phasellus auctor erat metus, ut egestas mi mollis at. Etiam rhoncus ligula pharetra, egestas leo et, finibus ligula. Mauris ac nisl est. Proin sed gravida lectus.
						</p>

						<p>
						Mauris iaculis, sem eu consectetur mollis, quam eros interdum dolor, ac blandit nulla sapien vel orci. Duis sed placerat magna. Duis eleifend consectetur ipsum, id mollis nulla commodo at. Aenean congue tempor luctus! Quisque id purus nisl. Vestibulum et metus tincidunt, molestie nulla vel, fermentum massa? In dictum risus id ex vehicula semper. Vivamus elementum nisi nunc; sed varius ipsum tempor quis. Nulla luctus sapien congue velit ultricies lobortis. Maecenas lacinia, odio ut consequat lobortis, urna neque euismod risus, quis sagittis lacus turpis eget eros. Fusce ipsum nulla, facilisis nec lorem auctor, feugiat ullamcorper turpis.
						</p>

						<p>
						Vivamus dictum, neque non venenatis pulvinar, elit turpis lobortis metus, quis eleifend ipsum erat vitae neque. Praesent dignissim est vitae tortor auctor ultricies? Nam gravida porta ex sit amet commodo. Praesent sodales, odio ut suscipit dictum; metus nisl blandit velit, pulvinar eleifend augue neque ac justo. Vivamus facilisis, arcu nec iaculis maximus, enim libero consectetur neque; vel commodo lacus ipsum non odio! Aenean ultricies magna at semper luctus. Vestibulum nisi dui, elementum id feugiat et, interdum eu arcu. Suspendisse arcu turpis, mollis ac metus vel, hendrerit dapibus tortor! Aliquam erat volutpat.
						</p>
					</div>
				</div>
			</div>
		</div>

		<script src="<?php echo base_url() . 'js/jquery-1.12.4.min.js'; ?>"></script>
		<script src="<?php echo base_url() . 'js/bootstrap.min.js'; ?>"></script>
		<script src="<?php echo base_url() . 'js/public.js'; ?>"></script>
	</body>
</html>