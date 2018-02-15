/**
 * Created by satish on 13/03/17.
 */
jQuery(document).ready(function ($) {
    $('#contact-satish-submit').click(function (e) {
        e.preventDefault()
        e.stopPropagation()

        if ($('#contact-satish #message').val().length < 20) {
            alert('Message should be at least 20 characters long.')
            return false;
        }
        $(this).attr('disabled', true);


        var data = {
            'action': 'eaa_send_email',
            'nonce': $('#eaa-help-nonce').val(),
            'formData': $('#contact-satish').serializeArray()
        };
        jQuery.post(ajaxurl, data, function (response) {
            $('#contact-satish #contact-satish-submit').attr('disabled', false);
            if (response.type === 'Success') {
                $('#contact-satish #message').val('')
                $('#feedback').text(response.message).addClass('notice notice-success').removeClass('error').show()
            } else {
                $('#feedback').text(response.message).addClass('notice notice-error').removeClass('success').show()
            }
        });
    })

});