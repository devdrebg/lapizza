<?php require_once('elements/header.php'); ?>
		<main>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="img/pizza.jpg" alt="Chania">
						<div class="carousel-caption">
							<h3>Pizzas</h3>
							<p>Peça sua pizza online sem sair do conforto de sua casa!</p>
						</div>
					</div>

					<div class="item">
						<img src="img/croissant.jpg" alt="Chania">
						<div class="carousel-caption">
							<h3>Lanches</h3>
							<p>Experimente! Será uma ótima pedida para o seu paladar!</p>
						</div>
					</div>
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
		</main>
<?php require_once('elements/footer.php'); ?>