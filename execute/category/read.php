<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require_once __DIR__ . "/../../database/DB.php";
  require_once __DIR__ . "/../../models/Category.php";

  use StoreApp\Category;

  // Instantiate DB & connect
  new DB();

  // Instantiate blog images object
  $category = new Category();

  // Blog post query
  $stmt = $category->read();
 
  // Check if any images
  if($stmt->rowCount() > 0) {
    // Images array
    $categories_arr = [];
    // $images_arr['data'] = array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      // last array type of returning data
      $category_item = [
          'id' => $row['id'],
          'title' => $row['title'],
          'attributes_id' => $row['attributes_id']
      ];

      // Push to "data"
      array_push($categories_arr, $category_item);
    }

    // Turn to JSON & output
    echo json_encode($categories_arr);

  } else {
    // No Images
    echo json_encode(
      array('message' => 'No Categories Found')
    );
  }
?>