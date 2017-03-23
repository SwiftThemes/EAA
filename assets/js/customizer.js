/**
 * Created by satish on 23/03/17.
 */

jQuery(document).ready(function ($) {

    $('.eaa-advanced-toggle').click(function (e) {
        e.preventDefault()
        debugger
        var parent = $(this).parent()

        parent.find('.advanced').toggle()

    })

});

