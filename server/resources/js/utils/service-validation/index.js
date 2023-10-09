import { classManipulationInput } from "../element-manipulation/index.input";
import { propManipulationBtn } from "../element-manipulation/index.btn";

export class ServiceValidation {
    static name(inputElement, eventElement, btnElement) {
        $(inputElement).on(eventElement, function (event) {
            const value = $(this).val();

            if (value.length <= 3) {
                classManipulationInput(false, $(this));
                propManipulationBtn(false, btnElement);
            } else {
                classManipulationInput(true, $(this));
                propManipulationBtn(true, btnElement);
            }
        });
    }

    static price(inputElement, eventElement, btnElement) {
        $(inputElement).on(eventElement, function (event) {
            const value = $(this).val();

            if (value <= 0) {
                classManipulationInput(false, $(this));
                propManipulationBtn(false, btnElement);
            } else {
                classManipulationInput(true, $(this));
                propManipulationBtn(true, btnElement);
            }
        });
    }
}
