$(document).ready(function() {

    recount();
    reprice();

    $('.dydis').change(function() {
        reprice();
    })

    $('.dydziai').change(function() {
        reprice();
    })

    $('.kiekis').bind('keyup mouseup mouseleave', function() {
        reprice();
        recount();
    })

    $('.panaikinti').click(function() {
        var parentTr = $(this).parents('tr');
        remove($(parentTr).attr('id'));
        $(parentTr).remove();
        reprice();
        recount();
    })

    function recount() {
        var totalQuantity = 0;
        $('.kiekis').each(function() {
            totalQuantity = totalQuantity + parseInt($(this).val());
        })
        $('#viso').find('#nuotrauku-kiekis').text(totalQuantity);
    }

    function reprice() {
        var sizes = $('.dydis');
        var data = {};
        $(sizes).each(function () {
            var size = $(this).val();
            var parentTr = $(this).parents('tr');
            var name = $(parentTr).attr('id');
            var quantity = $(parentTr).find('.kiekis').val();
            data[name] = size + '-' + quantity;
        })

        if ($(sizes).length > 0) {
            $.ajax({
                method: 'POST',
                url: cfg.domain + '/catalog/view/theme/fotoprizme/reprice.php',
                data: {
                    'userId' : $('#userId').val(),
                    'pricing': data
                }
            })
                .done(function (msg) {
                    $('#kaina').text(msg);
                    $('#u-suma').text(msg);
                })
        } else {
            $('#kaina').html('0');
        }
    }

    function remove(name) {
        $.ajax({
            method: 'POST',
            url: cfg.domain + '/catalog/view/theme/fotoprizme/remove.php',
            data: {
                'name': name
            }
        });
    };

    $('#apmoketi').click(function() {
        $('#progresas-dabar').html('3');
        $('#rinktis-parametrus').hide();
        if($('#kontaktu-forma').length < 1) {
            $('#apmokejimas').load(cfg.domain + '/catalog/view/theme/fotoprizme/step3.php');
        }
        $('#apmokejimas').show();
        $('#pirmyn').css('visibility', 'hidden');

        $('html, body').animate({
            scrollTop: $("#apmokejimas").offset().top - 100
        }, 500);

        $.ajax({
            method: 'POST',
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_order_status_id.php',
            data: {
                userId: $('#userId').val(),
                order_status_id: 18 // Dydžiai pasirinkti
            }
        });
    });

    ////////// Select/deselect photos
    $('.td-nuotrauka').click(function() {
        toggleSelect($(this));
    });
    $('.td-pavadinimas').click(function() {
        toggleSelect($(this).parents('tr'));
    });

    function toggleSelect(el) {
        $(el).find('img').toggleClass('selected');
    };
})