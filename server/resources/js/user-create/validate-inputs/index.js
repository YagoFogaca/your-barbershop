import { UserValidation } from "../../utils/user-validation/index";

UserValidation.ownerName(
    'input[name="owner_name"]',
    "input focusout",
    "#continue-user-create"
);

UserValidation.companyName(
    'input[name="company_name"]',
    "input focusout",
    "#continue-user-create"
);

UserValidation.email(
    'input[name="email"]',
    "input focusout",
    "#continue-user-create"
);

UserValidation.telephone(
    'input[name="telephone"]',
    "input focusout",
    "#continue-user-create"
);

UserValidation.cep(
    'input[name="cep"]',
    "input focusout",
    "#continue-user-create"
);

UserValidation.number(
    'input[name="number"]',
    "input focusout",
    "#continue-user-create"
);

UserValidation.password(
    'input[name="password"]',
    "input focusout",
    "#user-create"
);

UserValidation.confirmPassword(
    'input[name="password_confirmation"]',
    'input[name="password"]',
    "input focusout",
    "#user-create"
);
