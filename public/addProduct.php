<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Document</title>
        <meta charset="utf-8" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />

        <!-- Latest compiled and minified Bootstrap 4.4.1 CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="./css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-between border-bottom p-3 mt-1 mb-3">
                    <h2>Product Add</h2>
                    <div>

                        <button form="product_form" class="btn btn-primary">Save</button>
                        <a href="../index.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>

            <div class="row addProductMain">
                <div class="col-12 col-md-5">
                    <?php
                    if(isset($_SESSION['error']))
                    {
                        echo "<div class='alert alert-danger'>{$_SESSION['error']}</div>";
                        unset($_SESSION['error']);
                    }
                    if(isset($_SESSION['success']))
                    {
                        echo "<div class='alert alert-success'>{$_SESSION['success']}</div>";
                        unset($_SESSION['success']);
                    }

                    ?>
                    <form id="product_form" method="POST" action="../execute/productStore.php">
                        <input type="hidden" name="origin" value="" id="origin">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <label for="sku" class="m-0">SKU</label>
                            <div class="skuParent w-75">
                                <input id="sku" name="SKU" type="text" class="form-control w-100">
                            </div>
                        </div>
        
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <label for="name" class="m-0">Name</label>
                            <div class="nameParent w-75">
                                <input id="name" name="name" type="text" class="form-control w-100">
                            </div>
                        </div>
        
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <label for="price" class="m-0">Price ($)</label>
                            <div class="priceParent w-75">
                                <input id="price" name="price" type="number" class="form-control w-100">
                            </div>
                        </div>
        
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <label for="productType" class="m-0">Type Switcher</label>
                            <div class="productTypeParent w-50">
                                <select id="productType" class="form-control w-100" name="productType">
                                    <option hidden disabled selected value> -- select an option -- </option>
                                </select>
                            </div>
                        </div>

                        
                        <div class="attributes mb-5"></div>
                    </form>

                </div>
            </div>

        </div>        
        
        <footer class="container">
            <div class="row">
                <div class="col border-top d-flex justify-content-center p-4 bg-white">ScandiWeb Test assignment</div>
            </div>
        </footer>
        <!-- Latest Font-Awesome CDN -->
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
        <!-- jQuery library -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        
        <!-- Latest Compiled Bootstrap 4.4.1 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script type="module" src="./js/addProduct.js"></script>
    </body>
</html>