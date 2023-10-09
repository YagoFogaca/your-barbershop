import { ServiceValidation } from "../../utils/service-validation";

ServiceValidation.name(
    'input[name="name_service_edit"',
    "input",
    "#btn-edit-service"
);

ServiceValidation.price(
    'input[name="price_service_edit"',
    "input",
    "#btn-edit-service"
);
