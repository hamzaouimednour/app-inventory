
        
/* ********************************************
    0. DEFINE BASE URL.
******************************************** */

var getUrl = window.location;
var domain = getUrl.protocol + "//" + getUrl.host;
var baseURL = $('meta[name="base-url"]').attr('content');


/* ********************************************
    1. BS4 ALERTS
******************************************** */

function alerts(type, info = "Operation echoué") {
    var alert = {};
    alert['success'] = `<div class="alert alert-success alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i> </span> <span class="alert-inner--text"><strong> Succès! </strong> `+info+`!</span> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>`;
    alert['danger'] = `<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert"> <span class="alert-inner--icon"><i class="fe fe-x-circle"></i> </span> <span class="alert-inner--text"><strong> Échoué! </strong> `+info+`!</span> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>`;
    alert['warning'] = `<div class="alert alert-warning alert-dismissible fade show" role="alert"> <span class="alert-inner--icon"><i class="fe fe-info"></i> </span> <span class="alert-inner--text"><strong> Attention! </strong> `+info+`!</span> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button> </div>`;
    return alert[type]
}


/* ********************************************
    1. RESET FORM
******************************************** */

function resetForm(formName){
    // RESET Form
    $(formName+' input, textarea, select')
        .not('input.custom-switch-input, input[type="hidden"]')
        .each(function(){
            $(this).val('');
    })

    // RESET toggle switch.
    $(formName).find('.custom-switch-input').each(function () {
        if($(this).hasClass('on'))
            $(this).trigger('click');
    })

    // TRIGGER Change.
    $(formName).find('.selectpicker').change();

    // RESET Form Validation.
    $(formName).removeClass('was-validated');
}

$(function() {
    
    /* ********************************************
        1. AJAX Headers.
    ******************************************** */

   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    /* ********************************************
        2. INIT FORM ELEMENTS.
    ******************************************** */
    
    $('.fc-datepicker, .modal.fc-datepicker').datepicker({
        dayNamesMin: [ "Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam" ],
        monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        dateFormat: "yy-mm-dd",
        minDate: 0,
        showOtherMonths: true,
        selectOtherMonths: true
    });


    /* ********************************************
        3. <input> Integer Numbers Validation.
    ******************************************** */

    $('input.int-number, .modal input.int-number').on('keypress', function(event){
        return event.charCode >= 48 && event.charCode <= 57;
    });


    /* ********************************************
        4. <input> Float Numbers Validation.
    ******************************************** */

    $('input.float-number, .modal input.float-number').on('keypress', function(event){
        // return (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 46);
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });

    /* ********************************************
        5. <input> String Validation.
    ******************************************** */

    $('input.domain-str, .modal input.domain-str').on('keypress', function(event){
        return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45));
    });
    $('input.db-str, .modal input.db-str').on('keypress', function(event){
        return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 45) || (event.charCode == 95));
    });

/*
    $('#submitNewElementForm').on('click', function(e){
        e.preventDefault();
        var formData = new FormData($('#newElementForm')[0]);
        for (var pair of formData.entries()) {
            console.log(pair[0]+ ' => ' + pair[1]); 
        }
    });
*/
    
});
