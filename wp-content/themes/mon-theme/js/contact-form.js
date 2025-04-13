jQuery(document).ready(function($) {
    $('form.php-email-form').on('submit', function(e) {
        e.preventDefault();

        var form = $(this);
        var formData = form.serialize();

        $.ajax({
            type: 'POST',
            url: contact_form_ajax_obj.ajaxurl,
            data: formData + '&action=send_contact_form',
            success: function(response) {
                $('.sent-message').text(response);
                form.trigger("reset");
            },
            error: function(response) {
                $('.error-message').text('There was an error submitting your form.');
            }
        });
    });
});
