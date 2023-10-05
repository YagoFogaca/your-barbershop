import { UserValidation } from "../../utils/user-validation/index";

UserValidation.email('input[name="email_login"]', "input focusout", "#login");

UserValidation.password(
    'input[name="password_login"]',
    "input focusout",
    "#login"
);
