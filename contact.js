$(function () {

 //   window.verifyRecaptchaCallback = function (response) {
 //       $('input[data-recaptcha]').val(response).trigger('change');
 //   }

 //   window.expiredRecaptchaCallback = function () {
 //       $('input[data-recaptcha]').val("").trigger('change');
 //   }

    $('#contact-form').validator();

    $('#contact-form').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            var url = "contact.php";
            var form_data = new FormData(this);
            
            
            $.ajax({
                type: "POST",
                url: url,
                data: form_data,
                dataType: "JSON",
                cache: false,
        			 contentType: false,
        			 processData: false,
                success: function (data) {
                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;

                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                    if (messageAlert && messageText) {
                        $('#contact-form').find('.messages').html(alertBox);
                        $('#contact-form')[0].reset();
                        $('#captcha').attr('src', 'securimage/securimage_show.php?' + Math.random());
                        //grecaptcha.reset();
                    }
                }
            });
            return false;
        }
    })
});