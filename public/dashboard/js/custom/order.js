$(document).ready(function () {
    $('.add-product-btn').on('click',function (e) {
        e.preventDefault();
        let name=$(this).data('name');
        let id=$(this).data('id');
        let price=$(this).data('price');
        $(this).removeClass('btn-success').addClass('btn-default disabled');
        var html =
            `<tr>
                <td>${name}</td>
                <td><input type="number" name="quanities[]" data-price="${price}" class="form-control input-sm product-quantity" min="1" value="1"></td>
                <td class="product-price">${price}</td>
                <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><span class="fa fa-trash"></span></button></td>
            </tr>`;

        $('.order-list').append(html);

        calculateTotal();
    });

    $('body').on('click', '.disabled', function(e) {

        e.preventDefault();

    });//end of disabled
    $('body').on('click', '.remove-product-btn', function(e) {

        e.preventDefault();
        var id = $(this).data('id');

        $(this).closest('tr').remove();
        $('#product-' + id).removeClass('btn-default disabled').addClass('btn-success');

        //to calculate total price
        calculateTotal();

    });//end of remove product btn

    $('body').on('keyup change', '.product-quantity', function() {

        var quantity = parseInt($(this).val()); //2
        var unitPrice = $(this).data('price'); //150
        $(this).closest('tr').find('.product-price').html(quantity * unitPrice);
        calculateTotal();

    });//end of product quantity change

});
function calculateTotal() {

    var price = 0;

    $('.order-list .product-price').each(function(index) {

        price += parseInt($(this).html());

    });//end of product price

    $('.total-price').html(price);

}//end of calculate total
