<?php
namespace StoreApp;

require_once __DIR__ . "/Product.php";

use StoreApp\Product;

class Book extends Product
{
    private $table = 'books';
    private $products_id;
    protected $attributes_value;
    private $parameter = "KG";

    public function __construct($_arr)
    {
        parent::__construct($_arr);
        $this->attributes_value = $_arr['weight'];
    }

    public function setId($_id) 
    {
        $this->id = $_id;
    }
    public function getId() {
        return $this->id;
    }


    // ========================================== PRINT ===============================
    public static function print_attributes_card()
    {
        return '<div id="Book" class="d-flex justify-content-between align-items-center mb-4">
                    <label for="weight" class="m-0">Weight (KG)</label>
                    <div class="attributeParent w-50">
                        <input id="weight" name="weight" type="number" class="form-control w-100 attribute">
                    </div>
                </div>
                <p><b>Please, provide book weight in KG</b></p>';
    }

    


}



?>