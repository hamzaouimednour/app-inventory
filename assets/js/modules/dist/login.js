$(function () {

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        1. SUBMIT FORM
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    $('#submitLoginForm').on('click', function(e){
        e.preventDefault();

        // set Loading icon.
        $(this).addClass('btn-loading');
        
        // serialize Form data.
        var formData = new FormData($('#loginForm')[0]);

       // Validate Form
       if ($('#loginForm')[0].checkValidity() === false) {
            e.preventDefault();
            e.stopPropagation();
        } else {
            // POST Form data.
            $.ajax({
                url: baseURL + '/check-auth',
                method: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false
            })
                .done(function (data) {
                    try {

                        // check Response Status
                        if (data.status == 'success') {
                            
                            location.href = data.url;
                            
                        } else {
                            // alert Response Message.
                            swal('Echoué!', data.info, 'error');
                        }

                    // Try Catch Error.
                    } catch (error) {
                        swal('Erreur!', 'Operation echoué, '+ error.message +' !', 'error')
                    }
                })
                // Handle Json Errors messages.
                .fail(function (jqXHR, textStatus, errorThrown) {
                    // Get 422 code Errors.
                    if (jqXHR.status == 422) {
                        var errors = '';
                        $.each(jqXHR.responseJSON.errors, function (key, value) {
                            errors += "\n" + value;
                        });
                        // Print Errors.
                        swal('Erreur!', errors, 'error')
                    // Get other codes Errors.
                    } else {
                        swal('Erreur!', 'Operation echoué, '+errorThrown+'!', 'error');
                    }
                })
        }
        // unset Loading icon.
        $(this).removeClass('btn-loading');
        // validate form.
        $('#loginForm').addClass('was-validated');
        // scroll to the top.
        $("html, body.card").animate({ scrollTop: 0 }, "slow");
    });

});