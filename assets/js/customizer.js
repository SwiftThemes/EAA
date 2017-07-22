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

    // When a closed ad is clicked
    $('li.customize-control').on('click', '.eaa-ad-unit-container.closed span', function (e) {
        e.preventDefault()
        collapse_all_open_ads()
        $(this).parent().addClass('open').removeClass('closed')
    })

    $('li.customize-control').on('click', '.eaa-ad-unit-container.open span', function (e) {
        e.preventDefault()
        $(this).parent().addClass('closed').removeClass('open')
    })


    function collapse_all_ads() {
        $('.eaa-ad-unit-container').each(
            function () {
                $(this).addClass('closed').removeClass('open')
            }
        )
    }

    function collapse_all_open_ads() {
        $('.eaa-ad-unit-container.open').each(
            function () {
                $(this).addClass('closed').removeClass('open')
            }
        )
    }

});

