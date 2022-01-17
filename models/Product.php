<?php
namespace StoreApp;

require_once __DIR__ . "/../database/DB.php";
require_once __DIR__ . "/interfaces/Printable.php";
require_once __DIR__ . "/interfaces/Readable.php";
require_once __DIR__ . "/interfaces/Insertable.php";
require_once __DIR__ . "/interfaces/Deletable.php";

use StoreApp\Printable;
use StoreApp\Readable;
use StoreApp\Insertable;
use StoreApp\Deletable;

class Product implements Insertable, Readable, Deletable, Printable
{
    private $table = "products";

    protected $id;
    protected $name;
    protected $SKU;
    protected $price;
    protected $attributes_value;

    public function __construct($_arr)
    {
        $this->name = $_arr['name'];
        $this->SKU = uniqid("{$_arr['SKU']}-");
        $this->price = $_arr['price'];
        $this->categories_id = $_arr['productType'];
    }

    public function setId($_id) 
    {
        $this->id = $_id;
    }

// ========================================================== INSERT ======================= 
    public function insert_product() 
    {
        $conn = \DB::connect();

        print_r($conn);
        // Execute query
        $sql = "INSERT INTO products(name, SKU, price) VALUES(:name, :SKU, :price)";

        // Prepare statement
        $stmt = $conn->prepare($sql);
        $data = ['name' => $this->name, 'SKU' => $this->SKU, 'price' => $this->price];

        // return $stmt;
        return $stmt->execute($data);

    }

    public function insert_products_categories() 
    {
        $conn = \DB::connect();

        // Execute query
        $sql = "INSERT INTO products_categories(products_id, categories_id, attributes_value) VALUES(:products_id, :categories_id, :attributes_value)";

        // Prepare statement
        $stmt = $conn->prepare($sql);
        $data = ['products_id' => $this->id, 'categories_id' => $this->categories_id, 'attributes_value' => $this->attributes_value];

        // return $stmt;
        return $stmt->execute($data);

    }

    
    

    // ======================================== DELETE ========================================
    public function delete_last_inserted_product() 
    {
        $conn = \DB::connect();

        $sql = "DELETE 
        FROM products
        ORDER BY id DESC
        LIMIT 1;";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // Execute query
        $stmt->execute();

        $_SESSION['error'] = "An error occured. Please try again. Thank you!";
        header("Location: ../public/addProduct.php");
        die();
        

    }

   // ======================================== READ ========================================
   public function read()
   {
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

   public function read_last_inserted_id() 
   {
       $conn = \DB::connect();

       $sql = "SELECT id
       FROM products 
       WHERE 1
       ORDER BY id DESC
       LIMIT 1;";

       // Prepare statement
       $stmt = $conn->prepare($sql);

       // Execute query
       $stmt->execute();

       return $stmt;

   }
// =============================================== Return Attributes JSON Cards ==========================
public static function json_return_attribute_cards($card)
{
    if($card !== "") 
    {

        $cards_arr = [];
    
        $card_item = [
            'card' => $card
        ];

    // Push to "data"
    array_push($cards_arr, $card_item);

    // Turn to JSON & output
    echo json_encode($cards_arr);

    } 
    else 
    {
    // No Cards
    echo json_encode(
        array('message' => 'No Attributes Found')
    );
    }
}

public static function print_attributes_card()
{

}
    

    


}


?>