$(document).ready(function() {
    var max_fields      = 50;
    var wrapper         = $(".container1");
    var wrapper2         = $(".container2");
    var add_product      = $(".add_form_product");
    var add_treatment      = $(".add_form_treatment");

    var x = 1;
    $(add_product).click(function(e){
        e.preventDefault();
        if(x < max_fields){
            x++;
            $(wrapper).append('<input list="products" type="text" name="product[]" placeholder="Prodotto"><input type="text" name="quantity[]" placeholder="quantità"><a href="#" class="delete">Delete</a></div>'); //add input box
        }
    else
    {
    alert('You Reached the limits')
    }
    });

    $(wrapper).on("click",".delete", function(e){
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })

    //Treatment
    var y = 1;
    $(add_treatment).click(function(e){
        e.preventDefault();
        if(y < max_fields){
            y++;
            $(wrapper2).append('<div><input list="treatments" type="text" name="treatment[]" placeholder="Trattamento"><input type="text" name="quantity[]" placeholder="quantità"><a href="#" class="delete">Delete</a></div>'); //add input box
        }
    else
    {
    alert('You Reached the limits')
    }
    });

    $(wrapper2).on("click",".delete", function(e){
        e.preventDefault(); $(this).parent('div').remove(); y--;
    })
});
