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
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_surface.php',
            data: {
                name: $(this).parents('tr').attr('id'),
                pavirsius: $(this).val()
            }
        });
        alert_t('pavirsius : ' + $(this).val());
    });
    
    $(cropSelect).change(function() {
        $.ajax({
            method: "POST",
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_cropping.php',
            data: {
                name: $(this).parents('tr').attr('id'),
                kadravimas: $(this).val()
            }
        });
        alert_t('kadravimas : ' + $(this).val());
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
        alert_ts('kiekis : ' + $(this).val());
    });
    
})    


/* RZ si isaugojima cookie'se reikia kazkaip realizuoti(visu parametru)
 *      //var names = [];
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

 */