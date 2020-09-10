		<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Review</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th></th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										<th class="text-right"></th>
									</tr>
								</thead>

								<tbody>
									<?php $totalPriceCart = 0; ?>
									<?php foreach ( $_SESSION["produtos"] as $value ) : ?>
									<tr>
										<td class="thumb"><img src="<?= $value->imagem ?>" alt=""></td>
										<td class="details">
											<a href="#"><?= $value->nome ?></a>
											<ul>
												<li><span>Tipo: <?= $value->tipo ?></span></li>
												<li><span>Marca: <?= $value->marca ?></span></li>
											</ul>
										</td>
										<td class="price text-center"><strong><?= $value->preco ?></strong></td>
										<td class="qty text-center"><input class="input" type="number" value="1"></td>
										<td class="total text-center"><strong class="primary-color"><?= $value->preco ?></strong></td>
										<td class="text-right"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></td>
									</tr>
									<?php $totalPriceCart += $value->preco ; ?>
									<?php endforeach; ?>
								</tbody>

								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SUBTOTAL</th>
										<th colspan="2" class="sub-total">R$ <?= $totalPriceCart ?></th>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SHIPING</th>
										<td colspan="2">Free Shipping</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total"><?= number_format((float) $totalPriceCart, 2, ".", "") ?></th>
									</tr>
								</tfoot>
							</table>
							<div class="pull-right">
								<button class="primary-btn">Place Order</button>
							</div>
						</div>

					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->