function validateInput(inputElement, minLength, regexPattern) {
    $(inputElement).on("input", function (event) {
        const value = event.target.value;
        if (minLength && value.length <= minLength) {
            $(this).addClass("is-invalid");
        } else if (regexPattern && !regexPattern.test(value)) {
            $(this).addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid");
        }

        checkFormValidity();
    });

    $(inputElement).on("focusout", function (event) {
        const value = event.target.value;
        if (minLength && value.length <= minLength) {
            $(this).addClass("is-invalid");
        } else {
            $(this).removeClass("is-invalid");
        }

        checkFormValidity();
    });
}

function checkFormValidity() {
    const ownerNameValid = $('input[name="owner_name"]').val().length > 3;
    const companyNameValid = $('input[name="company_name"]').val().length > 2;
    const emailValid = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g.test(
        $('input[name="email"]').val()
    );

    // Habilitar o botão de envio apenas se todos os campos forem válidos
    if (ownerNameValid && companyNameValid && emailValid) {
        $("#continue").prop("disabled", false);
    } else {
        $("#continue").prop("disabled", true);
    }
}

// Validar Nome do Proprietário
validateInput('input[name="owner_name"]', 3);

// Validar Nome da Barbearia/Salão
validateInput('input[name="company_name"]', 2);

// Validar Email
validateInput('input[name="email"]', 1, /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g);
