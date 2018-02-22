(function ($) {
    $(document).ready(function () {
        var bottom_padding = $('#eaa_sticky_ad_bottom .eaa-ad').outerHeight()
        var top_padding = $('#eaa_sticky_ad_top  .eaa-ad').outerHeight()
        if (top_padding) {
            $('body').css({'margin-top': top_padding + 'px'})
        }
        if (bottom_padding) {
            $('body').css({'margin-bottom': bottom_padding + 'px'})
        }
        $('#eaa_sticky_ad_top .eaa-ad,#eaa_sticky_ad_bottom .eaa-ad').append('<span class="eaa-close">X</span>');
        $('#eaa_sticky_ad_bottom .eaa-close').on('click', function () {
            $('#eaa_sticky_ad_bottom').hide()
            $('body').css('margin-bottom', '');
        })
        $('#eaa_sticky_ad_top .eaa-close').on('click', function () {
            $('#eaa_sticky_ad_top').hide()
            $('body').css('margin-top', '');
        })
    })
})(jQuery)