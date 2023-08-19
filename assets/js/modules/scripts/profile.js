$(function () {
    
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        1. Toggle switcher Handlers
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
    
    $('.custom-switch-input').on('click', function(){
        $(this).toggleClass('on');
    })

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        1. SUBMIT FORM
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    $('#submitEditElementForm').on('click', function(e){
        e.preventDefault();

        // set Loading icon.
        $(this).addClass('btn-loading');
        
        // serialize Form data.
        var formData = new FormData($('#editElementForm')[0]);

        
        // for (var pair of formData.entries()) {
        //     console.log(pair[0]+ ' => ' + pair[1]); 
        // }
        // return false;

       // Validate Form
       if ($('#editElementForm')[0].checkValidity() === false) {
            e.preventDefault();
            e.stopPropagation();
        } else {
            // POST Form data.
            $.ajax({
                url: baseURL + '/account',
                method: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false
            })
                .done(function (data) {
                    try {

                        $('#alert-info').html('');

                        // check Response Status
                        if (data.status == 'success') {

                            // SWAL Response Message.
                            swal('Succès!', data.info, 'success');
                            
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
                            errors += "<br>" + value;
                        });
                        // Print Errors.
                        $('#alert-info').html(alerts('warning', errors));
                    
                    // Get other codes Errors.
                    } else {
                        swal('Erreur!', 'Operation echoué, '+errorThrown+'!', 'error');
                    }
                })
        }
        // unset Loading icon.
        $(this).removeClass('btn-loading');
        // validate form.
        $('#editElementForm').addClass('was-validated');
        // scroll modal to the top.
        $("html, body.card").animate({ scrollTop: 0 }, "slow");
    });

    function resetForm(formName){
        $(formName)[0].reset();
    }
});