$(document).ready(function() {
    
    var quantitySelect = $('.kiekis');
    
    $(quantitySelect).change(function() {
        var size = $(this).find("option:selected").text();
        var quantity = $(this).val();
        var pavirsius = $(this).parents('tr').find('.pavirsius').val();//'blizgus';//$(this).parents('tr').find('.pavirsius').val()
        var kadravimas = $(this).parents('tr').find('.kadravimas').val();//'be kadravimo';//TODO:20-07-03:rimas: pakeisti realiomis elementu pavirsius ir kadravimas reiksmemis
        var name = $(this).parents('tr').attr('id');
        
        $.ajax({
            method: "POST",
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_quantity.php',
            data: {
                size: size,
                name: name,
                pavirsius: pavirsius,
                kadravimas: kadravimas,
                quantity: quantity
            }
        });
        
        var names = [];
        var sizes = [];
        var pavirsiai = [];
        var kadravimai = [];
        var quantities = [];
        $('.dydis').each(function() {
            var n = $(this).parents('tr').attr('id');
            names.push(n);
            var s = $(this).find("option:selected").text();
            sizes.push(s);
            var pav = $(this).parents('tr').find('.pavirsius').val();
            pavirsiai.push(pav);
            var kad = $(this).parents('tr').find('.kadravimas').val();
            kadravimai.push(kad);
            var q = $(this).parents('tr').find('.kiekis').val();
            quantities.push(q);
        });
        $.ajax({
            method: "POST",
            url: cfg.domain + '/catalog/view/theme/fotoprizme/set_size_quantity_cookie.php',
            data: {
                names: names,
                sizes: sizes,
                pavirsiai: pavirsiai,
                kadravimai: kadravimai,
                quantities: quantities
            }
        })
    })
});