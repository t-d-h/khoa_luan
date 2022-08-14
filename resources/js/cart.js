import da from "../../public/statics/moment/src/locale/da";

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function showCart(data) {
        var row = '';
        let sort = [];

        $.each(data, function (index, value) {
           sort.push(value);
        });

        sort.sort((a, b) => {
            return a.time - b.time;
        });

        $.each(sort, function (index, val) {
            row += '<div class="row">'+
                '<input type="hidden" name="product_id" value="'+val.id+'">'+
                '<div class="col-md-5">'+
                '<img src="'+val.img+'">'+
                '</div>'+
                '<div class="col-md-7">'+
                '<strong>'+val.name+'</strong>'+
                '<div class="product-giohang">'+
                '<div>'+
                '<p>Giá: </p>'+
                '<p>'+val.price+'</p>'+
                '</div>'+
                '<div>'+
                '<p>Số lượng: </p>'+
                '<p>'+val.amount+'</p>'+
                '</div>'+
                '</div>'+
                '</div>'+
                '<hr>'+
                '</div>'
        });

        return row;
    }

    $.ajax({
        type: "get",
        url: "store/cart-session",
        success: function(e) {
            $('#scroll-giohang').append(showCart(e));
        }
    });

    $('.add-cart').click(function () {
        var product_id = $(this).parent().find('input[name=product_id]').val();
        var img = $(this).parent().find('.img-thumbnail').attr('src');
        var name = $(this).parent().find('.name').text();
        var price = $(this).parent().find('.price').text();
        var amount = '1';

        $.ajax({
            type: "get",
            url: "store/add-cart",
            data: {
                "id": product_id,
                "name": name,
                "amount": amount,
                "price": price,
                "img": img
            },
            success: function(e) {
                $('#scroll-giohang').html(showCart(e));

                if (e) {
                    $(".add-cart").click(function(event) {
                        $("#add-cart-effect").fadeIn('slow').fadeOut('slow');
                    });
                }
            }
        });




    });
});
