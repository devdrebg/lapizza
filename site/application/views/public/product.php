<div class="container internal">
	<div class="row">
		<div class="col-md-5 text-center">
			<figure>
				<img src="<?php echo base_url() . $product['image']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive center-block">
			</figure>
		</div>
		<div class="col-md-7">
				<h1><?php echo $title; ?></h1>
				<p class="description">
					<?php echo $product['description']; ?>
				</p>
				<div class="price">
					R$ <span><?php echo number_format($product['price'], 2, ',', '.'); ?></span>
				</div>
				<?php if($product['quantity'] > 0) : ?>
					<form action="">
						<br>
						<div class="form-group row">
							<div class="col-md-2">
								<label>Quantidade:</label>
								<input type="text" name="addproductcart[quantity]" value="1" class="money form-control text-center" required>
							</div>
							<div class="col-md-1 no-padding">
								<br>
								<a href="#" class="minus"><i class="fa fa-minus" aria-hidden="true"></i></a><br>
								<a href="#" class="plus"><i class="fa fa-plus" aria-hidden="true"></i></a>
							</div>
						</div>
						<br>
						<input type="hidden" name="" value="<?php echo base_url() . $product['image']; ?>">
						<input type="hidden" name="" value="<?php echo $product['name']; ?>">
						<input type="hidden" name="" value="<?php echo $product['id']; ?>">
						<button class="btn btn-default tcc-button-submit-inline">Comprar</a>
					</form>
				<?php else: ?>
					<br>
					<div class="alert alert-info">
					  Produto fora de estoque.
					</div>
				<?php endif; ?>
		</div>

				<!-- <div class="col-md-3 product text-center">
					<a href="<?php echo base_url() . 'products/view/' . $product['id']; ?>" title="<?php echo $product['name']; ?>" class="img-product" style="background-image: url(<?php echo base_url() . $product['image']; ?>);"></a>
					<h2><a href="<?php echo base_url() . 'products/view/' . $product['id']; ?>" title="<?php echo $product['name']; ?>"><?php echo $product['name']; ?></a></h2>
					<div class="price">
						R$ <span><?php echo number_format($product['price'], 2, ',', '.'); ?></span>
					</div>
				</div> -->
	</div>
</div>