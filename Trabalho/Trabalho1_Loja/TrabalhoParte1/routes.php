<?php
$path   = explode('/', $_SERVER['REQUEST_URI']);
$action = $path[sizeOf($path) - 1];
$action = explode('?', $action);
$action = $action[0];

//echo ini_get('session.save_path')

if ($action == "" || $action == "index" || $action == "index.php") {
    require_once $_SESSION["root"].'PHP/View/viewHome.php';

} else if ( $action == "Checkout" ) {
    require_once $_SESSION["root"].'PHP/View/viewCheckout.php';

} else if ( $action == "ProductPage" ) {
    require_once $_SESSION["root"].'PHP/View/viewProductPage.php';

} else if ( $action == "Products" ) {

    require_once $_SESSION["root"].'PHP/View/viewProducts.php';

} else if ( $action == "mesmacategoria" ) {
    require_once $_SESSION["root"].'PHP/View/viewMesmaCategoria.php';

} else if ( $action == "adicionarCarrinho" ) {
    //debug($_POST);
    $postDecoded = json_decode($_POST["carrinho"]);
    $_SESSION["produtos"][]     = $postDecoded;

} else if ( $action == "removerCarrinho" ) {
    $postDecoded = json_decode($_POST["carrinho"]);

    foreach ( $_SESSION["produtos"] as $key => $value ) {
        if ($_SESSION["produtos"][$key]->id == $postDecoded->id) {
            unset($_SESSION["produtos"][$key]);
            break 1;
        } 
    }

    $_SESSION["carrinho_valorCompra"] = (int) $_SESSION["carrinho_valorCompra"] - (int) $postDecoded->preco;

} else {
    echo "Ainda não consegui criar essa página =( ";
}
?>