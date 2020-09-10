<?php

  $path = explode('/', $_SERVER['REQUEST_URI']);
  $action = $path[sizeOf($path) - 1];

  $action = explode('?', $action);
  $action = $action[0];


  if ( $action == '' || $action == 'index' || $action == 'index.php' ) {
    require_once $_SESSION["root"].'php/View/viewPaginaPrincipal.php';
  } else if ( $action=='TiposCarta' )
    require_once $_SESSION["root"].'php\View\viewTiposCarta.php';
  else {
    echo "erro 404";
  }

?>