$(function () {
    
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        1. Toggle switcher Handlers
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
    
    $('.custom-switch-input').on('click', function(){
        $(this).toggleClass('on');
    })
    
    $('.modal').on('click', 'input[name="active-switch"]', function(){
        if($(this).hasClass('on')){
            $('input[name="active"]').val('0');
        }else{
            $('input[name="active"]').val('1');
        }
    })

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        1. BTN-USERS
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    $('.table').on('click', '.btn-perms', function (e) {
        // set Loading icon.
        $(this).addClass('btn-loading');
        // Actions :
        
        // unset Loading icon.
        $(this).removeClass('btn-loading');
    })

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        1. BTN-EDIT
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    /* UPDATE FORM */
    function updateElementForm(form, inverse = null) {
        if(!inverse){
            $('#elementModalLabel').html('<i class="fe fe-edit"></i> Modifier Élément');
            $('#submitNewElementForm').addClass('d-none');
            $('#submitElementForm').removeClass('d-none');
            $('#elementFormId').html('<input type="hidden" name="id" value="">');
            $('#elementFormId').append('<input type="hidden" name="_method" value="PUT">');
            $('input[name="password"], input[name="password_confirmation"]').attr('required', false);
        }else{
            $('#elementModalLabel').html('<i class="fe fe-folder-plus"></i> Nouveau Élément');
            $('#submitNewElementForm').removeClass('d-none');
            $('#submitElementForm').addClass('d-none');
            $('#elementFormId').html('');
            $('input[name="password"], input[name="password_confirmation"]').attr('required', true);
        }
    }
    
    $('.table').on('click', '.btn-edit', function (e) {
        // set Loading icon.
        $(this).addClass('btn-loading');


        $.getJSON( baseURL + "/users/" + Number($(this).attr('data-id')) )
            .done(function( jsonDATA ) {
                // update Form.
                updateElementForm('#newElementForm');
                // Fill Data.
                $('#newElementForm').populate(jsonDATA);
                $('.selectpicker').change();
                // Change Switcher status.
                if ( jsonDATA.active == 1) {
                    if($('input[name="active-switch"]').hasClass('on')){
                        $('input[name="active-switch"]').trigger('click');
                    }
                } else {
                    if(!$('input[name="active-switch"]').hasClass('on')){
                        $('input[name="active-switch"]').trigger('click');
                    }
                }
                // Show Modal.
                $('#newElementModal').modal('show');
            })
            .fail(function( jqxhr, textStatus, error ) {

                var err = textStatus + ", " + error;
                swal( 'Echéc!', "Request Failed: " + err, 'error');
        });

        // unset Loading icon.
        $(this).removeClass('btn-loading');
    })

    /* RESET FORM */
    $('#newElementModal').on('hide.bs.modal', function (e) {
        updateElementForm('#newElementForm', true);
        resetForm('#newElementForm');
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
                        url: baseURL + '/users/' + item_id,
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
                url: baseURL + '/users',
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
        1. SUBMIT EDIT FORM
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    $('#submitElementForm').on('click', function(e){
        e.preventDefault();

        // set Loading icon.
        $(this).addClass('btn-loading');
        
        // serialize Form data.
        var formData = new FormData($('#newElementForm')[0]);
        
        // for (var pair of formData.entries()) {
        //     console.log(pair[0]+ ' => ' + pair[1]); 
        // }
        // return false;

       // Validate Form
       if ($('#newElementForm')[0].checkValidity() === false) {
            e.preventDefault();
            e.stopPropagation();
        } else {
            // POST Form data.
            $.ajax({
                url: baseURL + '/users/' + formData.get('id'),
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

    $('#newElementModal').on('hide.bs.modal', function (e) {
        resetForm('#newElementForm');
    });
});