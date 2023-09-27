import { validateInput } from "../../utils/validate-input";

validateInput('input[name="telephone"]', 10, /^\d{11}$/, 2);
validateInput('input[name="cep"]', 7, null, 2);
validateInput('input[name="number"]', 0, null, 2);
