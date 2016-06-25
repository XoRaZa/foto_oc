// Photo uploading
// Initiate photos uploading script
// Atsidarius/iskvietus(programiskai) pagrindini svetaines puslapi ukraunamas
// sis skriptas, sukuria nauja vartotoja + preke
$(function() {
    //RZ
    var userId = $("#userId").val();
    var parsed = '';
    function setNewUserId() {
        $.ajax({
            async: false,
            method: "POST",
            url: cfg.domain + '/catalog/view/theme/fotoprizme/new_user_id.php'
        })
            .done(function(data, textStatus, jqXHR) {
                parsed = $.parseJSON(data);
                $('#userId').val(parsed.userId);
                alert(textStatus + " . New order and userId created. userId = " + parsed.userId);//RZ
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                alert( "setNewUserId() function error : "  + textStatus + '=' + errorThrown);
            })
            .always(function(jqXHR, textStatus, errorThrown) {
                alert( "always complete -> " + textStatus);//RZ
            });
            
    }

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

        var toLoad = cfg.domain + '/catalog/view/theme/fotoprizme/step2.php';
        var toLoadTo = $('#rinktis-parametrus');
        $(toLoadTo).load(toLoad);

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
    
    alert('setNewUserId() function will by called. Now userId = ' + userId);
    setNewUserId();
    alert('After call setNewUserId(). New userId = ' + $("#userId").val());
    alert('Last executed sql = ' + parsed.sql_str);
    alert(parsed.error_str);

    // Now that the DOM is fully loaded, 
    // create the dropzone, and setup the event listeners
    try {
        var myDropzone = new Dropzone("form#photos-2",
            {
                url: '/catalog/view/theme/fotoprizme/upload.php',
                addRemoveLinks: true,
                acceptedFiles: 'image/*',
                dictRemoveFile: 'Išmesti',
                dictInvalidFileType: 'Tai ne fotografija',
                dictFileTooBig: 'Failas per didelis',
                dictCancelUpload: 'Nutraukti siuntimą',
                dictCancelUploadConfirmation: 'Tikrai nutraukiti siuntimą?',
                dictDefaultMessage: 'Įtempkite failus čia arba spauskite, kad pasirinktumėte juos iš kompiuterio'
            }
        );
    }
    catch(err) {
        alert(err.message);
    };

    myDropzone.on("addedfile", function(file) {
        // TODO: figure this out
        leftRightBg();
        $('#progresas').show();
        alert('addedfile');//RZ
    });

    myDropzone.on("sending", function(file, xhr, formData) {
        var userId = $("#userId").val();
        formData.append('userId', userId);
        alert('sending');//RZ
    });
    
    myDropzone.on("success", function(file, data) {
        console.log(data);
        //RZ cia reikia prideti i order_product
        alert('success uploaded file');//RZ
    });
    
    myDropzone.on("removedfile", function(file) {
        var orN = file.name;
        var size = file.size;
        var userId = $("#userId").val();
        $.ajax({
            method: 'POST',
            url: cfg.domain + '/catalog/view/theme/fotoprizme/remove.php',
            data: {
                'orNs': {
                    'name': orN,
                    'size': size,
                    'userId': userId
                }
            }
        })
            .done(function(data) {
                console.log(data);
            });
        console.log(file);
        alert('removedfile');//RZ
    });

    // Load next step after uploading.
    $('#ikeliau-toliau').click(function(e) {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: cfg.domain + '/catalog/view/theme/fotoprizme/change_order_status_id.php',
            data: {
                userId: $('#userId').val(),
                order_status_id: 17 // Nuotraukos sukeltos
            }
        });

        loadAfterUpload();
        alert('po nuotrauku sukelimo');//RZ
    });

    leftRightBg();
    
    var photoInput = $("#photos-2");

    $('#add-photos').on('mouseenter', function () {
        var userId = $("#userId").val();
    });

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
                loadAfterUpload();
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
            if(!$(value).is(":hidden")) {
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
            history.pushState({}, '', 'http://kado.lt');
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

    ////////// Testing
    $('img').click(function() {
        var names = [];
        $.ajax({
            method: 'POST',
            url: cfg.domain + '/catalog/view/theme/fotoprizme/set_size_quantity_cookie.php',
            data: {
                names: [
                    'first name',
                    'second name'
                ],
                sizes: [
                    '10x20',
                    '9x15'
                ],
                quantities: [
                    '3',
                    '21'
                ]
            }
        })
            .done(function(msg) {
                alert(msg);
            });
    });
});
