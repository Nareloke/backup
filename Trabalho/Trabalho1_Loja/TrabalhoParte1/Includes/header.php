<?php    
    $retornoEmJSON  = file_get_contents("https://ramos-api.herokuapp.com/produtos?pront=3006301&key=909d4f72da60d472d68815e2c53fe509");
    $retornoDecoded = json_decode( $retornoEmJSON );

    $meusItens = file_get_contents("Includes/data.json");
    $meusItensDecoded = json_decode($meusItens);

    $todosItensDecoded = [];
    foreach($retornoDecoded as $value)
        array_push($todosItensDecoded, $value);
    foreach($meusItensDecoded as $value)
        array_push($todosItensDecoded, $value);

    
    if (isset($_GET["order"])) {
        if ($_GET["order"] == "2") {
            usort($todosItensDecoded, function($a, $b) { 
                return $a->preco > $b->preco ? -1 : 1; 
            }); 
        } else if ($_GET["order"] == "1") {
            usort($todosItensDecoded, function($a, $b) { 
                return $a->preco < $b->preco ? -1 : 1; 
            }); 
        }
    }

    echo "<script> let produtos = " . json_encode($todosItensDecoded) . "</script>"
?>

<!-- HEADER -->
<header>
    <!-- top Header -->
    <div id="top-header">
        <div class="container">
            <div class="pull-left">
                <span>Welcome to E-shop!</span>
            </div>
            <div class="pull-right">
                <ul class="header-top-links">
                    <li><a href="#">Store</a></li>
                    <li><a href="#">Newsletter</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="#">English (ENG)</a></li>
                            <li><a href="#">Russian (Ru)</a></li>
                            <li><a href="#">French (FR)</a></li>
                            <li><a href="#">Spanish (Es)</a></li>
                        </ul>
                    </li>
                    <li class="dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="#">USD ($)</a></li>
                            <li><a href="#">EUR (€)</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /top Header -->

    <!-- header -->
    <div id="header">
        <div class="container">
            <div class="pull-left">
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="index">
                        <img src="Includes/img/logo.png" alt="">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Search -->
                <div class="header-search">
                    <form>
                        <input class="input search-input" type="text" placeholder="Enter your keyword">
                        <select class="input search-categories">
                            <option value="0">All Categories</option>
                            <option value="1">Category 01</option>
                            <option value="1">Category 02</option>
                        </select>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
            </div>
            <div class="pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-user-o"></i>
                            </div>
                            <strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
                        </div>
                        <a href="#" class="text-uppercase">Login</a> / <a href="#" class="text-uppercase">Join</a>
                        <ul class="custom-menu">
                            <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
                            <li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
                            <li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
                            <li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li>
                            <li><a href="#"><i class="fa fa-user-plus"></i> Create An Account</a></li>
                        </ul>
                    </li>
                    <!-- /Account -->

                    <!-- Cart -->
                    <li class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span id="qtdd_carrinho" class="qty"> <?= count($_SESSION["produtos"]);?> </span>
                            </div>
                            <strong class="text-uppercase">My Cart:</strong>
                            <br>
                            <span> 
                                <span id="totalCarrinho">
                                    <?php 
                                        $precoCarrinho = 0; 
                                        foreach ($_SESSION["produtos"] as $value)
                                            $precoCarrinho += (float) $value->preco;
                                        echo number_format((float) $precoCarrinho, 2, ".", "");
                                    ?>
                                </span> 
                            </span>
                        </a>
                        <div class="custom-menu">
                            <div id="shopping-cart">
                                <div class="shopping-cart-list">
                                <?php foreach($_SESSION["produtos"] as $value): ?> 
                                    <div id="produtoID_<?= $value->id ?>" class="product product-widget">
                                        <div class="product-thumb">
                                            <img src="<?= $value->imagem ?>" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price"> <?= $value->preco?> <span class="qty">x1</span></h3>
                                            <h2 class="product-name"><a href="#"><?= $value->nome ?></a></h2>
                                        </div>
                                        <button id="<?= $value->id ?>" class="remove-from-cart cancel-btn"><i class="fa fa-trash"></i></button>
                                    </div> 
                                <?php endforeach; ?>

                                </div>
                                <div class="shopping-cart-btns">
                                    <button class="main-btn">View Cart</button>
                                    <a href="Checkout"><button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- /Cart -->

                    <!-- Mobile nav toggle-->
                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile nav toggle -->
                </ul>
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>
<!-- /HEADER -->
