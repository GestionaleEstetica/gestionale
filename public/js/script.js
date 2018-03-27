$(document).ready(function() {
    var wrapper         = $(".containerP");
    var wrapper2         = $(".containerT");
    var addProduct      = $(".addProductForm");
    var addTreatment      = $(".addTreatmentForm");

    $(addProduct).click(function(e){
        e.preventDefault();
          $(wrapper).append('<input list="products" type="text" name="product[]" placeholder="Prodotto"><input type="text" name="quantity[]" placeholder="quantità"><a href="#" class="delete">Delete</a></div>'); //add input box
    });
    $(wrapper).on("click",".delete", function(e){
        e.preventDefault(); $(this).parent('div').remove();
    })

    //Treatment
    $(addTreatment).click(function(e){
        e.preventDefault();
          $(wrapper2).append('<div><input list="treatments" type="text" name="treatment[]" placeholder="Trattamento"><input type="text" name="quantity[]" placeholder="quantità"><a href="#" class="delete">Delete</a></div>'); //add input box
        });
    $(wrapper2).on("click",".delete", function(e){
        e.preventDefault(); $(this).parent('div').remove();
    })
});
