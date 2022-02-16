// some scripts

// jquery ready start
$(document).ready(function() {
    // jQuery code

    /* ///////////////////////////////////////

    THESE FOLLOWING SCRIPTS ONLY FOR BASIC USAGE,
    For sliders, interactions and other

    */ ///////////////////////////////////////

    //////////////////////// Prevent closing from click inside dropdown
    $(document).on("click", ".dropdown-menu", function(e) {
        e.stopPropagation();
    });

    $(".js-check :radio").change(function() {
        var check_attr_name = $(this).attr("name");
        if ($(this).is(":checked")) {
            $("input[name=" + check_attr_name + "]")
                .closest(".js-check")
                .removeClass("active");
            $(this).closest(".js-check").addClass("active");
            // item.find('.radio').find('span').text('Add');
        } else {
            item.removeClass("active");
            // item.find('.radio').find('span').text('Unselect');
        }
    });

    $(".js-check :checkbox").change(function() {
        var check_attr_name = $(this).attr("name");
        if ($(this).is(":checked")) {
            $(this).closest(".js-check").addClass("active");
            // item.find('.radio').find('span').text('Add');
        } else {
            $(this).closest(".js-check").removeClass("active");
            // item.find('.radio').find('span').text('Unselect');
        }
    });

    //////////////////////// Bootstrap tooltip
    if ($('[data-toggle="tooltip"]').length > 0) {
        // check if element exists
        $('[data-toggle="tooltip"]').tooltip();
    } // end if

    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    //////////////////////// Prevent closing from click inside dropdown
    $(document).on("click", ".dropdown-menu", function(e) {
        e.stopPropagation();
    });

    $(document).on("click", ".select-contract", function(event) {
        event.preventDefault();
        $('#navbarDogovorXXL').html(
            '<i class="bi bi-clipboard-check"></i>' + $(this).text() + ''

        );
        // $('li').removeClass('active');
        // $(this).parent('li').addClass('active');
        //var myurl = $(this).attr("href");
        // var page = $(this).attr("href").split("page=")[1];
        contract_id = $(this).data('contract-id');
        getData(contract_id);
    });

    function getData(id) {
        $.ajax({
                url: "?contract_id=" + id,
                type: "get",
                datatype: "html",
            })
            .done(function(data) {
                //$("#products_wrap").empty().html(data);
                $("#products_wrap_xxl").empty().html(data);
                    $("#products_wrap_xl").empty().html(data);
                    $("#products_wrap_lg").empty().html(data);
                    $("#products_wrap_md").empty().html(data);
                    $("#products_wrap_sm").empty().html(data);
                // location.hash = page;
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert("No response from server");
            });
    }
});

$(document).on("ajaxSend", function(e) {
    NProgress.start();
});

$(document).on("ajaxComplete", function(e) {
    NProgress.done();
});

$(document).on('click', '.add-to-cart', function() {
    let product_id = $(this).data('productId');
    let qty = $("#qty-" + product_id).val();
    $.ajax({
            url: '/cart/add?product_id=' + product_id + "&qty=" + qty,
            type: "get",
            datatype: "html"
        })
        .done(function(data) {
            $('#cart-qty').text(data);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('No response from server');
        });
})

$(document).on('click', '.qty-plus', function() {
    let product_id = $(this).data('productId');
    let qty = $('#qty-' + product_id + '').val();
    qty++;

    $('#qty-' + product_id + '').val(qty);

})

$(document).on('click', '.qty-minus', function() {
    let product_id = $(this).data('productId');
    let qty = $('#qty-' + product_id + '').val();
    qty--;
    if (qty < 1) {
        qty = 1;
    }

    $('#qty-' + product_id + '').val(qty);

})

$(document).on('click', '.button-plus', function() {
    let row_id = $(this)[0].dataset.productId;
    let mutliplicity = Number($(this)[0].dataset.mutiplicity);
    let is_cart = Number($(this)[0].dataset.is_cart);
    let cart_row_id = $(this)[0].dataset.rowId;
    let qty = Number($('#qty-' + row_id + '').val());
    qty = qty + mutliplicity;

    $('#qty-' + row_id + '').val(qty);
    if (is_cart == 1) {
        setQtyCart(cart_row_id, qty);
    }
})

$(document).on('click', '.button-minus', function() {

    let row_id = $(this)[0].dataset.productId;
    let mutliplicity = Number($(this)[0].dataset.mutiplicity);
    let is_cart = Number($(this)[0].dataset.is_cart);
    let qty = Number($('#qty-' + row_id + '').val());
    let cart_row_id = $(this)[0].dataset.rowId;
    let prev_qty = qty;
    qty = qty - mutliplicity;
    if (qty < mutliplicity) {
        qty = mutliplicity;
    }

    $('#qty-' + row_id + '').val(qty);
    if (is_cart == 1) {
        setQtyCart(cart_row_id, qty);
    }
})

function setQtyCart(row_id, qty) {
    $.ajax({
            url: '/cart/set?qty=' + qty + "&row_id=" + row_id,
            type: "get",
            datatype: "html"
        })
        .done(function(data) {
            getDataCart();
            $('#cart-qty').text(data);

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('No response from server');
        });
}

$(document).on('click', '.delete-cart-row', function() {
    let row_id = $(this).data('rowId');
    let qty = 'delete';
    $.ajax({
            url: '/cart/add?qty=' + qty + "&row_id=" + row_id,
            type: "get",
            datatype: "html"
        })
        .done(function(data) {
            //$("#kt_datatable").empty().html(data);
            //history.pushState(null, null, '?page=' + page + '&category_id=' + category + '&search=' + search);
            //location.hash = page;
            //$('#add_id').val('');
            //$('#add_qty').val(0);
            //$('#add_price').val('');

            getDataCart();
            $('#cart-qty').text(data);

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('No response from server');
        });
});

$(document).on('click', '#change_password_button', function() {
    let pass = $('#new_password').val();
    let repass = $('#new_password_repeat').val();
    $.ajax({
            url: '/profile/change_password?pass=' + pass + "&repass=" + repass,
            type: "get",
            datatype: "html"
        })
        .done(function(data) {
            //$("#kt_datatable").empty().html(data);
            //history.pushState(null, null, '?page=' + page + '&category_id=' + category + '&search=' + search);
            //location.hash = page;
            //$('#add_id').val('');
            //$('#add_qty').val(0);
            //$('#add_price').val('');

            // getDataCart();
            // $('#cart-qty').text(data);

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('No response from server');
        });
});

function getDataCart() {

    $.ajax({
            url: '',
            type: "get",
            datatype: "html"
        })
        .done(function(data) {
            $(".cart-items").empty().html(data);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('No response from server');
        });
}
// jquery end
