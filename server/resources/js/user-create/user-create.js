import { reset } from "./process-block/reset-process-block";

$('form[name="create-user"]').on("submit", function (event) {
    event.preventDefault();
    const user = {
        owner_name: event.target.owner_name.value,
        company_name: event.target.company_name.value,
        email: event.target.email.value,
        telephone: event.target.telephone.value,
        cep: event.target.cep.value,
        address: event.target.address.value,
        number: event.target.number.value,
        neighborhood: event.target.neighborhood.value,
        city: event.target.city.value,
        state: event.target.state.value,
        complement: event.target.complement.value,
        password: event.target.password.value,
        password_confirmation: event.target.password_confirmation.value,
    };

    $("#loading").css("display", "block");
    $("#continue").css("display", "none");
    $.ajax({
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/users",
        data: JSON.stringify(user),
        dataType: "json",
        contentType: "application/json",
        success: function (response) {
            $("#continue").css("display", "block");
            $("#loading").css("display", "none");
            window.location.assign("/");
        },
        error: function (response) {
            $("#continue").css("display", "block");
            $("#loading").css("display", "none");
            $("#invalid-create-user")
                .html(response.responseText)
                .css("display", "block");
            reset();
        },
    });
});
