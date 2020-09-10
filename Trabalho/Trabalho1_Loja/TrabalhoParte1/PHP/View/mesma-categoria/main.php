<?php    
    $getCategoryItens  = file_get_contents("https://ramos-api.herokuapp.com/produtos?tipo=".$_GET["categoria"]."&pront=3006301&key=909d4f72da60d472d68815e2c53fe509");
    $getCategoryItensDecoded = json_decode($getCategoryItens);
    //debug($getCategoryDecoded);
?>

<!-- MAIN -->
<div id="main" class="col-md-9">
    <!-- store top filter -->
    <div class="store-filter clearfix">
        <div class="pull-left">
            <div class="row-filter">
                <a href="#"><i class="fa fa-th-large"></i></a>
                <a href="#" class="active"><i class="fa fa-bars"></i></a>
            </div>
            <div class="sort-filter">
                <span class="text-uppercase">Sort By:</span>
                <select class="input">
                        <option value="0">Position</option>
                        <option value="0">Price</option>
                        <option value="0">Rating</option>
                    </select>
                <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
            </div>
        </div>
        <div class="pull-right">
            <div class="page-filter">
                <span class="text-uppercase">Show:</span>
                <select class="selectShow input">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
            </div>
            <ul class="store-pages">
                <li><span class="text-uppercase">Page:</span></li>

                <?php $indice = 0; ?>
                <?php for($paginacao=0; $paginacao < count($getCategoryItensDecoded) / 9; $paginacao++, $indice += 9 ) : ?>
                    <li onclick="paginacao(<?= $indice ?>, <?= $indice+8 ?>)"class="active"><a href="#"><?= $paginacao + 1 ?></a></li>
                <?php endfor; ?>

                <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- /store top filter -->

    <!-- STORE -->
    <div id="store">
        <!-- row -->
        <div class="row">
        <?php $count = 1; ?>
        <?php foreach ( $getCategoryItensDecoded as $value ) : ?> 
            <!-- Product Single -->
            <div class="produto col-md-4 col-sm-6 col-xs-6" id="product_<?= $value->id ?>" style="<?= $count > 9 ? 'display: none' : '' ?>">
                <div class="product product-single">
                    <div class="product-thumb">
                        <div class="product-label">
                            <span>New</span>
                            <span class="sale">-20%</span>
                        </div>
                        <button id="<?= $value->id ?>" class="main-btn quick-view"><i class="fa fa-search-plus"></i>Quick view</button>
                        <img src="<?= $value->imagem ?>" alt="">
                    </div>
                    <div class="product-body">
                        <h3 class="product-price">R$ <?= $value->preco ?> <del class="product-old-price">R$ <?= $value->preco * 1.2 ?></del></h3>
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
                            <button id="<?= $value->id ?>" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Product Single -->

            <?php  
                if ($count % 3 == 0)
                    echo "<div class='clearfix visible-md visible-lg'></div>";
                if ($count == 12 ) {
                    echo "<div class='clearfix visible-md visible-lg visible-sm visible-xs'></div>";
                }
                $count++;
            ?>

            <?php endforeach ?>
            <!-- <div class="clearfix visible-md visible-lg"></div> -->

        </div>
        <!-- /row -->
    </div>
    <!-- /STORE -->

    <!-- store bottom filter -->
    <div class="store-filter clearfix">
        <div class="pull-left">
            <div class="row-filter">
                <a href="#"><i class="fa fa-th-large"></i></a>
                <a href="#" class="active"><i class="fa fa-bars"></i></a>
            </div>
            <div class="sort-filter">
                <span class="text-uppercase">Sort By:</span>
                <select class="input">
                        <option value="0">Position</option>
                        <option value="0">Price</option>
                        <option value="0">Rating</option>
                    </select>
                <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
            </div>
        </div>
        <div class="pull-right">
            <div class="page-filter">
                <span class="text-uppercase">Show:</span>
                <select class="selectShow input">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
            </div>
            <ul class="store-pages">
                <li><span class="text-uppercase">Page:</span></li>

                <?php $indice = 0; ?>
                <?php for($paginacao=0; $paginacao < count($getCategoryItensDecoded) / 9; $paginacao++, $indice += 9 ) : ?>
                    <li onclick="paginacao(<?= $indice ?>, <?= $indice+8 ?>)"class="active"><a href="#"><?= $paginacao + 1 ?></a></li>
                <?php endfor; ?>

                <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
            </ul>
        </div>
    </div>
    <!-- /store bottom filter -->
</div>
<!-- /MAIN -->