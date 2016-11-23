<div class="container internal">
	<div class="row">
		<div class="col-md-12">
			<h1><?php echo $title; ?></h1>
		</div>
	</div>
	<?php if($cart_products) : ?>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>Imagem</th>
								<th>Nome</th>
								<th>Descrição</th>
								<th>Quantidade</th>
								<th class="price-cart">Preço</th>
								<th>Subtotal</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($cart_products as $product) : ?>
								<tr>
									<td><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-product"></td>
									<td><?php echo $product['name']; ?></td>
									<td><?php echo $product['description']; ?></td>
									<td class="frmqtdcart">
										<?php echo form_open('cart/update', array('id' => 'form-qtd-update-product-id-' . $product['id'])); ?>
											<div class="form-group">
													<div class="formqtd">
														<div class="col-md-6 no-padding">
															<input type="text" id="qtd-update-product-id-<?php echo $product['id']; ?>" data-form="qtd-update-product-id-<?php echo $product['id']; ?>" name="updateproductcart[quantity]" value="<?php echo $product['quantity']; ?>" class="form-control text-center number" required min="1" max="<?php echo $product['quantitystock']; ?>">
															<input type="hidden" name="updateproductcart[quantitystock]" value="<?php echo $product['quantitystock']; ?>">
														</div>
														<div class="col-md-2">
															<a href="#" data-form="qtd-update-product-id-<?php echo $product['id']; ?>" data-target="qtd-update-product-id-<?php echo $product['id']; ?>" class="minus"><i class="fa fa-minus" aria-hidden="true"></i></a><br>
															<a href="#" data-form="qtd-update-product-id-<?php echo $product['id']; ?>" data-target="qtd-update-product-id-<?php echo $product['id']; ?>" class="plus"><i class="fa fa-plus" aria-hidden="true"></i></a>
														</div>
													</div>
											</div>
											<input type="hidden" name="updateproductcart[id]" value="<?php echo $product['id']; ?>">
										<?php echo form_close(); ?>
									</td>
									<td>R$ <span><?php echo number_format($product['price'], 2, ',', '.'); ?></span></td>
									<td>R$ <span><?php echo number_format($product['quantity'] * $product['price'], 2, '.', ','); ?></span></td>
									<td><a href="<?php echo base_url(); ?>cart/delete/<?php echo $product['id']; ?>" class="btn btn-danger">Excluir</a></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<a href="<?php echo base_url() . 'cart/emptycart'; ?>" class="btn btn-default">Esvaziar</a>
			</div>
			<div class="col-md-offset-6 col-md-3 text-right">
				<a href="<?php echo base_url() . 'checkout'; ?>" class="btn btn-default tcc-button-submit">Finalizar Pedido</a>
			</div>
		</div>
	<?php else: ?>
		<div class="row">
			<div class="col-md-12">
				<p>Nenhum produto adicionado ao carrinho.</p>
			</div>
		</div>
	<?php endif; ?>
</div>