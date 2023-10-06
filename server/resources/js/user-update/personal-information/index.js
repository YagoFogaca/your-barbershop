const userPersonalInformation = {
    owner_name: $('input[name="owner_name_edit"]').val(),
    company_name: $('input[name="company_name_edit"]').val(),
    email: $('input[name="email_edit"]').val(),
    telephone: $('input[name="telephone_edit"]').val(),
};

$('form[name="personal-information"]').on("submit", function (event) {
    event.preventDefault();

    const userPersonalInformationData = {
        owner_name: event.target.owner_name_edit.value,
        company_name: event.target.company_name_edit.value,
        email: event.target.email_edit.value,
        telephone: event.target.telephone_edit.value,
    };

    for (const chave in userPersonalInformationData) {
        if (
            userPersonalInformation[chave] ===
            userPersonalInformationData[chave]
        ) {
            delete userPersonalInformationData[chave];
        }
    }
    if ($.isEmptyObject(userPersonalInformationData)) {
        $("#invalid-update-personal-information-user")
            .html("Preencha ao menos um campo")
            .css("display", "block");
        return false;
    }
    $("#user-personal-information-edit").css("display", "none");
    $("#loading").css("display", "block");

    $("#invalid-update-personal-information-user")
        .html("")
        .css("display", "none");

    $.ajax({
        type: "PATCH",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/users/" + $('input[name="user_id"]').val(),
        data: JSON.stringify(userPersonalInformationData),
        dataType: "json",
        contentType: "application/json;",
        success: function (response) {
            for (const chave in userPersonalInformationData) {
                userPersonalInformation[chave] = response.response.data[chave];
            }
            $("#user-personal-information-edit").css("display", "block");
            $("#loading").css("display", "none");
            $(".alert-display").css("display", "block");
            setInterval(function () {
                $(".alert-display").css("display", "none");
            }, 10000);
        },
        error: function (response) {
            console.log(response);
            $("#user-personal-information-edit").css("display", "block");
            $("#loading").css("display", "none");
            $("#invalid-update-personal-information-user")
                .html("Ocorreu um erro ao atualizar suas informações")
                .css("display", "block");
        },
    });
});
