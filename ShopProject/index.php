<?php
session_start();

function debug($param){
  echo "<pre>";
  print_r($param);
  echo "</pre>";
}

  $_SESSION["root"] = "C:/xampp/htdocs/ShopProject/";
  include $_SESSION["root"].'routes.php';
?>