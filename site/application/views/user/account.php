<?php var_dump($userdata); ?>

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
		<div class="col-md-12">
			<h2>Meus Endereços</h2>
		</div>
	</div>
	<?php if($addresses) : ?>		
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>CEP</th>
							<th>Logradouro</th>
							<th>Número</th>
							<th>Complemento</th>
							<th>Cidade</th>
							<th>Estado</th>
							<th>Apelido para o Endereço</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($addresses as $address) :  ?>
							<tr>
								<td><?php echo $address['postalcode']; ?></td>
								<td><?php echo $address['address']; ?></td>
								<td><?php echo $address['number']; ?></td>
								<td><?php echo $address['district']; ?></td>
								<td><?php echo $address['city']; ?></td>
								<td><?php echo $address['state']; ?></td>
								<td><?php echo $address['name']; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	<?php else: ?>
		<div class="row">
			<div class="col-md-12">
				<p>Nenhum endereço cadastrado.</p>
			</div>
		</div>
	<?php endif; ?>
	<div class="row">
		<div class="col-md-12">
			<h2>Resumo de Pedidos</h2>
		</div>
	</div>
	<?php if($orders) : ?>
	<div class="row">
		<div class="col-md-12 text-center">
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
								<td>
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
								</td>
								<td><a href="#" data-toggle="modal" data-target="#detailsorder" data-order-id="<?php echo $order['id']; ?>" class="btn btn-default link-detailsorder">Detalhes</a></td>
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