export function classManipulationInput(validation, inputElement) {
    if (validation) {
        return inputElement.removeClass("is-invalid");
    } else {
        return inputElement.addClass("is-invalid");
    }
}
