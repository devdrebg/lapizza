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
		
		<main>