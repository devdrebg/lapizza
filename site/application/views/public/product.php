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
				<?php if($product['quantitystock'] > 0) : ?>
					<?php echo form_open('cart/add'); ?>
						<br>
						<div class="form-group row">
							<div class="col-xs-3 col-sm-2">
								<label>Quantidade:</label>
								<input type="text" id="qtd-update-product-id-<?php echo $product['id']; ?>" name="addproductcart[quantity]" value="1" class="form-control text-center number" required min="1" max="<?php echo $product['quantitystock']; ?>">
								<input type="hidden" name="addproductcart[quantitystock]" value="<?php echo $product['quantitystock']; ?>">
							</div>
							<div class="col-xs-1 no-padding">
								<br>
								<a href="#" data-target="qtd-update-product-id-<?php echo $product['id']; ?>" class="minus"><i class="fa fa-minus" aria-hidden="true"></i></a><br>
								<a href="#" data-target="qtd-update-product-id-<?php echo $product['id']; ?>" class="plus"><i class="fa fa-plus" aria-hidden="true"></i></a>
							</div>
						</div>
						<br>
						<input type="hidden" name="addproductcart[image]" value="<?php echo base_url() . $product['image']; ?>">
						<input type="hidden" name="addproductcart[name]" value="<?php echo $product['name']; ?>">
						<input type="hidden" name="addproductcart[description]" value="<?php echo $product['description']; ?>">
						<input type="hidden" name="addproductcart[price]" value="<?php echo $product['price']; ?>">
						<input type="hidden" name="addproductcart[id]" value="<?php echo $product['id']; ?>">
						<button class="btn btn-default tcc-button-submit-inline">Comprar</a>
					<?php echo form_close(); ?>
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