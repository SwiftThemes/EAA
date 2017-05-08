/**
 * Created by satish on 23/03/17.
 */

jQuery(document).ready(function ($) {

    $('.eaa-advanced-toggle').click(function (e) {
        e.preventDefault()
        var parent = $(this).parent()

        parent.find('.advanced').toggle()
    })


    collapse_all_ads()

    // When a closed ad is clicked, collapse all open ads and open the current one.
    $('#sub-accordion-section-post_content,' +
        '#sub-accordion-section-user_locations,' +
        '#sub-accordion-section-eaa_theme_locations,' +
        '#sub-accordion-section-eaa_advanced_locations').on('click', 'li.customize-control.closed span', function (e) {
        e.preventDefault()
        collapse_all_open_ads()
        $(this).parent().addClass('open').removeClass('closed')
    })

    // When an open ad is clicked, collapse it.
    $('#sub-accordion-section-post_content,' +
        '#sub-accordion-section-user_locations,' +
        '#sub-accordion-section-eaa_theme_locations,' +
        '#sub-accordion-section-eaa_advanced_locations').on('click', 'li.customize-control.open span', function (e) {
        e.preventDefault()
        $(this).parent().addClass('closed').removeClass('open')
    })


    function collapse_all_ads() {
        $('#sub-accordion-section-post_content li.customize-control,' +
            '#sub-accordion-section-user_locations li.customize-control,' +
            '#sub-accordion-section-eaa_theme_locations li.customize-control,' +
            '#sub-accordion-section-eaa_advanced_locations li.customize-control').each(
            function () {
                $(this).addClass('closed').removeClass('open')
            }
        )
    }

    function collapse_all_open_ads() {

        $('#sub-accordion-section-post_content li.customize-control.open,' +
            '#sub-accordion-section-user_locations li.customize-control.open,' +
            '#sub-accordion-section-eaa_theme_locations li.customize-control.open,' +
            '#sub-accordion-section-eaa_advanced_locations li.customize-control.open').each(
            function () {
                $(this).addClass('closed').removeClass('open')
            }
        )
    }

});

