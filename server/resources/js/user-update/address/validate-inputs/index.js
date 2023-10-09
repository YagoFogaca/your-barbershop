import { UserValidation } from "../../../utils/user-validation/index";

UserValidation.cep('input[name="cep"]', "input", "#user-address-edit");

UserValidation.number(
    'input[name="number_edit"]',
    "input",
    "#user-address-edit"
);
