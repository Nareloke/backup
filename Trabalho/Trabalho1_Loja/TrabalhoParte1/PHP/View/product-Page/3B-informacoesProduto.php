<div class="col-md-6">
    <div class="product-body">
        <div class="product-label">
            <span>New</span>
            <span class="sale">-20%</span>
        </div>
        <h2 class="product-name"><?= $requisaoJSON->nome ?></h2>
        <h3 class="product-price"><?= $requisaoJSON->preco ?> <del class="product-old-price"><?= $requisaoJSON->preco * 1.2 ?></del></h3>
        <div>
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o empty"></i>
            </div>
            <a href="#">3 Review(s) / Add Review</a>
        </div>
        <p><strong>Availability:</strong> In Stock</p>
        <p><strong>Brand:</strong> <?= $requisaoJSON->marca ?></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <div class="product-options">
            <ul class="size-option">
                <li><span class="text-uppercase">Size:</span></li>
                <li class="active"><a href="#">S</a></li>
                <li><a href="#">XL</a></li>
                <li><a href="#">SL</a></li>
            </ul>
            <ul class="color-option">
                <li><span class="text-uppercase">Color:</span></li>
                <li class="active"><a href="#" style="background-color:#475984;"></a></li>
                <li><a href="#" style="background-color:#8A2454;"></a></li>
                <li><a href="#" style="background-color:#BF6989;"></a></li>
                <li><a href="#" style="background-color:#9A54D8;"></a></li>
            </ul>
        </div>

        <div class="product-btns">
            <div class="qty-input">
                <span class="text-uppercase">QTY: </span>
                <input class="input" type="number">
            </div>
            <button  id="<?= $requisaoJSON->id ?>" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
            <div class="pull-right">
                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
            </div>
        </div>
    </div>
</div>