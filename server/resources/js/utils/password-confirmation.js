export function passwordConfirmation() {
    $('input[name="password_confirmation"]').on("input", function (event) {
        const password = $('input[name="password"]').val();
        const passwordconfirmation = $(
            'input[name="password_confirmation"]'
        ).val();

        if (passwordconfirmation !== password) {
            $(this).addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid");
        }
    });
}
