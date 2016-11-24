<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="theme-color" content="#A21117">
		<meta name="robots" content="noindex, nofollow">
		<title><?php echo $title; ?> | LaPizza</title>
		<link rel="stylesheet" href="<?php echo base_url() . 'css/bootstrap.min.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url() . 'fonts/font-awesome/css/font-awesome.min.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url() . 'css/public.css'; ?>">
	</head>
	<body>
		<?php if($this->session->flashdata('messages')) : ?>
			<div id="messages" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							
							<div class="alert <?php if($this->session->flashdata('typemessage') == 'ok') : ?>alert-success<?php else: ?>alert-danger<?php endif; ?>">
								<?php echo $this->session->flashdata('messages'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<h1 class="logo"><a href="<?php echo base_url(); ?>" title=""><img src="<?php echo base_url() . 'img/logo.png'; ?>" alt="" class="img-responsive center-block"></a></h1>
					</div>
					<div class="col-md-4 col-md-offset-3">
						<div class="navbar-header"> 
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#menu-header">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

						<ul id="menu-header" class="nav navbar-nav collapse navbar-collapse bs-navbar-collapse">
							<li><a href="<?php echo base_url(); ?>">Home</a></li>
							<?php if($categories) : ?>
								<li>
									<a href="#" id="menu-products" data-toggle="dropdown">Produtos <span class="caret"></span></a>

									<ul class="dropdown-menu" role="menu" aria-labelledby="menu-products">
										<?php foreach($categories as $categorie) : ?>
											<li><a href="<?php echo base_url() . 'categories/view/' . $categorie['id']; ?>"><?php echo $categorie['name']; ?></a></li>
										<?php endforeach; ?>
									</ul>		
								</li>
							<?php endif; ?>
							<li><a href="<?php echo base_url() . 'contactus'; ?>">Contato</a></li>
					    </ul>
					</div>
					<div class="col-md-3">
						<?php if($this->session->userdata('validated')) : ?>
							<ul class="nav navbar-nav navbar-right">
								<li>
									<a href="#" id="menu-account" data-toggle="dropdown">Minha Conta <span class="caret"></span></a>

									<ul class="dropdown-menu" role="menu" aria-labelledby="menu-account">
										<li><a href="<?php echo base_url() . 'user/orders'; ?>">Meus pedidos</a></li>
										<li><a href="#">Minha conta</a></li>
										<li><a href="<?php echo base_url() . 'user/address'; ?>">Meus endereços</a></li>
										<li><a href="<?php echo base_url() . 'login/logout'; ?>"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
									</ul>	
								</li>
						    </ul>
					    <?php else: ?>
				    		<ul class="nav navbar-nav navbar-right">
								<li><a href="<?php echo base_url() . 'login'; ?>"><span class="glyphicon glyphicon-user"></span> Cadastre-se / <span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						    </ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</header>

		<main>