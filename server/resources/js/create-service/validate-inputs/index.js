import { ServiceValidation } from "../../utils/service-validation";

ServiceValidation.name(
    'input[name="name_service"',
    "input focusout",
    "#btn-create-service"
);

ServiceValidation.price(
    'input[name="price_service"',
    "input focusout",
    "#btn-create-service"
);
