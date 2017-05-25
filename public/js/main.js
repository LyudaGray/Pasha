/**
 * Created by User on 15.05.2017.
 */



function addToCart(itemId) {
    console.log("js - addToCart("+itemId+")");
    $.ajax({
        type : 'GET',
        async:false,
        url: "/cart/addtocart/"+itemId+'/',
        dataType: 'json',

        success: function (data) {

            if (data['success']){
                // alert(data['product'+itemId]);
                $('#cart .count').html(data['count_cart']);
                $('#addCart_'+itemId).parent().toggleClass('hide');
                $('#removeCart_'+itemId).parent().toggleClass('hide');
            }else {
                alert("Все плохо");
            }
        }
    });
}

function removeFromCart(itemId) {
    console.log("js - removeFromCart("+itemId+")");
    $.ajax({
        type : 'GET',
        async:false,
        url: "/cart/removefromcart/"+itemId+'/',
        dataType: 'json',

        success: function (data) {

            if (data['success']){

                $('#cart .count').html(data["count_cart"]);
                $('#addCart_'+itemId).parent().toggleClass('hide');
                $('#removeCart_'+itemId).parent().toggleClass('hide');
                // $('#orderForm').addClass('hide');
                $('#row_'+itemId).remove();
                $('#submit_order').addClass('hide');
                calculateSumm();
            }
        }
    });
}

function showOrderForm() {
    calculateSumm();
    $('#submit_order').removeClass('hide');
    $('#press_order').addClass('hide');

}

function calculateSumm() {
    var summa = 0;

    var data = getProductsId("#cart_table");

    for (var i in data) {

        summa+= $('#ProductId_'+data[i]).val() * $('#priceOfProductId_'+data[i]).val();
    }

    $('#summa_zakaza').text(summa+',00грн');

    return summa;
}

function getProductsId(order_tab){

    var productsId = [];

    $('input[type="hidden"]', order_tab).each(function () {

        productsId.push(this.value);
    });

    return productsId;
}

$(function() {
    $('#refresh').on('click',function(e){
        e.preventDefault();
        var captcha = $('img.captcha-img');
        var config = captcha.data('refresh-config');
        $.ajax({
            method: 'GET',
            url: '/get_captcha/' + config,
        }).done(function (response) {
            captcha.prop('src', response);
        });

    });

});
