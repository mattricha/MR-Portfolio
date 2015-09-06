jQuery(document).ready(function ($) {

    var homepage = window.location.origin + "/";
    var $container = $('#masonry-grid');

    // infinite scroll AJAX loader vars
    var page = 1;
    var loading = true;
    var $window = $(window);
    var cat = null;

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
            data       : {numPosts : 3, pageNumber: page, catPosts : cat},
            dataType   : "html",
            url        : "/wp-content/themes/MR-Portfolio/loopHandler.php",
            beforeSend : function(){
                if(page != 1){
                    $container.append('<div id="temp_load" style="text-align:center"><img src="/wp-content/themes/MR-Portfolio/images/ajax-loader.gif" /></div>');
                }
            },
            success    : function(data){
                $data = $(data);
                if($data.length){
                    $data.hide();
                    $container.append($data);
                    $data.fadeIn(500, function(){
                        $("#temp_load").remove();
                        loading = false;
                    });
                } else {
                    $("#temp_load").remove();
                }
                $container.masonry('reloadItems');
                $container.masonry('layout');
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
            console.log(content_offset.top);
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

    $("#topPage").click( function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
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
            //urlArg = "/?c=" + cat;
            //window.history.pushState("object or string", "Title", urlArg);
        }
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
        }
    });

    function showSection(sectionID){
        cat = sectionID;
        page = 1;
        $container.html('');
        load_posts();
        window.history.pushState("object or string", "Title", "/");
    }

    // check URL arguments
    var urlArg = "";
    var section = location.search.split('c=')[1];
    if(section !== undefined){
        showSection(section);
    }
    else{
        load_posts();
    }
});
