<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h2 class="title">Picked For You</h2>
				</div>
			</div>
			<!-- section title -->

			<?php if (empty($arraySemelhantes))  
				echo "Não há nenhum produto relacionado" 
			?>


			<?php foreach ($arraySemelhantes as $value) : ?>
			<!-- Product Single -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="product product-single">
					<div class="product-thumb">
						<button id="<?= $value->id ?>" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
						<img src="<?= $value->imagem ?>" alt="">
					</div>
					<div class="product-body">
						<h3 class="product-price"><?= $value->preco ?></h3>
						<div class="product-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o empty"></i>
						</div>
						<h2 class="product-name"><a href="#"><?= $value->nome ?></a></h2>
						<div class="product-btns">
							<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
							<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
							<button id="<?= $value->id ?>" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart </button>
						</div>
					</div>
				</div>
			</div>
			<!-- /Product Single -->
			<?php endforeach ?>

			
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
