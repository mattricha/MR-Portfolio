jQuery(document).ready(function ($) {

    // IE tweek
    if (!window.location.origin) {
      window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port: '');
    }

    var homepage = window.location.origin + "/";
    var page = 1;
    var loading = true;
    var $window = $(window);
    var titleHeader = '/ portfolio';
    var gridFilterID = '';
    var rightMenuOpen = false;
    var cat = null;
    var $grid = $('#masonry-grid');
    var mobileDropdown = false;

    $grid.masonry({
        columnWidth: '.grid-sizer',
        gutter: '.gutter-sizer',
        itemSelector: '.grid-item',
        percentPosition: true
    });

    var load_posts = function(){
        $.ajax({
            type       : "GET",
            data       : {numPosts : 9, pageNumber: page, catPosts : cat},
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
                    $data.imagesLoaded( function() {
                        $grid.masonry()
                        .append($data)
                        .masonry('appended', $data)
                        .masonry();
                    });
                    $("#temp_load").fadeOut();
                    loading = false;
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
            var content_offset = $grid.offset();
            if(!loading && ($window.scrollTop() +
                $window.height()) > ($grid.scrollTop() +
                $grid.height() + content_offset.top)) {
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
            $grid.html('');
            load_posts();
            change_title($(this).attr('data-title'));
        }
        goToTop();
    });

    // functions

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
        $grid.html('');
        load_posts();
        titleHeader = $(gridFilterID).attr('data-title');
        change_title(titleHeader);
    }

    function toggleDropdown(){
        if(mobileDropdown){
            $('.header-dropdown').removeClass('open');
        }else{
            $('.header-dropdown').addClass('open');
        }
        mobileDropdown = !mobileDropdown;
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
    var $gridSearch = $('#masonry-search-grid');

    $gridSearch.masonry({
        columnWidth: '.grid-sizer',
        gutter: '.gutter-sizer',
        itemSelector: '.grid-item',
        percentPosition: true
    });

    // mobile header dropdown menu toggle
    $('.toggle-dropdown').click( function(){
        toggleDropdown();
    });

    var headerMobile = $(".header-mobile");
    headerMobile.click( function(event){
        event.stopPropagation();
    });

    $("body").click( function(e){
        if(mobileDropdown && !headerMobile.is(e.target)){
          toggleDropdown();
        }
      }
    );
});
