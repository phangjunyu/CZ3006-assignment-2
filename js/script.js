var apple_price = 0.69;
var banana_price = 0.39;
var orange_price = 0.59;

$(document).ready(function() {
    $('#submit').prop("disabled", true);
    blurTotalCost();
    $('#apple-qty').change(function(){
        updatePrice();
    });
    $('#banana-qty').change(function(){
        updatePrice();
    });
    $('#orange-qty').change(function(){
        updatePrice()
    });
})

function blurTotalCost(){
    $('#total-cost').focus(function() {
        this.blur();
      });
}

// by right, form data should be validated on server side instead of client side
function validateOrder(){
    if ($('#submit').prop("disabled"))
        return false;
    var name = $('#customer');
    if (name.val() == "" || name.val() == NaN){
        alert("Please fill in your name.");
        name.addClass("text-box-highlight");
        name.focus(function(){
            name.removeClass("text-box-highlight");
        })
        return false;
    }
    if ( !$('#visa').is(":checked") && !$('#mastercard').is(":checked") && !$('#discover').is(":checked")){
        alert("Please select a payment method")
        return false;
    }
    return true;
}

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
        alert("Please only enter numbers from 0 - 9");
        evt.preventDefault();
    }
}   
function updatePrice(){
    var apples = $('#apple-qty').val();
    var bananas = $('#banana-qty').val();
    var oranges = $('#orange-qty').val();
    
    if (apples == '' || apples == NaN)
        apples = 0;
    if (bananas == '' || bananas == NaN)
        bananas = 0;
    if (oranges == '' || oranges == NaN)
        oranges = 0;

    $('#apple-final-qty').val(apples);
    $('#banana-final-qty').val(bananas);
    $('#orange-final-qty').val(oranges);

    var apples_price = +((apples*apple_price).toFixed(2));
    var bananas_price = +((bananas*banana_price).toFixed(2));
    var oranges_price = +((oranges*orange_price).toFixed(2));

    $('#apple-final-price').val(apples_price);
    $('#banana-final-price').val(bananas_price);
    $('#orange-final-price').val(oranges_price);

    var total_cost = +((apples_price + bananas_price + oranges_price).toFixed(2))
    $('#total-cost').val(total_cost);
    if (total_cost == 0)
        $('#submit').prop('disabled', true);
    else
        $('#submit').prop('disabled', false);
}

