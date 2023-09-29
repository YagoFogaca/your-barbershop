import { checkFormValidity } from "../../utils/check-form-validity";
$('input[name="name_service"').on("input", function (event) {
    if (event.target.value.length < 3) {
        $(this).addClass("is-invalid");
    } else {
        $(this).removeClass("is-invalid");
    }

    checkFormValidity(4);
});

$('input[name="price_service"').on("input", function (event) {
    if (event.target.value <= 0) {
        $(this).addClass("is-invalid");
    } else {
        $(this).removeClass("is-invalid");
    }

    checkFormValidity(4);
});
