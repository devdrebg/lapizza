<?php if($banners) : ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php $c1 = 0; ?>
		<?php foreach($banners as $banner) : ?>
			<li data-target="#myCarousel" data-slide-to="<?php echo $c1; ?>"<?php echo ($c1 == 0) ? ' class="active"' : '' ?>></li>
			<?php $c1++; ?>
		<?php endforeach; ?>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<?php $c2 = 0; ?>
		<?php foreach($banners as $banner) : ?>
			<div class="item<?php echo ($c2 == 0) ? ' active' : '' ?>">
				<img src="<?php echo base_url() . $banner['url']; ?>" alt="<?php echo $banner['title']; ?>" title="<?php echo $banner['title']; ?>">
				<div class="carousel-caption">
					<h3><a href="<?php echo ($banner['link']) ? $banner['link'] : 'aaa'; ?>"<?php echo ($banner['blank']) ? ' target="_blank"' : ''; ?>><?php echo $banner['title']; ?></a></h3>
				</div>
			</div>
			<?php $c2++; ?>
		<?php endforeach; ?>
	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Anterior</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Próximo</span>
	</a>
</div>
<?php else: ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p>Nenhum banner cadastrado/ativo.</p>
			</div>
		</div>
	</div>
<?php endif; ?>


<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<br>
			<h2 class="custom-title">Alguns de Nossos Produtos</h2>
		</div>
	</div>
	<div class="row">
		<!-- class="wow fadeInLeft animated" data-wow-delay="0.2s" -->
		<?php if($products) : ?>
			<?php foreach($products as $product) : ?>
				<div class="col-md-3 product text-center wow fadeInLeft animated" data-wow-delay="1.2s">
					<a href="<?php echo base_url() . 'products/view/' . $product['id']; ?>" title="<?php echo $product['name']; ?>" class="img-product" style="background-image: url(<?php echo base_url() . $product['image']; ?>);"></a>
					<h2><a href="<?php echo base_url() . 'products/view/' . $product['id']; ?>" title="<?php echo $product['name']; ?>"><?php echo $product['name']; ?></a></h2>
					<div class="price">
						R$ <span><?php echo number_format($product['price'], 2, ',', '.'); ?></span>
					</div>
					<div class="text-center">
						<p>
							<a href="<?php echo base_url() . 'products/view/' . $product['id']; ?>" class="btn btn-default tcc-button-submit-inline">Detalhes</a>
						</p>
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