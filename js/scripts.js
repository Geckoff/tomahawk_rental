$(document).ready(function(){

    $('.agform').on("sent", function() {
        $(this).find('.btn').addClass("animated flipOutX");
        $(this).find('.success-sent').css("display", 'block');
    });

    if ($(window).width() < 768 && $(window).width() > 305 ) {
        $('.navbar.navbar-default.top-menu').attr('class', 'navbar navbar-default navbar-fixed-top top-menu');
    }


    $('#myForm1').validator({
	    feedback: {
          success: 'fa fa-check-square-o',
          error: 'fa fa-times'
        }
	});

    $('#myForm2').validator({
	    feedback: {
          success: 'fa fa-check-square-o',
          error: 'fa fa-times'
        }
	});

    $('.agform').on('first', function(eventName){
        alert('asd');
    });


    /* sly[i].on('change', function(eventName) {
                $(".frame .add-desc").slideUp();
            });*/
    /*=====================================SLY.JS=========================================*/

    var sly = [];

    $(".frame").each(function(indx, element) {
        $(element).attr('id', 'frame' + indx);
        /*$(element).find('.add-desc').each(function(descindx, descelement) {
            $(descelement).attr('add-desc-id', descindx);
        });*/
    });

    $('.add-desc').each(function(descindx, descelement) {
            $(descelement).attr('add-desc-id', descindx);
    });


    function setSlideeParameters(frameid) {
        var parametrs = {
                horizontal: 1,
    			itemNav: 'centered',
    			smart: 1,
    			activateOn: 'click',
    			mouseDragging: 1,
    			touchDragging: 1,
    			/*releaseSwing: 1,*/
    			startAt: 0,
    			scrollBar: $(frameid).parent().siblings('.scrollbar'),
    			scrollBy: 1,
    		    /*pagesBar: $('.pages'), */
    			activatePageOn: 'click',
    			speed: 300,
    			/*elasticBounds: 1,*/
    			/*easing: 'linear',*/
    			dragHandle: 1,
    			dynamicHandle: 1,
    			/*clickBar: 1, */
                prev: $(frameid).siblings('.left-crutch').find('.prev'),
    		    next: $(frameid).siblings('.right-crutch').find('.next')
        }
        return parametrs;
    }

    $(".frame").each(function(indx, element) {

        sly[indx] = new Sly($('#frame' + indx), setSlideeParameters('#frame' + indx));
    });

    var adddescid = 999;

    /* slider description switch state icon switching */

    function slideDelay(element, rotate) {
        $(element).find('i').attr('class', 'fa fa-play fa-rotate-' + rotate);
        if ($(element).siblings('.add-desc').css('display') == 'none') {
            $(element).find('i').attr('class', 'fa fa-play fa-rotate-90');
        }
    }

    $('.slidee li').on('click', function(){
        $(this).find('.add-desc').slideToggle();
        adddescid = parseInt($(this).find('.add-desc').attr('add-desc-id'));

        if ($(this).find('.add-desc').css('display') == 'block') {
            setTimeout(slideDelay, 430, this, '270');
        }
    });

    /* slider description switch state icon switching end */

    for (var i = 0; i < sly.length; i++) {
        sly[i].on('change', function(eventName) {
            $(".frame .add-desc").each(function(indx, element) {
                /*$(".add-desc").slideUp(); */
                if (indx !== adddescid) {
                    $(element).slideUp();
                    $(element).siblings('.tog-but').find('i').attr('class', 'fa fa-play fa-rotate-90');
                }
            });
            adddescid = 999;

        });

        if ($(window).width() < 481) {
            sly[i].on('change', function(eventName) {
                $(".frame .add-desc").slideUp();
            });
        }

        sly[i].init();
    }


    $(window).scroll(function(){
        $('.add-desc').slideUp();
        $('.tog-but').find('i').attr('class', 'fa fa-play fa-rotate-90');
    });

    function clickAddDescDelay(element) {
        $(element).siblings('.tog-but').find('i').attr('class', 'fa fa-play fa-rotate-90');
    }

    $('.slidee li').on('click', function(){
        alert('asd');
        $(this).find('.add-desc').slideUp();
        setTimeout(clickAddDescDelay, 430, this);
    });


    if ($(window).width() < 768) {
        $('ul.slidee li').width($('ul.slidee li').width());
        $('ul.slidee').width($('ul.slidee').width() + 6);
    }







    /*$(".add-desc").each(function(indx, element) {
        if ($(element).css('display') == 'block') {
            $(element).siblings('.tog-but i').attr('class', 'fa fa-play fa-rotate-270');
        }
        else {
            $(element).siblings('.tog-but i').attr('class', 'fa fa-play fa-rotate-90');
        }

    });*/

    /*=====================================SLY.JS END=========================================*/

    /*=============================Gradual anchor scrolling==================================*/

    $(document).ready(function(){
        $("#menu-top").on("click","a", function (event) {
            event.preventDefault();
            var id  = $(this).attr('href'),
                top = $(id).offset().top;
            $('body,html').animate({scrollTop: top}, 500);
        });
    });

    /*=============================Gradual anchor scrolling END==================================*/

    /*=============================Phone Mask==================================*/

    jQuery(function($){
        $("#num-ent").mask("(999) 999-9999");
    });

    /*=============================Phone Mask END==================================*/

    /*=============================Phone Coloring==================================*/

    $(".phone p span").each(function(indx, element) {
        /*+375 29 545 27 86*/
        phone = $(element).text();
        prefix = phone.substring(0, 4);
        postfix = phone.substring(4, phone.length);

        phone = prefix + '<span class="bold-phone">' + postfix + '</span>';
        $(element).html(phone);
    });

    /*=============================Phone Coloring END==================================*/

    /*=============================Mobile Menu fix==================================*/

    function menuTopChangeAttr() {
        $('#menu-top').attr('class', 'right-pad-res left-pad-res navbar-collapse collapse');
    }

    if ($(window).width() < 768) {

        $('#menu-top ul li').on('click', function(){
            $('#menu-top ul').slideUp();
            $('.navbar-header button').attr('class', 'navbar-toggle collapsed');
            $('.navbar-header button').attr('aria-expanded', 'false');
            setTimeout(menuTopChangeAttr, 300);
        });

        $('.navbar-header button').on('click', function(){
            $('#menu-top ul').slideDown();
        });
    }

    /*=============================Mobile Menu fix END==================================*/



});

ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
                center: [40.4771176, -104.8902152],
                zoom: 14,
                controls: ['zoomControl']
            }, {
                searchControlProvider: 'yandex#search'
            }),
            myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                balloonContent: 'Это красивая метка'
            }, {
                // Опции.
                // Необходимо указать данный тип макета.
                iconLayout: 'default#image',
                // Своё изображение иконки метки.
                iconImageHref: 'http://inprocat/wp-content/themes/inprocat/img/map-tag.png',
                // Размеры метки.
                iconImageSize: [294, 93],
                // Смещение левого верхнего угла иконки относительно
                // её "ножки" (точки привязки).
                iconImageOffset: [-20, -80]
            });

        myMap.geoObjects.add(myPlacemark);
    });