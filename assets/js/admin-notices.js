jQuery(document).ready(function ($) {
    $('.page-speed-promo .notice-dismiss').on('click', function (e) {
        var id = $(this).parent().data('id');
        var show_next = $(this).parent().data('show_next');
        var data = {
            'action': 'eaa_dismiss_admin_notice',
            'id': id,
            'show_next': show_next
        };


        $.post(ajaxurl, data, function (response) {
            if (response.type != 'Success') {

                $('<div class="error"><p>Sorry, error while dismissing the notice :-(. Please contact support.</p></div>').prependTo('.wrap')
            }
        });
    })


});