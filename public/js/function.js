function showStateMessage(field, message) {
    if (!message) {
        $("#" + field).addClass('is-valid').removeClass('is-invalid')
            .siblings('.invalid-feedback').text("");
    } else {
        // alert(message);
        $("#" + field).addClass('is-invalid').removeClass('is-valid')
            .siblings('.invalid-feedback').text(message);
    }
}

function removeValidationClasses(form) {
   
    $(form).each(function () {
        $(form).find(":input").removeClass('is-valid is-invalid');
    });
}

function showMessage(type, message) {
    // return '<div class="alert alert-${type}  alert-dismissible fade show" role="alert"> <strong> </strong>${message} <button  type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button></div > ';
   return '<div class="alert alert-'+type+'  alert-dismissible fade show" role="alert"> <strong> </strong>'+message+' <button  type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button></div > ';

} 