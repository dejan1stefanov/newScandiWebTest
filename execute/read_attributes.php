<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once __DIR__ . "/../models/Book.php";
require_once __DIR__ . "/../models/DVD.php";
require_once __DIR__ . "/../models/Furniture.php";
require_once __DIR__ . "/../models/Factory.php";

use StoreApp\Factory;

new DB();

$arr = $_POST;
 // Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$object = Factory::create_ajax($data->origin);

$card = $object::print_attributes_card();

$object::json_return_attribute_cards($card);


?>