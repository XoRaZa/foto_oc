// Photo uploading
// Initiate photos uploading script
// Atsidarius/iskvietus(programiskai) pagrindini svetaines puslapi ukraunamas
// sis skriptas, sukuria nauja orderi + prekes

//funkcija skirta alertu isvedimui testavimo metu
$(function() {
    //RZ
    //var userId           = $("#userId").val();
    //var order_id         = $('#order_id').val();
//    var order_product_id = $('#order_product_id').val();
//    var product_id       = $('#product_id').val(); 
//    var photo_size       = $('#photo_size').val();   
//    var pavirsius        = $('#pavirsius').val();  
//    var kadravimas       = $('#kadravimas').val();   
//    var quantity         = $('#quantity').val();
    
    var parsed = '';
    
    //sukuriamas naujas tuscias orderis su viena prreke(product_id=1 ir quantity=0
    function createNewOrder() {
        $.ajax({
            async : false,
            method: "POST",
            //RZ kolkas nereikialinga
            //bet galima panaudoti duomenu perdavimui i php (kaip $_POST kintamieji)
            //data: { "name": "--name--", "location": "--location--" },
            url: cfg.domain + '/catalog/view/theme/fotoprizme/create_new_oder.php'
            })
            .done(function(data, textStatus, jqXHR) {
                parsed = $.parseJSON(data);
                $('#userId').val(parsed.userId);
                $('#order_id').val(parsed.order_id);
                alert_t(textStatus + " . New order and userId created. userId = " + parsed.userId + "  order_id = " + parsed.order_id);//RZ
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                alert( "createNewOrder() function error = "  + textStatus + '=' + errorThrown);
            })
            .always(function(jqXHR, textStatus, errorThrown) {
                //alert_t( "always complete -> " + textStatus);//RZ
            });
    }
    //RZ ??
    function loadAfterUpload() {
        $('#add-photos').hide();
        $('#progresas-dabar').html('2');
        $('#rinktis-parametrus').show();
        $('#atgal').css('visibility', 'visible');
        if($('#uzsakymo-suma').length < 1) {
            $('#pirmyn').css('visibility', 'hidden');
        }
        $('html, body').animate({
            scrollTop: $("#rinktis-parametrus").offset().top - 100
        }, 500);

        //var toLoad = cfg.domain + '/catalog/view/theme/fotoprizme/step2.php';
        //var toLoadTo = $('#rinktis-parametrus');
        //$(toLoadTo).load(toLoad);
        //RZ jQuery .load() ajax
        $('#rinktis-parametrus').load(cfg.domain + '/catalog/view/theme/fotoprizme/step2.php');
    }

    function leftRightBg() {
        var pageHeight = $(document).height();
        var pageWidth = $(document).width();
        var containerWidth = $(".container").width();
        var leftWidth = (pageWidth - containerWidth) / 2;
        var rightWidth = (pageWidth - containerWidth) / 2;
        var leftDiv = $("#kaire");
        var rightDiv = $("#desine");
        $(leftDiv).width(leftWidth);
        $(rightDiv).width(rightWidth);
        $(leftDiv).height(pageHeight);
        $(rightDiv).height(pageHeight);
    }
    
    //alert_t('createNewOrder() function will by called. Now userId = ' + $("#userId").val());
    alert_t('createNewOrder() function will by called. Now userId = ' + parsed.userId);
    createNewOrder();
    alert_t('After call createNewOrder(). New userId = ' + parsed.userId);
    alert_t('After call createNewOrder(). New order_id = ' + parsed.order_id);
    alert_t('Last executed sql = ' + parsed.sql_str);
    alert_t('Last error = ' + parsed.error_str);

    // Now that the DOM is fully loaded, 
    // create the dropzone, and setup the event listeners
    try {
        var myDropzone = new Dropzone("form#photos-2",
            {
                url: '/catalog/view/theme/fotoprizme/upload.php',
                addRemoveLinks              : true,
                acceptedFiles               : 'image/*',
                dictRemoveFile              : 'Išmesti',
                dictInvalidFileType         : 'Tai ne foto',
                dictFileTooBig              : 'Failas per didelis',
                dictCancelUpload            : 'Nutraukti siuntimą',
                dictCancelUploadConfirmation: 'Tikrai nutraukiti siuntimą?',
                dictDefaultMessage          : 'Įtempkite failus čia arba spauskite, kad pasirinktumėte juos iš kompiuterio',
                method:"POST"
            }
        );
    }
    catch(err) {
        alert(err.message);
    };
    //po failopasirinkimo
    myDropzone.on("addedfile", function(file) {
        // TODO= figure this out
        leftRightBg();
        $('#progresas').show();
        alert_t('addedfile');//RZ
    });

    //cia prideme siunciamus kintamuosius apie faila i picture lentele
    myDropzone.on("sending", function(file, xhr, formData) {
        formData.append('userId', parsed.userId);
        formData.append('order_id', parsed.order_id);
        
        alert_t('sending filе : ' + file.name + ":" + parsed.userId + ":" + parsed.order_id);//RZ
    });
    //cia patnkame po uzsiuntimo
    myDropzone.on("success", function(file, data) {
        console.log(data);
        alert_t('success uploaded file : ' + file.name);//RZ
    });
    
    myDropzone.on("removedfile", function(file) {
        $.ajax({
            method: 'POST',
            url: cfg.domain + '/catalog/view/theme/fotoprizme/remove.php',
            data: {
                'orNs': {
                    'name': file.name,
                    'size': file.size,
                    'userId': parsed.userId
                }
            }
        })
        .done(function(data) {
            console.log(data);
        });
        console.log(file);
        alert_t('removedfile');//RZ
    });

    //RZ Nupaustas "Testi" kai visi pic'as sukelti i dropezone'a. 
    //pakeisti oder status ir pereiti
    //i kiekiu ir dydziu keitima
    $('#ikeliau-toliau').click(function(e) {
        alert_t('Nuspastas "Testi"');
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_order_status.php',
            data: {
                userId: parsed.userId,
                order_id: parsed.order_id,
                order_status_id: 17, // Nuotraukos sukeltos
                update_order_product: '0'
            }
        });
        //RZ ir pereiti
        alert_t('pries nuotrauku sukelima (testi)');//RZ
        loadAfterUpload();
        alert_t('po nuotrauku sukelimo (testi)');//RZ
    });

    leftRightBg();
    
    var photoInput = $("#photos-2");

    // Progress
    var back = $('#atgal');
    var forward = $('#pirmyn');
    $(back).click(function() {
        var currentProgress = $('#progresas-dabar');
        var currentProgressVal = $(currentProgress).text();
        switch(currentProgressVal) {
            case '2':
                $('#rinktis-parametrus').hide();
                $('#add-photos').show();
                $(currentProgress).html(1);
                $('#pirmyn').css('visibility', 'visible');
                $('#atgal').css('visibility', 'hidden');

                $('html, body').animate({
                    scrollTop: $("#add-photos").offset().top - 100
                }, 500);
                break;
            case '3':
                $('#apmokejimas').hide();
                $('#rinktis-parametrus').show();
                $(currentProgress).html(2);
                $('#pirmyn').css('visibility', 'visible');

                $('html, body').animate({
                    scrollTop: $("#rinktis-parametrus").offset().top - 100
                }, 500);
                break;
            default:
                break;
        }
    });
    
    $(forward).click(function() {
        var currentProgress = $('#progresas-dabar');
        var currentProgressVal = $(currentProgress).text();
        switch(currentProgressVal) {
            case '1':
                $('#add-photos').hide();
                alert_t('pries nuotrauku sukelima (>>>)');//RZ
                loadAfterUpload();
                alert_t('po nuotrauku sukelimo (>>>)');//RZ
                $('#rinktis-parametrus').show();
                $(currentProgress).html(2);
                if($('#uzsakymo-suma').length < 1) {
                    $('#pirmyn').css('visibility', 'hidden');
                }
                $('#atgal').css('visibility', 'visible');

                $('html, body').animate({
                    scrollTop: $("#rinktis-parametrus").offset().top - 100
                }, 500);
                break;
            case '2':
                $('#rinktis-parametrus').hide();
                $('#apmokejimas').show();
                $(currentProgress).html(3);
                $('#pirmyn').css('visibility', 'hidden');

                $('html, body').animate({
                    scrollTop: $("#apmokejimas").offset().top - 100
                }, 500);
                break;
            default:
                break;
        }
    });

    $(window).on('scroll touchmove', function() {
        var steps = [
            '#add-photos',
            '#rinktis-parametrus',
            '#apmokejimas'
        ];
        $(steps).each(function(index, value) {
            if(!$(value).is("=hidden")) {
                window.additionalHeight = $(value).height();
            }
        });
        if($(document).scrollTop() < 400 || $(document).scrollTop() > 500 + window.additionalHeight) {
            $('#progresas').fadeOut(350);
        } else {
            if($('#apmoketi').length > 0) {
                $('#progresas').fadeIn(350);
            }
        }
    });

    if($('#payment-successful').val() == 1) {
        $('.payment-successful').show();
        $('.payment-successful').modal();
        $('.payment-successful').on($.modal.CLOSE, function(event, modal) {
            history.pushState({}, '', 'http=//kado.lt');
        });
    }

    $('a').smoothScroll({
        offset: -250
    });
    $('a[href="#ikelti-nuotraukas"]').smoothScroll({
        offset: -100
    });
    $('a[href="#kas-mes"]').smoothScroll({
        offset: -200
    });
    $('a[href="#atsiliepimai"]').smoothScroll({
        offset: -200
    });
    $('a[href="#paslaugos"]').smoothScroll({
        offset: -280
    });
    $('a[href="#kontaktai"]').smoothScroll({
        offset: -100
    });

    ////////// Paslaugos modals
    var modals = [
        "nuotrauku-spausdinimas",
        "skaitmenine-spauda",
        "spaudos-darbai",
        "firminis-stilius",
        "fotografavimo-paslaugos",
        "renginiu-filmavimas",
        "vaizdo-klipai",
        "suvenyrai"
    ];
    $(modals).each(function(index, value) {
        var modal = "#" + value + "-modal";
        $(modal).hide();
    });
    $("a").click(function () {
        var id = $(this).parent().attr("id");
        $(modals).each(function(index, value) {
            var modal = "#" + id + "-modal";
            if (value == id) {
                $(modal).modal({
                    fadeDuration: 50,
                    width: 600
                });
            }
        });
    });
    $('.accordion').accordion({
        heightStyle: 'content'
    });

    ////////// Menu
    $(window).on('scroll touchmove', function() {
        $('#menu-1').toggleClass('narrow', $(document).scrollTop() > 40);
    });
    
});
