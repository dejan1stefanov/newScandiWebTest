import {fields_required, type_validation} from "./functions.js"
$(function() 
{
// ========================================= Fetch Type Switcher Categories ==================================    
    $.ajax({
        url: `../execute/category/read.php`,
        method: "GET",
        "Content-type": "application/json",
        success: function (data) 
        {
            data.forEach(function(element) 
            {
                $('#productType').append(`<option value="${element.id}">${element.title}</option>`)
            })
        },
        error: function (err) 
        {
            console.log(err);
        },
    });

// =========================================== Type Switvher event listener ==========================
$(document).on('change', '#productType', function(e) 
{
    $('#productType').removeClass('is-invalid');
     //prepare info for the database
     let selected = $( "#productType option:selected" ).text()
     let myJSON = {
        origin: selected
    };
    //make JSON format the data we have to send
    let jsonFormat = JSON.stringify(myJSON);

    $.ajax({
        url: `../execute/read_attributes.php`,
        method: "POST",
        data: jsonFormat,
        "Content-type": "application/json",
            success: function (data) 
            {
                data.forEach(element => {
                    $('.attributes').html(element.card)
                    $('#origin').val(selected)
                });
             },
            error: function (err) 
            {
                console.log(err);
            }
    })

    
})
// ============================================== FORM VALIDATION =========================
    $('#product_form').on('submit', function(e) 
    {
        e.preventDefault()
        fields_required()
        type_validation()

        if(!$('#sku').hasClass('is-invalid') && !$('#name').hasClass('is-invalid') && !$('#price').hasClass('is-invalid') && !$('#productType').hasClass('is-invalid') && !$('#sku').hasClass('is-invalid') && !$('.attribute').hasClass('is-invalid'))
        {
            $(this).off('submit').submit();
        }
    })

})