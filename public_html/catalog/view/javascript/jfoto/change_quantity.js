$(document).ready(function() {
    return;
    var quantitySelect = $('.kiekis');
    alert('qqqantity : ' + $(this).parents('tr').find(".dydis").text());
    $(quantitySelect).change(function() {
        var quantity   = $(this).val();
        var size       = $(this).parents('tr').find(".dydis").text();
        var pavirsius  = $(this).parents('tr').find('.pavirsius').val();//'blizgus';//$(this).parents('tr').find('.pavirsius').val()
        var kadravimas = $(this).parents('tr').find('.kadravimas').val();//'be kadravimo';//TODO:20-07-03:rimas: pakeisti realiomis elementu pavirsius ir kadravimas reiksmemis
        var name       = $(this).parents('tr').attr('id');
        
        $.ajax({
            method: "POST",
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_quantity.php',
            data: {
                quantity: quantity,
                size: size,
                name: name,
                pavirsius: pavirsius,
                kadravimas: kadravimas
                
            }
        });
        
        var quantities = [];
        var names = [];
        var sizes = [];
        var pavirsiai = [];
        var kadravimai = [];

        $('.dydis').each(function() {
            var q = $(this).parents('tr').find('.kiekis').val();
            quantities.push(q);
            var n = $(this).parents('tr').attr('id');
            names.push(n);
            var s = $(this).find("option:selected").text();
            sizes.push(s);
            var pav = $(this).parents('tr').find('.pavirsius').val();
            pavirsiai.push(pav);
            var kad = $(this).parents('tr').find('.kadravimas').val();
            kadravimai.push(kad);
        });
        $.ajax({
            method: "POST",
            url: cfg.domain + '/catalog/view/theme/fotoprizme/set_size_quantity_cookie.php',
            data: {
                quantities: quantities,
                names: names,
                sizes: sizes,
                pavirsiai: pavirsiai,
                kadravimai: kadravimai
            }
        })
    })
});