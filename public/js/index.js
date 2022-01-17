import {product_card} from "./functions.js"
$(function() {
// =================================== FETCH PRODUCTS ===================================
    $.ajax({
        url: `./execute/read_all_products.php`,
        method: "GET",
      //   data: jsonFormat,
        "Content-type": "application/json",
        success: function (data) 
        {
            data.forEach(object => {
                $('.allProducts').append(product_card(object))
            });
         
        },
        error: function (err) 
        {
          console.log(err);
        }
    });


    //   ============================================= MASS DELETE ======================================
    $('.massDeleteBtn').on('click', function(e) 
    {
        let checkedProducts = $('.delete-checkbox:checked')

        let products_arr = []
        for(let i=0; i<checkedProducts.length; i++) 
        {
            products_arr.push(parseInt(checkedProducts.eq(i).val()))
        }

        let myJSON = {
            id: products_arr
        };
          let jsonFormat = JSON.stringify(myJSON);
        
        $.ajax({
              url: "./execute/delete_products.php",                  
                     type: "DELETE",
                     dataType: 'script',
                     data: jsonFormat,
                    success:function(data){
                        $('.allProducts').empty()
                        $.ajax({
                            url: `./execute/read_all_products.php`,
                            method: "GET",
                            "Content-type": "application/json",
                            success: function (data) 
                            {
                                data.forEach(object => {
                                    $('.allProducts').append(product_card(object))
                                });
                             
                            },
                            error: function (err) 
                            {
                              console.log(err);
                            }
                          });

                    },
                    error: function(err) 
                    {
                        console.log(err)
                    }
        })


    })
})