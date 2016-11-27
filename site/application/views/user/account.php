<div id="editaccount" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="text-center">Editar Minhas Informações</h2>
			</div>
			<div class="modal-body">
				<?php echo form_open_multipart('user/editaccount'); ?>
					<div class="form-group">
						<label for="name">Nome Completo:</label>
						<input type="text" id="name" name="editaccount[name]" value="<?php echo $userdata['name']; ?>" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="phone">Telefone:</label>
						<input type="text" id="phone" name="editaccount[phone]" value="<?php echo $userdata['phone']; ?>" class="form-control" required>
					</div>
					
					<div class="form-group">
						<label>Imagem de Perfil</label>
						<img src="<?php echo $userdata['picture']; ?>" alt="Imagem" title="Prévia da imagem do produto" id="editaccoutprofilepicturepreview" class="img-responsive center-block">
					</div>

					<div class="form-group">
						<input type="hidden" name="editaccount[imagesrc]" value="<?php echo $userdata['picture']; ?>">
						<input type="file" id="editaccoutprofilepicture" name="editaccoutprofilepicture" placeholder="Imagem do Produto">
					</div>

					<div class="form-group">
						<label for="password">Senha Atual:</label>
						<input type="password" id="password" name="editaccount[password]" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="newpassword">Nova Senha:</label>
						<input type="password" id="newpassword" name="editaccount[newpassword]" class="form-control">
					</div>
					<div class="form-group">
						<label for="confirmnewpassword">Confirmar Nova Senha:</label>
						<input type="password" id="confirmpassword" name="editaccount[confirmnewpassword]" class="form-control">
					</div>
					<div class="form-group">
						<input type="hidden" id="email" name="editaccount[email]" value="<?php echo $userdata['email']; ?>">
						<button type="submit" class="btn btn-default tcc-button-submit">Salvar</button>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

<div id="detailsorder" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="text-center">Detalhes do Pedido Nº<span id="orderid"></span></h2>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<p><strong>Status: </strong><span id="status" class="btn"></span></p>		
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<p><strong>Subtotal do Pedido: </strong><br><span id="subtotal"></span></p>
					</div>
					<div class="col-md-4">
						<p><strong>Taxa de Entrega: </strong><br><span id="tax_vat"></span></p>
					</div>
					<div class="col-md-4">
						<p><strong>Total do Pedido: </strong><br><span id="total"></span></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<p><strong>Data: </strong><br><span id="data"></span></p>
						<p><strong>Observações: </strong><span id="message"></span></p>
					</div>
					<div class="col-md-4">
						<p><strong>Forma de Pagamento: </strong><span id="name_billing"></span></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p><strong>Informações de Entrega</strong></p>
						<p>
							<strong>Endereço: </strong><span id="address"></span>
							<strong>CEP: </strong><span id="cep"></span>
						</p>						

						<p><strong>Itens</strong></p>
						<div id="itens">
							<table class="table table-collapsed">
								<thead>
									<tr>
										<th>Imagem</th>
										<th>Informações Gerais</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container internal">
	<div class="row">
		<div class="col-md-12">
			<h1><?php echo $title; ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<div class="row">
				<div class="col-md-12">
					<h2>Minhas Informações</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">	
					<div class="profile-picture"<?php if($userdata['picture']) : ?> style="background-image: url(<?php echo base_url() . $userdata['picture']; ?>) !important;"<?php endif; ?>></div>
				</div>
				<div class="col-md-7">
					<p><strong>Nome Completo:</strong><br><?php echo $userdata['name']; ?></p>
					<p><strong>E-mail de Acesso:</strong><br><?php echo $userdata['email']; ?></p>
					<p><strong>Telefone:</strong> <?php echo $userdata['phone']; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p>
						<a href="#" data-toggle="modal" data-target="#editaccount" class="btn btn-default">Editar</a>
					</p>
					<br>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="row">
				<?php if($addresses) : ?>
						<div class="col-md-12">
							<h2>Meus Endereços</h2>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>CEP</th>
											<th>Logradouro</th>
											<th>Número</th>
											<th>Bairro</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($addresses as $address) :  ?>
											<tr>
												<td><?php echo $address['postalcode']; ?></td>
												<td><?php echo $address['address']; ?></td>
												<td><?php echo $address['number']; ?> <?php echo $address['adjunct']; ?></td>
												<td><?php echo $address['district']; ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
				<?php else: ?>	
						<div class="col-md-12">
							<p>Nenhum endereço cadastrado.</p>
						</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<br>
	
	<?php if($orders) : ?>
	<div class="row">
		<div class="col-md-12">
			<h2>Resumo de Pedidos</h2>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Pedido Nº</th>
							<th>Data</th>
							<th>Total do Pedido</th>
							<th>CEP</th>
							<th>Endereço</th>
							<th>Forma de Pagamento</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($orders as $order) : ?>
							<tr>
								<td><?php echo $order['id']; ?></td>
								<td><?php echo date_format(date_create($order['date']),"d/m/Y"); ?></td>
								<td>R$ <span><?php echo number_format($order['total_price'], 2, ',', '.'); ?></td>
								<td><?php echo $order['postal_code_user']; ?></td>
								<td><?php echo $order['address_user']; ?> Nº <?php echo $order['number_user']; ?></td>
								<td><?php echo $order['name_billing']; ?></td>
								<td class="text-center">
									<button class="btn <?php 
										if($order['status'] == 'Em Preparo') {
											echo 'btn-warning';
										} else if($order['status'] == 'Enviado') {
											echo 'btn-success';
										} else if($order['status'] == 'Cancelado') {
											echo 'btn-danger';
										} else {
											echo 'btn-info';
										}
									 ?>">
									 	<?php echo $order['status']; ?>
									 </button>
									 <br>
									 <br>
									 <a href="#" data-toggle="modal" data-target="#detailsorder" data-order-id="<?php echo $order['id']; ?>" class="btn btn-default link-detailsorder">Detalhes</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php else: ?>
		<div class="row">
			<div class="col-md-12">
				<p>Você não realizou nenhum pedido.</p>
			</div>
		</div>
	<?php endif; ?>
</div>