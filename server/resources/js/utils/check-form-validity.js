export function checkFormValidity(process) {
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

        case 3:
            const passwordValid = $('input[name="password"]').val().length > 7;
            const passwordConfirmationValid =
                $('input[name="password_confirmation"]').val() ===
                $('input[name="password"]').val();

            if (passwordValid && passwordConfirmationValid) {
                $("#continue").prop("disabled", false);
            } else {
                $("#continue").prop("disabled", true);
            }
            break;

        case 4:
            const nameServiceValid =
                $('input[name="name_service"]').val().length >= 3;
            const priceServiceValid =
                $('input[name="price_service"]').val() >= 1;
            if (nameServiceValid && priceServiceValid) {
                $("#btn-create-service").prop("disabled", false);
            } else {
                $("#btn-create-service").prop("disabled", true);
            }
            break;
    }
}
