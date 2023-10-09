import { UserValidation } from "../../../utils/user-validation";

UserValidation.password(
    'input[name="password_edit"]',
    "input focusout",
    "#user-security-edit"
);

UserValidation.confirmPassword(
    'input[name="password_confirmation_edit"]',
    'input[name="password_edit"]',
    "input focusout",
    "#user-security-edit"
);
