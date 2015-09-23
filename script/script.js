jQuery(document).ready(function ($) {

    var homepage = window.location.origin + "/";
    var $container = $('#masonry-grid');

    // infinite scroll AJAX loader vars
    var page = 1;
    var loading = true;
    var $window = $(window);
    var cat = null;
    var titleHeader = '/ portfolio';
    var gridFilterID = '';
    var rightMenuOpen = false;

    $container.imagesLoaded( function() {
        $container.masonry({
            itemSelector: '.grid-item',
            columnWidth: 300,
            isAnimated: true,
            isFitWidth: true
        });
    });

    var load_posts = function(){
        $.ajax({
            type       : "GET",
            data       : {numPosts : 6, pageNumber: page, catPosts : cat},
            dataType   : "html",
            url        : "/wp-content/themes/MR-Portfolio/loopHandler.php",
            beforeSend : function(){
                if(page != 1){
                    $("#temp_load").fadeIn();
                }
            },
            success    : function(data){
                $data = $(data);
                if($data.length){
                    $data.hide();
                    $data.imagesLoaded( function() {
                        $container.append($data);
                        $container.masonry('reloadItems');
                        $container.masonry('layout');
                    });
                    $data.fadeIn(500, function(){
                        $("#temp_load").fadeOut();
                        loading = false;
                    });
                } else {
                    $("#temp_load").remove();
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                $("#temp_load").remove();
                alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    };

    // load more masonry posts on scroll
    if (window.location.href == homepage){
        $window.scroll(function() {
            var content_offset = $container.offset();
            //console.log(content_offset.top);
            if(!loading && ($window.scrollTop() +
                $window.height()) > ($container.scrollTop() +
                $container.height() + content_offset.top)) {
                    loading = true;
                    page++;
                    load_posts();
            }
        });
    }

    // back to top of page icon
    $window.scroll(function() {
        if ($(window).scrollTop() > 1000) {
            $("#topPage").fadeIn();
        }
        else{
            $("#topPage").fadeOut();
        }
    });


    // events

    $("#topPage").click( function() {
        goToTop();
    });

    $(".grid-filter").click( function() {
        if(window.location.href != homepage){
                window.location.href = homepage + "?c=" + $(this).attr('value');
        }
        else{
            cat = $(this).attr('value');
            page = 1;
            $container.html('');
            load_posts();
            change_title($(this).attr('title'));
        }
        goToTop();
    });

    $(".grid-filter-all").click( function() {
        if(window.location.href != homepage){
                window.location.href = homepage;
        }
        else{
            cat = null;
            page = 1;
            $container.html('');
            load_posts();
            titleHeader = '/ portfolio';
            change_title(titleHeader);
        }
        goToTop();
    });

    $(".right-menu-toggle").click( function(){
        if(rightMenuOpen){
            close_right_menu();
        }
        else{
            open_right_menu();
        }
    });

    $("body").click( function(){
        if(rightMenuOpen){
            close_right_menu();
        }
    });

    $(".right-menu-link").click( function(){
        if(rightMenuOpen){
            close_right_menu();
        }
    });

    $(".right-menu").click( function(event){
        event.stopPropagation();
    });


    // functions

    function close_right_menu(){
        $(".header-right").animate({
                right: "-160px"
              }, 200, function() {
                rightMenuOpen = false;
            });
    }

    function open_right_menu(){
        $(".header-right").animate({
                right: "0px"
              }, 200, function() {
                rightMenuOpen = true;
            });
    }

    function change_title(title){
        $('.header-title').fadeOut('fast', function(){$('.header-title').html(title);});
        $('.header-title').fadeIn('fast');
        window.history.pushState("object or string", "Title", "/");
    }

    function goToTop(){
        $("html, body").animate({ scrollTop: 0 }, "slow");
    }

    function showSection(sectionID){
        cat = sectionID;
        page = 1;
        gridFilterID = '#grid-filter-' + cat;
        $container.html('');
        load_posts();
        titleHeader = $(gridFilterID).attr('title');
        change_title(titleHeader);
    }

    // check URL arguments
    var urlArg = "";
    var section = location.search.split('c=')[1];
    if(section !== undefined){
        showSection(section);
    }
    else{
        $('.header-title').html(titleHeader);
        load_posts();
    }

    //search page

    var $containerSearch = $('#masonry-search-grid');

    $containerSearch.imagesLoaded( function() {
        $containerSearch.masonry({
            itemSelector: '.grid-item',
            columnWidth: 300,
            isAnimated: true,
            isFitWidth: true
        });
    });

    // skrollr (parallax scrolling)

    if(!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
        skrollr.init({
            forceHeight: false
        });
    }else{
        $('.bcg').attr('data-center','background-position: 50% -450px;');
    }

});
