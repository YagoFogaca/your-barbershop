export function propManipulationBtn(validation, btnElement) {
    if (validation) {
        return $(btnElement).prop("disabled", false);
    } else {
        return $(btnElement).prop("disabled", true);
    }
}
