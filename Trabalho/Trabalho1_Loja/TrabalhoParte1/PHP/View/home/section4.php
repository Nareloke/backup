	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Latest Products</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				<?php for ($p=0; $p < 4; $p++) : ?>
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<button id="<?= $meusItensDecoded[$p]->id ?>"   class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
								<img src="<?= $meusItensDecoded[$p]->imagem ?>" alt="">
							</div>
							<div class="product-body">
								<h3 class="product-price"><?= $meusItensDecoded[$p]->preco ?></h3>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o empty"></i>
								</div>
								<h2 class="product-name"><a href="#"><?= $meusItensDecoded[$p]->nome ?></a></h2>
								<div class="product-btns">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button id="<?= $meusItensDecoded[$p]->id ?>" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
								</div>
							</div>
						</div>
					</div>
				<?php endfor; ?>
				<!-- /Product Single -->

			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="Includes/img/banner15.jpg" alt="">
						<div class="banner-caption">
							<h2 class="white-color">NEW<br>COLLECTION</h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Single -->
					<?php for ($p=3; $p < 6; $p++) : ?>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								<span>New</span>
								<span class="sale">-20%</span>
							</div>
							<button id="<?= $meusItensDecoded[$p]->id ?>"   class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="<?= $meusItensDecoded[$p]->imagem ?>" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price"><?= $meusItensDecoded[$p]->preco ?> <del class="product-old-price"><?= $meusItensDecoded[$p]->preco * 1.2?></del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#"><?= $meusItensDecoded[$p]->nome ?></a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button id="<?= $meusItensDecoded[$p]->id ?>" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
					<?php endfor; ?>
				<!-- /Product Single -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Picked For You</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
					<?php for ($p=12; $p < 20; $p = $p + 2) : ?>
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<button id="<?= $meusItensDecoded[$p]->id ?>"  class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="<?= $meusItensDecoded[$p]->imagem ?>" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price"><?= $meusItensDecoded[$p]->preco ?></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#"><?= $meusItensDecoded[$p]->nome ?></a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button id="<?= $meusItensDecoded[$p]->id ?>" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
					<?php endfor; ?>
				<!-- /Product Single -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->