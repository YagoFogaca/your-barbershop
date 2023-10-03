$('input[name="name_service_edit"').on("input", function (event) {
    let check = false;
    if (event.target.value.length < 3 && event.target.value.trim() !== "") {
        $(this).addClass("is-invalid");
        check = false;
    } else {
        check = true;
        $(this).removeClass("is-invalid");
    }
    checkValidation(check);
});

$('input[name="price_service_edit"').on("input", function (event) {
    let check = false;
    if (event.target.value <= 0 && event.target.value.trim() !== "") {
        $(this).addClass("is-invalid");
        check = false;
    } else {
        $(this).removeClass("is-invalid");
        check = true;
    }
    checkValidation(check);
});

function checkValidation(check) {
    if (check) {
        $("#btn-edit-service").prop("disabled", false);
    } else {
        $("#btn-edit-service").prop("disabled", true);
    }
}
