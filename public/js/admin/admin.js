/**
 * Created by User on 24.05.2017.
 */


function changeStatus(prod_id){
    $.ajax({
        type : 'POST',
        async:false,
        url: "/admin/change_products_status/"+prod_id+"/",
        dataType: 'json',

        success: function (data) {
            if (data['success']){
                alert("Статус продукта "+data['product_name']+" изменен!");
            }else {
                alert("Что-то не то!");
            }
        }
    });
}

function changePrice(prod_id){
    var newPrice = $('#newPrice_'+prod_id).val();
    $.ajax({
        type : 'POST',
        async:false,
        url: "/admin/change_product_price/"+prod_id+"/"+newPrice+"/",
        dataType: 'json',

        success: function (data) {
            if (data['success']){
                alert("Стоимость продукта "+data['product_name']+" изменен!");
            }else {
                alert("Что-то не то!");
            }
        }
    });
}

function changeData(prodId, prodPrice, prodName, status){
    alert(prodId+" - "+prodPrice+" - "+prodName+" - "+status);

}

$(function () {
    //modal window
    $.modal({
        overlayClass: 'modal-bg',
        lockClass:'modal-bg_lock',
        onOpen: function(el, options){
            // for big content modal window
            var modalHeight = el.children().height();
            if(el.height() < modalHeight + 100 ) {
                el.addClass('modal-bg_content');
            } else {
                el.removeClass('modal-bg_content');
            }


        }
    });
    var $modalLink   = $('[data-modal]'),
        $modalClose =  $('.modal__container .js-modal-close');
    $modalLink.click(function(e) {
        e.preventDefault();
        var modal = $(this).data('modal'),
            dataTest = $(this).data('test');
        $(modal).find('input#test').val(dataTest);
        $(modal).modal().open();
    });
    $modalClose.click(function (e) {
        e.preventDefault();
        $.modal().close();
    });
});


