/**
 * Created by User on 15.05.2017.
 */
function addCartCountToWindowSession() {
	if (typeof(Storage) !== "undefined") {
		var cartItems = $('#cart .count').text();
		window.sessionStorage.setItem('cartCount', cartItems);
	} else {
		console.log("Sorry! No Web Storage support..");
	}
}

function addToCart(itemId) {
    console.log("js - addToCart("+itemId+")");
    $.ajax({
        type : 'GET',
        async:false,
        url: "/cart/addtocart/"+itemId+'/',
        dataType: 'json',

        success: function (data) {

            if (data['success']){
                // alert(data['count_cart']);
                $('#cart .count').html(data['count_cart']);
                $('#addCart_'+itemId).parent().toggleClass('hide');
                $('#removeCart_'+itemId).parent().toggleClass('hide');
							  addCartCountToWindowSession();
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

            if (data['success']) {

                $('#cart .count').html(data["count_cart"]);
                $('#addCart_'+itemId).parent().toggleClass('hide');
                $('#removeCart_'+itemId).parent().toggleClass('hide');
                $('#row_'+itemId).remove();
                calculateSumm();
							  addCartCountToWindowSession();
							  if(!data["count_cart"]) {
									$('#press_order').addClass('disabled');
									if($('#submit_order').is(':visible')) {
										$('#submit_order').addClass('hide');
									}
								}
            }
        }
    });
}

function showOrderForm() {
    calculateSumm();
    $('#submit_order').removeClass('hide');
    $('#press_order').addClass('disabled');

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

    if($('.slider1').length) {
			$('.slider1').bxSlider({
				mode: 'fade',
				captions: false,
				auto:true,
				pager:false,
		
			});
    }
	  if($('.slider2').length) {
        $('.slider2').bxSlider({
          pager:false,
          captions: true,
          maxSlides: 3,
          minSlides: 1,
          slideWidth: 230,
          slideMargin: 10
        });
    }
    if($('.slider3').length) {
        $('.slider3').bxSlider({
          mode: 'fade',
          captions: false,
          auto:true,
          pager:false,
          controls:false
        });
    }
	
	$(window).on('load', function() {
		if (sessionStorage.getItem('cartCount')) {
			var cartItems = window.sessionStorage.getItem('cartCount');
			$('#cart .count').text(cartItems);
			if(cartItems === "0") {
				$('#cart .count').text("");
			}
		}
	});
});
