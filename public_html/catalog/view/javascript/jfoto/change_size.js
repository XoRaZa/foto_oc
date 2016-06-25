$(document).ready(function() {
    var sizeSelect = $('.dydis');
    $(sizeSelect).change(function() {
        var name = $(this).parents('tr').attr('id');
        var size = $(this).val();
        $.ajax({
            method: "POST",
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_size.php',
            data: {
                name: name,
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
    var sizeMultiSelect = $('.dydziai');
    $(sizeMultiSelect).change(function() {
        names = [];
        var size = $(sizeMultiSelect).val();
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
    var deselect = $('#atzymeti');
    $(deselect).click(function() {
        $('img.selected').each(function() {
            $(this).removeClass('selected');
        })
    });
    var select = $('#pazymeti');
    $(select).click(function() {
        $('.td-nuotrauka').find('img').addClass('selected');
    })
});