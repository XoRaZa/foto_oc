$(document).ready(function() {
    var quantitySelect = $('.kiekis');
    $(quantitySelect).change(function() {
        var quantity = $(this).val();
        var name = $(this).parents('tr').attr('id');
        $.ajax({
            method: "POST",
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_quantity.php',
            data: {
                name: name,
                quantity: quantity
            }
        });
        var names = [];
        var sizes = [];
        var quantities = [];
        $('.dydis').each(function() {
            var n = $(this).parents('tr').attr('id');
            names.push(n);
            var s = $(this).val();
            sizes.push(s);
            var q = $(this).parents('tr').find('.kiekis').val();
            quantities.push(q);
        });
        $.ajax({
            method: "POST",
            url: cfg.domain + '/catalog/view/theme/fotoprizme/set_size_quantity_cookie.php',
            data: {
                names: names,
                sizes: sizes,
                quantities: quantities
            }
        })
    })
});