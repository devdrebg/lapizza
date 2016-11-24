<div class="container internal">
	<div class="row">
		<div class="col-md-12">
			<h1><?php echo $title; ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Resumo do Pedido</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th class="text-center">Imagem</th>
							<th class="text-center">Nome</th>
							<th class="text-center">Descrição</th>
							<th class="text-center">Quantidade</th>
							<th class="text-center">Preço</th>
							<th class="text-center">Subtotal</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($cart_products as $product) : ?>
							<tr>
								<td><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-product"></td>
								<td><?php echo $product['name']; ?></td>
								<td><?php echo $product['description']; ?></td>
								<td>
									<?php echo $product['quantity']; ?>
								</td>
								<td>R$ <span><?php echo number_format($product['price'], 2, ',', '.'); ?></span></td>
								<td>R$ <span><?php echo number_format($product['quantity'] * $product['price'], 2, '.', ','); ?></span></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php echo form_open('checkout/proccess') ; ?>
		<div class="row">
			<div class="col-md-12">
				<h3>Endereço para Entrega:</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?php foreach($addresses as $address) : ?>
					<div class="col-sm-4 end">
						<div class="row">
							<div class="col-md-1">
								<input type="radio" name="addressid" id="address-<?php echo $address['id']; ?>" value="<?php echo $address['id']; ?>">
							</div>
							<div class="col-md-10">
								<label for="address-<?php echo $address['id']; ?>">
									<h4><?php echo $address['name']; ?></h4>
									<address>
										<?php echo $address['address']; ?><br>
										Número: <?php echo $address['number']; ?> <?php echo $address['adjunct']; ?><br>
										Bairro: <?php echo $address['district']; ?>
										Cidade/Estado: <?php echo $address['city']; ?> - <?php echo $address['state']; ?>
									</address>
								</label>
							</div>
							<br>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-5">
				<h3>Método de Pagamento</h3>
				<div class="form-group">
					<select class="form-control" name="name_billing">
						<option disabled>Escolha</option>
						<?php foreach ($billings as $billing) : ?>
							<option value="<?php echo $billing['name']; ?>"><?php echo $billing['name']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<input type="hidden" name="id_user" value="<?php echo $user['id']; ?>">
				<input type="hidden" name="subtotal_price" value="<?php echo $subtotal; ?>">
				<input type="hidden" name="tax_vat" value="<?php echo $tax_vat; ?>">
				<input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
				<input type="hidden" name="name_user" value="<?php echo $user['name']; ?>">
				<input type="hidden" name="phone_user" value="<?php echo $user['phone']; ?>">
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="message">Caso haja alguma observação referente a algum dos produtos escolhidos.</label>
					<textarea id="message" name="message" placeholder="Observação" class="form-control"></textarea>
				</div>
			</div>
			<div class="col-md-4">
				<p><strong>Subtotal:</strong> R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></p>
				<p><strong>Taxa de Entrega:</strong> R$ <?php echo number_format($tax_vat, 2, ',', '.'); ?></p>
				<p><strong>Total do Pedido:</strong> R$ <?php echo number_format($total_price, 2, ',', '.'); ?></p>
				<br>
				<button type="submit" class="btn btn-default tcc-button-submit">Finalizar Pedido</a></button>
			</div>
		</div>
	<?php echo form_close(); ?>
</div>