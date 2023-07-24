function showStateMessage(field, message) {
    if (!message) {
        $("#" + field).addClass('is-valid').removeClass('is-invalid');
        $("#" + field + "_error").text("");
        $("." + field).addClass('is-valid').removeClass('is-invalid');
        $("." + field + "_error").text("");
    } else {
        $("#" + field).addClass('is-invalid').removeClass('is-valid');
        $("#" + field + "_error").text(message);

        $("." + field).addClass('is-invalid').removeClass('is-valid');
        $("." + field + "_error").text(message);
    }
}

function removeValidationClasses(form) {

    $(form).each(function () {
        $(form).find(":input").removeClass('is-valid is-invalid');

    });
}
function SuccessValidationClasses(form) {

    $(form).each(function () {
        $(form).find(":input").addClass('is-valid').removeClass('is-invalid').siblings('.error').text("");
        $(form).find(":input").addClass('is-valid').removeClass('is-invalid').parent().siblings('.error').text("");;

    });
   
}
function showMessage(type, message) {
    // return '<div class="alert alert-${type}  alert-dismissible fade show" role="alert"> <strong> </strong>${message} <button  type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button></div > ';
    return '<div class="alert alert-' + type + '  alert-dismissible fade show" role="alert"> <strong> </strong>' + message + ' <button  type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button></div > ';

} 