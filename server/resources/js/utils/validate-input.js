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

function checkFormValidity(process) {
    switch (process) {
        case 1:
            const ownerNameValid =
                $('input[name="owner_name"]').val().length > 3;
            const companyNameValid =
                $('input[name="company_name"]').val().length > 2;
            const emailValid = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(
                $('input[name="email"]').val()
            );
            if (ownerNameValid && companyNameValid && emailValid) {
                $("#continue").prop("disabled", false);
            } else {
                $("#continue").prop("disabled", true);
            }
            break;
        case 2:
            const telephoneValid =
                $('input[name="telephone"]').val().trim() === "";
            const cepValid = $('input[name="cep"]').val().trim() === "";
            const addressValid = $('input[name="address"]').val().trim() === "";
            const neighborhoodValid =
                $('input[name="neighborhood"]').val().trim() === "";
            const cityValid = $('input[name="city"]').val().trim() === "";
            const stateValid = $('input[name="state"]').val().trim() === "";
            const numberValid = $('input[name="number"]').val().trim() === "";

            if (
                !telephoneValid &&
                !cepValid &&
                !addressValid &&
                !neighborhoodValid &&
                !cityValid &&
                !stateValid &&
                !numberValid
            ) {
                $("#continue").prop("disabled", false);
            } else {
                $("#continue").prop("disabled", true);
            }
            break;
    }
}
