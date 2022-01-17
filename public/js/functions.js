// ================================ Fields Required ===========================
export function fields_required()
{
    $('#sku').removeClass('is-invalid');
        $('.invalid-feedback').remove()

        if($('#sku').val().length < 1) 
        {
            $('#sku').addClass('is-invalid')
            $('.skuParent').append(`<div id="validationServer03Feedback" class="invalid-feedback">
                                        Please, submit required data.
                                    </div>`)
        }
        else
        {
            $('#sku').removeClass('is-invalid');
            $('#sku').addClass('is-valid');
        } 

        if($('#name').val().length < 1) 
        {
            $('#name').addClass('is-invalid')
            $('.nameParent').append(`<div id="validationServer03Feedback" class="invalid-feedback">
                                        Please, submit required data.
                                    </div>`)
        } 
        else
        {
            $('#name').removeClass('is-invalid');
            $('#name').addClass('is-valid');
        }

        if($('#price').val().length < 1) 
        {
            $('#price').addClass('is-invalid')
            $('.priceParent').append(`<div id="validationServer03Feedback" class="invalid-feedback">
                                        Please, submit required data.
                                    </div>`)
        }
        else
        {
            $('#price').removeClass('is-invalid');
            $('#price').addClass('is-valid');
        } 
        if($( "#productType option:selected" ).val().length < 1) 
        {
            $('#productType').addClass('is-invalid')
            $('.productTypeParent').append(`<div id="validationServer03Feedback" class="invalid-feedback">
                                                Please, submit required data.
                                            </div>`)
        }
        else
        {
            $('#productType').removeClass('is-invalid');
        }

        if($('.attributes').html() !== "")
        {
            let attributeInput = $('.attributes input').children()
            
            $('.invalid-feedback_attr').remove()
            for(let i=0; i<attributeInput.prevObject.length; i++)
            {
                
                if(attributeInput.prevObject.eq(i).val().length < 1)
                {
                    attributeInput.prevObject.eq(i).addClass('is-invalid')
                    attributeInput.prevObject.eq(i).parent().append(`<div id="validationServer03Feedback" class="invalid-feedback invalid-feedback_attr">
                                                    Please, submit required data.
                                                </div>`)
                }
                else
                {
                    attributeInput.prevObject.removeClass('is-invalid')
                    attributeInput.prevObject.addClass('is-valid')
                }
            }
        }

}

// ====================================== Type Validation =========================
    export function type_validation()
    {
        //name must be string
        if($.isNumeric($('#name').val()) && $('#name').val().length > 0)
        {
            $('#name').addClass('is-invalid')
            $('.nameParent').append(`<div id="validationServer03Feedback" class="invalid-feedback">
            Please, provide the data of indicated type.
                                    </div>`)
        }
        //price must be number
        if(!$.isNumeric($('#price').val()) && $('#price').val().length > 0)
        {
            $('#price').addClass('is-invalid')
            $('.priceParent').append(`<div id="validationServer03Feedback" class="invalid-feedback">
            Please, provide the data of indicated type.
                                    </div>`)
        }
        //attributes must be number
        if($('.attributes').html() !== "")
        {
            //select attributes inputs
            let attributeInput = $('.attributes input').children()
            //loop cross inputs
            for(let i=0; i<attributeInput.prevObject.length; i++)
            {
                //if is not numeric and is not empty
                if(!$.isNumeric(attributeInput.prevObject.eq(i).val()) && attributeInput.prevObject.eq(i).val().length > 0)
                {
                    attributeInput.prevObject.eq(i).addClass('is-invalid')
                    attributeInput.prevObject.eq(i).parent().append(`<div id="validationServer03Feedback" class="invalid-feedback invalid-feedback_attr">
                    Please, provide the data of indicated type.
                                                </div>`)
                }
               
            }
        }
    }

// ============================================== Print Products ===========================
    export function product_card(object) 
    {
        return `<div class="col-12 col-sm-4 col-lg-3">
                    <div class="border justify-content-center align-items-center d-flex flex-column p-3 pb-5 font14 mb-4 innerCard">
                        <div class="w-100">
                            <input class="delete-checkbox" type="checkbox" value="${object.id}">
                        </div>
                        <p class="mb-0 text-center">${object.sku}</p>
                        <p class="mb-0 text-center">${object.name}</p>
                        <p class="mb-0 text-center">${object.price} $</p>
                        <p class="mb-0 text-center">${object.attributes}: ${object.attributes_value} ${object.parameter}</p>
                    </div>
                </div>`
    }