if (JSINFO.LoadNewsTicker) {
    /* DOKUWIKI:include js/jquery.newsTicker.min.js */
}

/**
 *  We handle several device classes based on browser width.
 *
 *  - desktop:   > __tablet_width__ (as set in style.ini)
 *  - mobile:
 *    - tablet   <= __tablet_width__
 *    - phone    <= __phone_width__
 */
var device_class = ''; // not yet known
var device_classes = 'desktop mobile tablet phone';

function js_dokuwiki_resize(){

    // the z-index in mobile.css is (mis-)used purely for detecting the screen mode here
    var screen_mode = jQuery('#colormag__helper').css('z-index') + '';

    // determine our device pattern
    // TODO: consider moving into dokuwiki core
    switch (screen_mode) {
        case '1001':
            if (device_class.match(/phone/)) return;
            device_class = 'mobile phone';
            //console.log(device_class);
            break;
        case '2001':
            if (device_class.match(/tablet/)) return;
            device_class = 'mobile tablet';
            //console.log(device_class);
            break;
        default:
            if (device_class == 'desktop') return;
            device_class = 'desktop';
            //console.log(device_class);
    }

    jQuery('html').removeClass(device_classes).addClass(device_class);

    // handle some layout changes based on change in device
    var $handle = jQuery('#colormag__secondary h6.toggle');
    var $toc = jQuery('#dw__toc h3');

    if (device_class == 'desktop') {
        // reset for desktop mode
        if($handle.length) {
            $handle[0].setState(1);
            $handle.hide();
        }
        if($toc.length) {
            $toc[0].setState(1);
        }
        // nsindex and usertools back to initial place
        jQuery('#colormag__nsindex-menu').appendTo('#colormag__site-navigation-primary');
        jQuery('#colormag__usertools-menu').appendTo('#colormag__site-navigation-secondary');
    }
    if (device_class.match(/mobile/)){
        // toc and sidebar collapse
        if($handle.length) {
            $handle.show();
            $handle[0].setState(-1);
        }
        if($toc.length) {
            $toc[0].setState(-1);
        }
        // move nsindex and usertools to dropdown
        jQuery('#colormag__nsindex-menu').appendTo('#colormag__nsindex-dropdown');
        jQuery('#colormag__usertools-menu').appendTo('#colormag__usertools-dropdown');
    }
}


jQuery(function(){

    var resizeTimer;
    dw_page.makeToggle('#colormag__secondary h6.toggle','#colormag__secondary div.content');

    js_dokuwiki_resize();
    jQuery(window).on('resize',
        function(){
            if (resizeTimer) clearTimeout(resizeTimer);
            resizeTimer = setTimeout(js_dokuwiki_resize,200);
        }
    );

    // Last changes ticker
    if (JSINFO.LoadNewsTicker) {
        jQuery('.js-lastchanges').newsTicker({
            max_rows: 1,
            row_height: parseFloat(jQuery("#colormag__topbar-newsticker").css("font-size")) + 8,
            speed: 600,
            direction: 'down',
            duration: 4000,
            autostart: 1,
            pauseOnHover: 1
        });
    }

    //// increase sidebar length to match content (desktop mode only)
    //var sidebar_height = jQuery('.desktop #colormag__secondary').height();
    //var pagetool_height = jQuery('.desktop #dokuwiki__pagetools ul:first').height();
    // pagetools div has no height; ul has a height
    //var content_min = Math.max(sidebar_height || 0, pagetool_height || 0);
    //var content_height = jQuery('#dokuwiki__content div.page').height();
    //if(content_min && content_min > content_height) {
    //    var $content = jQuery('#dokuwiki__content div.page');
    //    $content.css('min-height', content_min);
    //}

    // blur when clicked
    jQuery('#dokuwiki__pagetools div.tools>ul>li>a').on('click', function(){
        this.blur();
    });
});
