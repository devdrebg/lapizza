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
					<div class="col-md-8 col-md-offset-1">
						<div class="navbar-header"> 
							<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#menu-header">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

						<ul id="menu-header" class="nav navbar-nav collapse navbar-collapse bs-navbar-collapse">
							<li><a href="<?php echo base_url(); ?>">Início</a></li>
							<li><a href="<?php echo base_url(); ?>admin/categories">Categorias</a></li>
							<li><a href="<?php echo base_url(); ?>admin/products">Produtos</a></li>
							<li><a href="<?php echo base_url(); ?>admin/users">Usuários</a></li>
							<li><a href="<?php echo base_url(); ?>admin/billings">Pedidos</a></li>
							<li><a href="<?php echo base_url(); ?>admin/banners">Banners</a></li>
							<li><a href="<?php echo base_url(); ?>admin/options">Opções da Loja</a></li>
							<li><a href="<?php echo base_url() . 'login/logout'; ?>"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
					    </ul>
					</div>
				</div>
			</div>
		</header>

		<main>