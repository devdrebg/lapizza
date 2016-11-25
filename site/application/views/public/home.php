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

