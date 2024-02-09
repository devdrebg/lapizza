<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="theme-color" content="#A21117">
		<meta name="robots" content="noindex, nofollow">
		<title><?php echo $title; ?> | Área Administrativa LaPizza</title>
		<link rel="stylesheet" href="<?php echo base_url() . 'css/bootstrap.min.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url() . 'fonts/font-awesome/css/font-awesome.min.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url() . 'css/admin.css'; ?>">
		<link rel="shortcut icon" href="<?php echo base_url() . 'favicon.ico'; ?>" type="image/x-icon" >
		<script>
			const BASEURL = '<?php echo base_url(); ?>';
		</script>
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
					<?php if($this->session->userdata('validated') || $this->session->userdata('type') == 1) : ?>
						<div class="col-md-2">
							<h1 class="logo"><a href="<?php echo base_url(); ?>admin" title="Início | Área Administrativa LaPizza"><img src="<?php echo base_url() . 'img/logo.png'; ?>" alt="Início | Área Administrativa LaPizza" class="img-responsive center-block"></a></h1>
						</div>
						<div class="col-md-10 no-padding">
							<div class="navbar-header"> 
								<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#menu-header">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>

							<ul id="menu-header" class="nav navbar-nav collapse navbar-collapse bs-navbar-collapse">
								<li><a href="<?php echo base_url(); ?>admin/categories">Categorias</a></li>
								<li><a href="<?php echo base_url(); ?>admin/products">Produtos</a></li>
								<li><a href="<?php echo base_url(); ?>admin/users">Usuários</a></li>
								<li><a href="<?php echo base_url(); ?>admin/orders">Pedidos</a></li>
								<li><a href="<?php echo base_url(); ?>admin/billings">Pagamento</a></li>
								<li><a href="<?php echo base_url(); ?>admin/banners">Banners</a></li>
								<li><a href="<?php echo base_url(); ?>admin/postalcodes">Regiões</a></li>
								<li><a href="<?php echo base_url(); ?>admin/options">Opções da Loja</a></li>
								<li><a href="<?php echo base_url() . 'login/logout'; ?>"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
						    </ul>
						</div>
					<?php else: ?>
						<div class="col-md-2 col-md-offset-5">
							<h1 class="logo"><a href="<?php echo base_url(); ?>admin" title="Início | Área Administrativa LaPizza"><img src="<?php echo base_url() . 'img/logo.png'; ?>" alt="Início | Área Administrativa LaPizza" class="img-responsive center-block"></a></h1>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</header>

		<main>