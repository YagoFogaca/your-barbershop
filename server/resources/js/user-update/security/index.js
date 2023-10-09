$('form[name="user-security"]').on("submit", function (event) {
    event.preventDefault();

    if ($("#invalid-update-security-user").css("display") !== "none") {
        $("#invalid-update-security-user")
            .html("Ocorreu um erro ao atualizar o endereço")
            .css("display", "none");
    }

    const data = {
        password: event.target.password_edit.value,
        password_confirmation: event.target.password_confirmation_edit.value,
        user_id: event.target.user_id.value,
    };

    $("#user-security-edit").css("display", "none");
    $("#loading-security").css("display", "block");

    $.ajax({
        type: "PUT",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/users/password",
        data: JSON.stringify(data),
        dataType: "json",
        contentType: "application/json",
        success: function (response) {
            $("#user-security-edit").css("display", "block");
            $("#loading-security").css("display", "none");
            $(".alert-security").css("display", "block");
            $(".alert-security").css("display", "block");
            setInterval(function () {
                $(".alert-security").css("display", "none");
            }, 10000);
        },
        error: function (response) {
            $("#user-security-edit").css("display", "block");
            $("#loading-security").css("display", "none");
            $("#invalid-update-security-user")
                .html("Ocorreu um erro ao atualizar a senha")
                .css("display", "block");
        },
    });
});
