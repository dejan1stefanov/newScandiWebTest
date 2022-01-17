<?php
namespace StoreApp;

require_once __DIR__ . "/../database/DB.php";

class ProductCategory
{
    private $table = "productsCategory";
    private $id;
    private $products_id;
    private $categories_id;
    private $attributes_value;

    public function setProductsId($_id) 
    {
        $this->products_id = $_id;
    }
    public function getProductsId() 
    {
        return $this->products_id;
    }

    public function read() 
    {
        $conn = \DB::connect();

        // Create query
        $sql = "SELECT products.*, categories.title AS category, products_categories.attributes_value, attributes.name AS attributes, attributes.parameter
        FROM products LEFT JOIN products_categories ON products.id = products_categories.products_id
        LEFT JOIN categories ON products_categories.categories_id = categories.id
        LEFT JOIN attributes ON categories.attributes_id = attributes.id
        ORDER BY products.id";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

   

    public function delete()
    {
        $conn = \DB::connect();

        // Create query
        $sql = "DELETE FROM products WHERE id IN ($this->products_id)";

        $stmt = $conn->exec($sql);

        if ($stmt) 
        {
            echo json_encode(
                array('message' => 'Product Deleted')
            );
        } 
        else 
        {
            echo json_encode(
                array('message' => 'An error occured. Product/s was/were not Deleted. Please try again.')
            );
        }
    }

    public function json_return_all_products($stmt)
    {
        if($stmt->rowCount() > 0) 
        {
            // products_categories array
            $products_categories_arr = [];

            while($row = $stmt->fetch()) 
            {
            extract($row);
            // last array type of returning data
            $product_category_item = [
                'id' => $row['id'],
                'sku' => $row['sku'],
                'name' => ucfirst($row['name']),
                'price' => number_format($row['price'],2),
                'category' => ucfirst($row['category']),
                'attributes' => ucfirst($row['attributes']),
                'attributes_value' => $row['attributes_value'],
                'parameter' => $row['parameter']
            ];

            // Push to "data"
            array_push($products_categories_arr, $product_category_item);
            }

            // Turn to JSON & output
            echo json_encode($products_categories_arr);

        } 
        else 
        {
            // No Products
            echo json_encode(
            array('message' => 'No Products Found')
            );
        }
    }

    public function multiple_delete_items($data)
    {
        $where_query = "";
        $products_id = $data->id;

            if(count($products_id) < 2)
            {
                $where_query = $data->id[0];
            }
            else if(count($products_id) > 1)
            {
                $num = count($products_id);
            
                for($i=0; $i < $num; $i++)
                {
                    if($i == 0)
                    {
                        $where_query = $products_id[$i];
                    }
                    else
                    {
                        $where_query .= ",{$products_id[$i]}";
                    }
                }

            }
            return $where_query;
    }
}