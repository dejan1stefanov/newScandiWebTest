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
        <link href="./public/css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-between border-bottom p-3 mt-1 mb-3">
                    <h2>Product List</h2>
                    <div>

                        <a href="./public/addProduct.php" class="btn btn-primary">ADD</a>
                        <button class="btn btn-danger massDeleteBtn">MASS DELETE</button>
                    </div>
                </div>
            </div>

            <div class="row allProducts"></div>

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
        <script type="module" src="./public/js/index.js"></script>
    </body>
</html>