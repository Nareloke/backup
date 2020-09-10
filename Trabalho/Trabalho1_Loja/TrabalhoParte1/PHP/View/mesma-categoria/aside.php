<?php
    // $retornoEmJSON  = file_get_contents("https://ramos-api.herokuapp.com/produtos?tipo=". $_SESSION["visualizar-categoria"] ."&pront=3006301&key=909d4f72da60d472d68815e2c53fe509");
    // $retornoDecoded = json_decode( $retornoEmJSON );
    // debug( $retornoDecoded );
?>

<!-- ASIDE -->
<div id="aside" class="col-md-3">
    <!-- aside widget -->
    <div class="aside">
        <h3 class="aside-title">Shop by:</h3>
        <ul class="filter-list">
            <li><span class="text-uppercase">color:</span></li>
            <li><a href="#" style="color:#FFF; background-color:#8A2454;">Camelot</a></li>
            <li><a href="#" style="color:#FFF; background-color:#475984;">East Bay</a></li>
            <li><a href="#" style="color:#FFF; background-color:#BF6989;">Tapestry</a></li>
            <li><a href="#" style="color:#FFF; background-color:#9A54D8;">Medium Purple</a></li>
        </ul>

        <ul class="filter-list">
            <li><span class="text-uppercase">Size:</span></li>
            <li><a href="#">X</a></li>
            <li><a href="#">XL</a></li>
        </ul>

        <ul class="filter-list">
            <li><span class="text-uppercase">Price:</span></li>
            <li><a href="#">MIN: $20.00</a></li>
            <li><a href="#">MAX: $120.00</a></li>
        </ul>

        <ul class="filter-list">
            <li><span class="text-uppercase">Gender:</span></li>
            <li><a href="#">Men</a></li>
        </ul>

        <button class="primary-btn">Clear All</button>
    </div>
    <!-- /aside widget -->

    <!-- aside widget -->
    <div class="aside">
        <h3 class="aside-title">Filter by Price</h3>
        <div id="price-slider"></div>
    </div>
    <!-- aside widget -->

    <!-- aside widget -->
    <div class="aside">
        <h3 class="aside-title">Filter By Color:</h3>
        <ul class="color-option">
            <li><a href="#" style="background-color:#475984;"></a></li>
            <li><a href="#" style="background-color:#8A2454;"></a></li>
            <li class="active"><a href="#" style="background-color:#BF6989;"></a></li>
            <li><a href="#" style="background-color:#9A54D8;"></a></li>
            <li><a href="#" style="background-color:#675F52;"></a></li>
            <li><a href="#" style="background-color:#050505;"></a></li>
            <li><a href="#" style="background-color:#D5B47B;"></a></li>
        </ul>
    </div>
    <!-- /aside widget -->

    <!-- aside widget -->
    <div class="aside">
        <h3 class="aside-title">Filter By Size:</h3>
        <ul class="size-option">
            <li class="active"><a href="#">S</a></li>
            <li class="active"><a href="#">XL</a></li>
            <li><a href="#">SL</a></li>
        </ul>
    </div>
    <!-- /aside widget -->

    <!-- aside widget -->
    <?php 
        $brands = [];
        foreach ( $retornoDecoded as $value ) {
            if ( !in_array($value->marca, $brands) )
                array_push($brands, $value->marca);
        }
    ?>

    <div class="aside">
        <h3 class="aside-title">Filter by Brand</h3>
        <ul class="list-links">
        <?php for ( $brand=0; $brand < count($brands); $brand ++ ) : ?>
            <li id="<?= $brands[$brand] ?>"> 
                <a href="#"> <?= $brands[$brand] ?> </a> 
            </li>
        <?php endfor ?>
        </ul>
    </div>
    <!-- /aside widget -->

    <!-- aside widget -->
    <div class="aside">
        <h3 class="aside-title">Filter by Gender</h3>
        <ul class="list-links">
            <li class="active"><a href="#">Men</a></li>
            <li><a href="#">Women</a></li>
        </ul>
    </div>
    <!-- /aside widget -->

    <!-- aside widget -->
    <div class="aside">
        <h3 class="aside-title">Top Rated Product</h3>
        <!-- widget product -->
        <div class="product product-widget">
            <div class="product-thumb">
                <img src="Includes/img/thumb-product01.jpg" alt="">
            </div>
            <div class="product-body">
                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
            </div>
        </div>
        <!-- /widget product -->

        <!-- widget product -->
        <div class="product product-widget">
            <div class="product-thumb">
                <img src="Includes/img/thumb-product01.jpg" alt="">
            </div>
            <div class="product-body">
                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                <h3 class="product-price">$32.50</h3>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o empty"></i>
                </div>
            </div>
        </div>
        <!-- /widget product -->
    </div>
    <!-- /aside widget -->
</div>
<!-- /ASIDE -->