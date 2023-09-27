import { validateInput } from "../../utils/validate-input";
import { passwordConfirmation } from "../../utils/password-confirmation";

validateInput('input[name="password"]', 7, null, 3);
validateInput('input[name="password_confirmation"]', 7, null, 3);
passwordConfirmation();
