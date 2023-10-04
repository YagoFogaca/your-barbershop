import { propManipulationBtn } from "../../utils/element-manipulation/index.btn";

export function checkBlockValidity(process) {
    let validate = false;
    switch (process) {
        case 0:
            const ownerNameValid =
                $('input[name="owner_name"]').val().trim() === "";
            const companyNameValid =
                $('input[name="company_name"]').val().trim() === "";
            const emailValid = $('input[name="email"]').val().trim() === "";

            if (!ownerNameValid && !companyNameValid && !emailValid) {
                propManipulationBtn(true, "#continue-user-create");
                validate = true;
            } else {
                propManipulationBtn(false, "#continue-user-create");
            }
            break;
        case 1:
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
                propManipulationBtn(true, "#continue-user-create");
                validate = true;
            } else {
                propManipulationBtn(false, "#continue-user-create");
            }
            break;
        case 2:
            const passwordValid =
                $('input[name="password"]').val().trim() === "";
            const passwordConfirmationValid =
                $('input[name="password_confirmation"]').val().trim() === "";

            if (!passwordValid && !passwordConfirmationValid) {
                propManipulationBtn(true, "#continue-user-create");
                validate = true;
            } else {
                propManipulationBtn(false, "#continue-user-create");
            }
            break;
    }

    return validate;
}
