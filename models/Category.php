<?php
namespace StoreApp;

require_once __DIR__ . "/../database/DB.php";

class Category
{
    private $table = 'categories';

    private $id;
    private $title;
    private $attribute_id;

    public function read() {
        $conn = \DB::connect();

        // Create query
        $sql = "SELECT *
        FROM " . $this->table . " 
        WHERE 1";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // Execute query
        $stmt->execute();

        return $stmt;
    }
}