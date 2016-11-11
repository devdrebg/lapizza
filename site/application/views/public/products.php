<div class="container internal">
	<div class="row">
		<div class="col-md-12">
			<h1><?php echo $title; ?></h1>
		</div>
	</div>
	<div class="row">
		<?php if($products) : ?>
			<?php foreach($products as $product) : ?>
				<div class="col-md-3 product text-center">
					<a href="" title="" class="img-product" style="background-image: url(<?php echo base_url() . $product['image']; ?>);"></a>
					<h2><a href=""><?php echo $product['name']; ?></a></h2>
					<div class="price">
						R$ <span><?php echo number_format($product['price'], 2, ',', '.'); ?></span>
					</div>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<div class="col-md-12">
				<p>Nenhum produto cadastrado nesta categoria.</p>
			</div>
		<?php endif; ?>
	</div>
</div>