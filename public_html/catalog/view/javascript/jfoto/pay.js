//Tikrinama ar uzpildyti reikalaujami laukai
//apmokejimo metu
$(document).ready(function() {
    $('form').focusout(function() {
        var userId = $('#userId').val();
        var name = $('[name="vardas"]').val();
        var surname = $('[name="pavarde"]').val();
        var email = $('[name="email"]').val();
        var phone = $('[name="telefonas"]').val();
        var address = $('[name="adresas"]').val();
        var comments = $('[name="komentaras"]').val();

        $.ajax({
            method: 'POST',
            url: cfg.domain + '/catalog/view/theme/fotoprizme/write_contacts.php',
            data: {
                userId: userId,
                vardas: name,
                pavarde: surname,
                elpastas: email,
                telefonas: phone,
                adresas: address,
                komentaras: comments
            }
        })
    });

    $('#sumoketi').click(function(e) {
        var link = $(this).attr('href');
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_order_status_id.php',
            data: {
                userId: $('#userId').val(),
                order_status_id: 19, // Apmokėjimas pradėtas
                update_order_product: '0'
            }
        })
        var fields = [
            '[name="vardas"]',
            '[name="pavarde"]',
            '[name="email"]',
            '[name="telefonas"]',
            '[name="adresas"]'
        ];
        var errors = [];
        $(fields).each(function(index, value) {
            if(!($(value).val())) {
                errors.push(value);
            }
        });
        if($(errors).length == 0) {
            window.location.href = link
        } else {
            $('#butina').show().modal({
                fadeDuration: 100
            });
        }
    })
})