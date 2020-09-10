	<?php
    $retornoRAMJSON  = file_get_contents("https://ramos-api.herokuapp.com/produtos?tipo=ram&pront=3006301&key=909d4f72da60d472d68815e2c53fe509");
    $retornoRAMDecoded = json_decode( $retornoRAMJSON );


	$retornoVGAJSON  = file_get_contents("https://ramos-api.herokuapp.com/produtos?tipo=vga&pront=3006301&key=909d4f72da60d472d68815e2c53fe509");
    $retornoVGADecoded = json_decode( $retornoVGAJSON );
	?>

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Deals Of The Day</h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="Includes/img/banner14.jpg" alt="">
						<div class="banner-caption">
							<h2 class="white-color">NEW<br>COLLECTION</h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-1" class="product-slick">

							<!-- Product Single -->
							<?php for ( $p=0; $p < 4 ; $p++ ) : ?>
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>New</span>
										<span class="sale">-20%</span>
									</div>
									<ul class="product-countdown">
										<li><span>00 H</span></li>
										<li><span>00 M</span></li>
										<li><span>00 S</span></li>
									</ul>
									<button id="<?= $retornoRAMDecoded[$p]->id ?>" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
									<img src="<?= $retornoRAMDecoded[$p]->imagem ?>" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price"><?= $retornoRAMDecoded[$p]->preco ?><del class="product-old-price"><?= $retornoRAMDecoded[$p]->preco * 1.2 ?></del></h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<h2 class="product-name"><a href="#"><?= $retornoRAMDecoded[$p]->nome ?></a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button id="<?= $retornoRAMDecoded[$p]->id ?>" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</div>
							</div>
							<?php endfor; ?>
							<!-- /Product Single -->
						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Deals Of The Day</h2>
						<div class="pull-right">
							<div class="product-slick-dots-2 custom-dots">
							</div>
						</div>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single product-hot">
						<div class="product-thumb">
							<div class="product-label">
								<span class="sale">-20%</span>
							</div>
							<ul class="product-countdown">
								<li><span>00 H</span></li>
								<li><span>00 M</span></li>
								<li><span>00 S</span></li>
							</ul>
							<button id="<?= $retornoVGADecoded[$p]->id ?>"  class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="<?= $retornoVGADecoded[$p]->imagem ?>" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price"><?= $retornoVGADecoded[0]->preco ?> <del class="product-old-price"><?= $retornoVGADecoded[$p]->preco * 1.2 ?></del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#"><?= $retornoVGADecoded[$p]->nome ?></a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button id="<?= $retornoVGADecoded[0]->id ?>" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-2" class="product-slick">

							<!-- Product Single -->
							<?php for ( $p=1; $p < 5 ; $p++ ) : ?>
							<div class="product product-single">
								<div class="product-thumb">
									<button id="<?= $retornoVGADecoded[$p]->id ?>"  class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
									<img src="<?= $retornoVGADecoded[$p]->imagem ?>" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price"><?= $retornoVGADecoded[$p]->preco ?></h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<h2 class="product-name"><a href="#"><?= $retornoVGADecoded[$p]->nome ?></a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button id="<?= $retornoVGADecoded[$p]->id ?>" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</div>
							</div>
							<?php endfor; ?>
							<!-- /Product Single -->
						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->