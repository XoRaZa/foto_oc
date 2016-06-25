$(document).ready(function() {
    var kadravimasSelect = $('.kadravimas');
    $(kadravimasSelect).change(function() {
        var kadravimas = $(this).val();
        var name = $(this).parents('tr').attr('id');
        $.ajax({
            method: "POST",
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_kadravimas.php',
            data: {
                name: name,
                kadravimas: kadravimas
            }
        });
        //var names = [];
        //var sizes = [];
        //var quantities = [];
        //$('.dydis').each(function() {
        //    var n = $(this).parents('tr').attr('id');
        //    names.push(n);
        //    var s = $(this).val();
        //    sizes.push(s);
        //    var q = $(this).parents('tr').find('.kiekis').val();
        //    quantities.push(q);
        //});
        //$.ajax({
        //    method: "POST",
        //    url: cfg.domain + '/catalog/view/theme/fotoprizme/set_size_quantity_cookie.php',
        //    data: {
        //        names: names,
        //        sizes: sizes,
        //        quantities: quantities
        //    }
        //})
    })
});
