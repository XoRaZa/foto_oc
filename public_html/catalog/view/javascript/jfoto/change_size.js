$(document).ready(function() {
    
    var select = $('#pazymeti');
    $(select).click(function() {
        $('.td-nuotrauka').find('img').addClass('selected');
    })

    var deselect = $('#atzymeti');
    $(deselect).click(function() {
        $('img.selected').each(function() {
            $(this).removeClass('selected');
        })
    });
    
    var sizeSelect = $('.dydis');
    var surfSelect = $('.pavirsius');
    var cropSelect = $('.kadravimas');
    var quanSelect = $('.kiekis');
    var multSelect = $('.dydziai');
    
    $(sizeSelect).change(function() {
        var name = $(this).parents('tr').attr('id');
        var size = $(this).find("option:selected").text();
        var product_id = $(this).val();
        $.ajax({
            method: "POST",
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_size.php',
            data: {
                name: name,
                size: size,
                product_id: product_id
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
            method: 'POST',
            url: cfg.domain + '/catalog/view/theme/fotoprizme/set_size_quantity_cookie.php',
            data: {
                names: names,
                sizes: sizes,
                quantities: quantities
            }
        })
    });
    
    $(multSelect).change(function() {
        names = [];
        var size = $(multSelect).val();
        var selectedImg = $('img.selected');
        $(selectedImg).each(function() {
            var parentTr = $(this).parents('tr');
            var sizeSelect = $(parentTr).find('.dydis');
            $(sizeSelect).val(size);
            names.push($(parentTr).attr('id'));
        });
        $.ajax({
            method: 'POST',
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_size.php',
            data: {
                names: names,
                size: size
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
            method: 'POST',
            url: cfg.domain + '/catalog/view/theme/fotoprizme/set_size_quantity_cookie.php',
            data: {
                names: names,
                sizes: sizes,
                quantities: quantities
            }
        })
    });
    
    $(surfSelect).change(function() {
        $.ajax({
            method: "POST",
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_pavirsius.php',
            data: {
                name: $(this).parents('tr').attr('id'),
                pavirsius: $(this).val()
            }
        });
        alert('pavirsius : ' + $(this).val());
    });
    
    $(cropSelect).change(function() {
        $.ajax({
            method: "POST",
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_kadravimas.php',
            data: {
                name: $(this).parents('tr').attr('id'),
                kadravimas: $(this).val()
            }
        });
        alert('kadravimas : ' + $(this).val());
    });
    
    $(quanSelect).change(function() {
        $.ajax({
            method: "POST",
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_quantity.php',
            data: {
                order_id: $('#order_id').val(),
                name: $(this).parents('tr').attr('id'),
                size: $(this).parents('tr').find('.dydis').val(),
                quantity: $(this).val()
            }
        });
        alert('kiekis : ' + $(this).val());
        alert('size : ' + $(this).parents('tr').find('.dydis').val());
        alert('order : ' + $('#order_id').val());
    });
    
    
})    


/////////////////////////
//    var surfSelect = $('.pavirsius');
//    var cropSelect = $('.kadravimas');
//    var quanSelect = $('.kiekis');
