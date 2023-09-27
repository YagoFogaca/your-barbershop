import { checkFormValidity } from "./check-form-validity";

export function validateInput(inputElement, minLength, regexPattern, process) {
    $(inputElement).on("input", function (event) {
        const value = event.target.value;
        if (minLength && value.length <= minLength) {
            $(this).addClass("is-invalid");
        } else if (regexPattern && !regexPattern.test(value)) {
            $(this).addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid");
        }

        checkFormValidity(process);
    });

    $(inputElement).on("focusout", function (event) {
        const value = event.target.value;
        if (minLength && value.length <= minLength) {
            $(this).addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid");
        }

        checkFormValidity(process);
    });
}
