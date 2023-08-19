$(function () {
    
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        1. Toggle switcher Handlers
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
    
    $('.custom-switch-input').on('click', function(){
        $(this).toggleClass('on');
    })
    $('.modal').on('click', 'input[name="date-licence-switch"]', function(){
        var selector = $(this).parents('.input-form-group').find('[name="license_start_date"], [name="license_end_date"]');
        if($(this).hasClass('on')){
            selector.attr('disabled', true);
            selector.attr('required', false);
        }else{
            selector.attr('disabled', false);
            selector.attr('required', true);
        }
    })

    $('.modal').on('click', 'input[name="user-licenses-switch"], input[name="dossier-licenses-switch"]', function(){
        if($(this).hasClass('on')){
            $(this).parent().prev().attr('disabled', true);
            $(this).parent().prev().attr('required', false);
        }else{
            $(this).parent().prev().attr('disabled', false);
            $(this).parent().prev().attr('required', true);
        }
    })
    

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        1. BTN-USERS
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    $('.table').on('click', '.btn-users', function (e) {
        // set Loading icon.
        $(this).addClass('btn-loading');
        // Actions :
        location.href = baseURL + '/users/dossier/' + $(this).attr('data-id');
        // unset Loading icon.
        $(this).removeClass('btn-loading');
    })

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        1. BTN-ADMIN
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
    
    $('.table').on('click', '.btn-admin', function(){

        $.getJSON( baseURL + '/dossier/' + $(this).attr('data-id') + '/users' )
            .done(function( data ) {
                var dataArray = []
                $.each( data[0], function( i, item ) {
                    dataArray.push(item.id);
                });
                $('select[name="user_id[]"]').val(dataArray);
                $('select[name="user_id[]"]').trigger('change');
            });

        $('input[name="dossier_id"]').val($(this).attr('data-id'));
        $('input[name="dossier_name"]').val($('#item-lib-'+$(this).attr('data-id')).text());
        $('#extraModal').modal('show');
    })

    $('#extraModal').on('hide.bs.modal', function (e) {
        resetForm('#extraElementForm'); 
    })

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        1. BTN-EDIT
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    $('.table').on('click', '.btn-edit', function (e) {
        // set Loading icon.
        $(this).addClass('btn-loading');


        // unset Loading icon.
        $(this).removeClass('btn-loading');
    })

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        1. BTN-TRASH
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    $('.table').on('click', '.btn-trash', function (e) {
        e.preventDefault();
        // set Loading icon.
        $(this).addClass('btn-loading');

        var item_id = $(this).attr('data-id');

        swal({
                title: "Êtes-vous sûr?",
                text: "ATTENTION! cela supprime d'autres composants liés à cet élément.",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Annuler",
                        value: null,
                        visible: !0,
                        className: "btn btn-default",
                        closeModal: !0
                    },
                    confirm: {
                        text: "OUI, CONFIRMER LA SUPPRESSION",
                        value: !0,
                        visible: !0,
                        className: "btn btn-danger",
                        closeModal: 0
                    }
                }
            })
            .then((willAccept) => {
                if (willAccept) {

                    $.ajax({
                        url: baseURL + '/dossiers/' + item_id,
                        method: 'DELETE',
                        contentType: false,
                        cache: false,
                        processData: false
                    })
                        .done(function (data) {
                            try {
                                if (data.status === 'success') {

                                    // alert success msg.
                                    swal("Succès!", data.info, 'success');

                                    // remove the selected item.
                                    datatable.row($('#item-' + item_id)).remove().draw();

                                } else {
                                    // alert failed msg.
                                    swal("Échoué!", "Operation echoué, veuillez réessayer!", "error");
                                }
                            } catch (err) {
                                // error occured.
                                swal("Échoué!", "Operation echoué, "+err.message+"!", "error");
                            }

                        })
                        .fail(function (jqXHR, textStatus, errorThrown) {
                            swal('Erreur!', 'Operation echoué, '+errorThrown+'!', 'error');
                        })
                }
            });

        // unset Loading icon.
        $(this).removeClass('btn-loading');
    })


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        1. SUBMIT ADD FORM
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    $('#submitNewElementForm').on('click', function(e){
        e.preventDefault();
        // set Loading icon.
        $(this).addClass('btn-loading');
        
        // serialize Form data.
        var formData = new FormData($('#newElementForm')[0]);

        // Specific validation statments.
        var uLicense = $('input[name="user-licenses-switch"]').hasClass('on') ? 'unlimited' : $('input[name="user_licenses"]').val();
        var dLicense = $('input[name="dossier-licenses-switch"]').hasClass('on') ? 'unlimited' : $('input[name="dossier_licenses"]').val();
        var dateLicense = Number($('input[name="date-licence-switch"]').hasClass('on'));
        formData.set('user_licenses', uLicense);
        formData.set('dossier_licenses', dLicense);
        formData.set('date_license', dateLicense);
        /*
        for (var pair of formData.entries()) {
            console.log(pair[0]+ ' => ' + pair[1]); 
        }
        */

       // Validate Form
       if ($('#newElementForm')[0].checkValidity() === false) {
            e.preventDefault();
            e.stopPropagation();
        } else {
            // POST Form data.
            $.ajax({
                url: baseURL + '/dossiers',
                method: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false
            })
                .done(function (data) {
                    try {
                        // reset div alert.
                        $('#alert-add').html('');
                        
                        // check Response Status
                        if (data.status == 'success') {
                            // alert Response Message.
                            
                            resetForm('#newElementForm');
                            $('#alert-add').html(alerts('success', data.info));

                            // hide modal event
                            setTimeout(function () {
                                $('#newElementModal').modal('hide');
                            }, 2000);
                            $('#newElementModal').on('hide.bs.modal', function (e) {
                                location.reload();
                            });

                        } else {
                            // alert Response Message.
                            $('#alert-add').html(alerts('danger', data.info));
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
                        $('#alert-add').html(alerts('warning', errors));
                    
                    // Get other codes Errors.
                    } else {
                        swal('Erreur!', 'Operation echoué, '+errorThrown+'!', 'error');
                    }
                })
        }
        // unset Loading icon.
        $(this).removeClass('btn-loading');
        // validate form.
        $('#newElementForm').addClass('was-validated');
        // scroll modal to the top.
        $(".modal").animate({ scrollTop: 0 }, "slow");
    });


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        1. BTN-ADMIN
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
    
    $('#submitExtraElementForm').on('click', function(e){
        e.preventDefault();
        // set Loading icon.
        $(this).addClass('btn-loading');
        
        // serialize Form data.
        var formData = new FormData($('#extraElementForm')[0]);
        
        /*
        for (var pair of formData.entries()) {
            console.log(pair[0]+ ' => ' + pair[1]); 
        }
        return false;
        */

       // Validate Form
       if ($('#extraElementForm')[0].checkValidity() === false) {
            e.preventDefault();
            e.stopPropagation();
        } else {
            // POST Form data.
            $.ajax({
                url: baseURL + '/dossier/user',
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

                            // alert Response Message.
                            swal('Succés!', data.info, 'success')
                            // hide modal event
                            setTimeout(function () {
                                $('#extraElementModal').modal('hide');
                            }, 2000);

                        } else {
                            // alert Response Message.
                            swal('Erreur!', 'Operation echoué !', 'error')
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
                        swal('Attention!', errors, 'warning')
                    
                    // Get other codes Errors.
                    } else {
                        swal('Erreur!', 'Operation echoué, '+errorThrown+'!', 'error');
                    }
                })
        }
        // unset Loading icon.
        $(this).removeClass('btn-loading');
        // validate form.
        $('#extraElementForm').addClass('was-validated');
    })

});