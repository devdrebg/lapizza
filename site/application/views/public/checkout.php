<div class="container internal">
	<div class="row">
		<div class="col-md-12">
			<h1><?php echo $title; ?></h1>
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
</div>