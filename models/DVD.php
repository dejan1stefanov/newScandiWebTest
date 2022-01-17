<?php
namespace StoreApp;

require_once __DIR__ . "/Product.php";

use StoreApp\Product;

class DVD extends Product
{
    private $table = 'dvds';
    private $products_id;
    protected $attributes_value;
    private $parameter = "MB";
   

    public function __construct($_arr)
    {
        parent::__construct($_arr);
        $this->attributes_value = $_arr['size'];
    }

    public function setId($_id) 
    {
        $this->id = $_id;
    }
    public function getId() {
        return $this->id;
    }



    //  ========================================= PRINT ==================================
    public static function print_attributes_card()
    {
        return '<div id="DVD" class="d-flex justify-content-between align-items-center mb-4">
                    <label for="size" class="m-0">Size (MB)</label>
                    <div class="attributeParent w-50">
                        <input id="size" name="size" type="number" class="form-control w-100 attribute">
                    </div>
                </div>
                <p><b>Please, provide disk space in MB</b></p>';
    }


}



?>