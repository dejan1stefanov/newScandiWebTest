<?php
// headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
require_once __DIR__ . "/../database/DB.php";
require_once __DIR__ . "/../models/ProductCategory.php";

use StoreApp\ProductCategory;
// Instantiate DB & connect
new DB();
// Instantiate product category object
$product_category = new ProductCategory();
// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
//Make query if there are more than one item selected
$where_query = $product_category->multiple_delete_items($data);
// Set ID or string of more IDs to delete
$product_category->setProductsId($where_query);
//Delete products
$product_category->delete();

?>
