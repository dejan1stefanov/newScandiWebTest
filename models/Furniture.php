<?php
namespace StoreApp;

require_once __DIR__ . "/Product.php";

use StoreApp\Product;

class Furniture extends Product
{
    private $table = 'furniture';
    private $products_id;
    protected $attributes_value;

    public function __construct($_arr)
    {
        parent::__construct($_arr);
        $this->attributes_value = "{$_arr['height']}X{$_arr['width']}X{$_arr['length']}";
        $this->width = $_arr['width'];
        $this->length = $_arr['length'];
    }

    public function setId($_id) 
    {
        $this->id = $_id;
    }
    public function getId() {
        return $this->id;
    }

    

    //  ================================================= PRINT ===================================
    public static function print_attributes_card()
    {
        return "<div id='Furniture' class='d-flex justify-content-between align-items-center mb-4'>
                    <label for='height' class='m-0'>Height (CM)</label>
                    <div class='attributeParent w-50'>
                        <input id='height' name='height' type='number' class='form-control w-100 attribute'>
                    </div>
                </div>
                <div class='d-flex justify-content-between align-items-center mb-4'>
                    <label for='width' class='m-0'>Width (CM)</label>
                    <div class='attributeParent w-50'>
                        <input id='width' name='width' type='number' class='form-control w-100 attribute'>
                    </div>
                </div>
                <div class='d-flex justify-content-between align-items-center mb-4'>
                    <label for='length' class='m-0'>Length (CM)</label>
                    <div class='attributeParent w-50'>
                        <input id='length' name='length' type='number' class='form-control w-100 attribute'>
                    </div>
                </div>
                <p><b>Please, provide dimensions in CM</b></p>";
    }


}



?>