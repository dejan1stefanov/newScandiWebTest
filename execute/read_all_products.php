<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require_once __DIR__ . "/../models/ProductCategory.php";

  use StoreApp\ProductCategory;

  new DB();

  $product_category = new ProductCategory();

  $stmt = $product_category->read();

  $product_category->json_return_all_products($stmt);

?>